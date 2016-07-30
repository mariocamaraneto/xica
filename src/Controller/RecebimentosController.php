<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\I18n\Time;
use Cake\ORM\TableRegistry;

/**
 * Recebimentos Controller
 *
 * @property \App\Model\Table\RecebimentosTable $Recebimentos
 */
class RecebimentosController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Funcionarios']
        ];
        $recebimentos = $this->paginate($this->Recebimentos);

        $this->set(compact('recebimentos'));
        $this->set('_serialize', ['recebimentos']);
    }

    /**
     * View method
     *
     * @param string|null $id Recebimento id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $recebimento = $this->Recebimentos->get($id, [
            'contain' => ['Funcionarios', 'Parcelas.Vendas']
        ]);

        $this->set('recebimento', $recebimento);
        $this->set('_serialize', ['recebimento']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $recebimento = $this->Recebimentos->newEntity();
        if ($this->request->is('post')) {
            $recebimento = $this->Recebimentos->patchEntity($recebimento, $this->request->data);
            if ($this->Recebimentos->save($recebimento)) {
                $this->Flash->success(__('The recebimento has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The recebimento could not be saved. Please, try again.'));
            }
        }
        $funcionarios = $this->Recebimentos->Funcionarios->find('list', ['limit' => 200]);
        $parcelas = $this->Recebimentos->Parcelas->find('list', ['limit' => 200]);
        $this->set(compact('recebimento', 'funcionarios', 'parcelas'));
        $this->set('_serialize', ['recebimento']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Recebimento id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $recebimento = $this->Recebimentos->get($id, [
            'contain' => ['Parcelas']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $recebimento = $this->Recebimentos->patchEntity($recebimento, $this->request->data);
            if ($this->Recebimentos->save($recebimento)) {
                $this->Flash->success(__('The recebimento has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The recebimento could not be saved. Please, try again.'));
            }
        }
        $funcionarios = $this->Recebimentos->Funcionarios->find('list', ['limit' => 200]);
        $parcelas = $this->Recebimentos->Parcelas->find('list', ['limit' => 200]);
        $this->set(compact('recebimento', 'funcionarios', 'parcelas'));
        $this->set('_serialize', ['recebimento']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Recebimento id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $recebimento = $this->Recebimentos->get($id);
        if ($this->Recebimentos->delete($recebimento)) {
            $this->Flash->success(__('The recebimento has been deleted.'));
        } else {
            $this->Flash->error(__('The recebimento could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
    
    
    public function realiza(){
    	if( $this->request->is('post') ){
    			//validação dos dados recebidos
    		if(     !$this->request->data['idcliente'] 
    			 || !is_numeric( $this->request->data['valor'] )
    			 ||  $this->request->data['valor'] <= 0
    		  )
    		{
    			$this->Flash->error("Não foi possível efetuar o pagamento. Erro nos dados informados.");
    			return $this->redirect(['action'=>'realiza']);
    		}
    		
    		
    		$recebimento = $this->Recebimentos->newEntity();
    		$recebimento->data = Time::now();
    		$recebimento->forma_pagamento = $this->request->data['formapagamento'];
    		$recebimento->valor = $this->request->data['valor'];
    		$recebimento->funcionario_id = $this->Auth->user('id');
    		
    		
    		
    		$parcelas = $this->Recebimentos->Parcelas->find('all', [
    				'contain' => ['Vendas'],
    				'conditions' => ['Vendas.cliente_id' => $this->request->data['idcliente'],
    						'Parcelas.quitada' => false,
    				],
    				'order' => ['Parcelas.data_vencimento' => 'ASC'],
    		]);
    		
    			//Guarda o valor restante de cada pagemento em cada parcela
    		$emHaver = $this->request->data['valor'];
    			//inicia array que irá guarda as parcelas para salvar e linkar
    		$recebimento->parcelas =[];
    		foreach ($parcelas as $parcela){
    			$valorDevido = $parcela->valor_total - $parcela->valor_pago;
    			if( $valorDevido <= $emHaver ){
    					//altera BD
    				$parcela->quitada = true;
    				$parcela->valor_pago = $parcela->valor_total;
    					//retira valor pago de emHaver para proxima iteração
    				$emHaver -= $parcela->valor_total;
    			}
    			else
    			{	//O valor pago é menor que o dessa parcela ou 
    				//o resto de iteração anterior é menor que o total dessa parcela 
    				$parcela->valor_pago += $emHaver;
    				$emHaver = 0;
    			}
				//Adiciona a Entity ao recebimento para salvar junto
				//Quando o metodo save for chamado irar salvar alterações de parcela
				//e 'linkar' Recebimento com Parcela na 3ª tabela no BD 
    			array_push($recebimento->parcelas, $parcela);
    			
    			//se o dinheiro acabou para as iterações
    			if($emHaver==0) break;
    		}

    		if($this->Recebimentos->save($recebimento)){
    			$this->Flash->success("Pagamento realizado com sucesso");
    			return $this->redirect(['action'=>'realiza']);
    		}
    		else
    		{
				$this->Flash->error("Ops. Algum problema aconteceu. Pagamento não realizado.");    			
    		}
    		
    	}
    }
    
}
