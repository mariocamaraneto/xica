<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;
use Cake\I18n\Time;
use App\Model\Entity\VendasProduto;


/**
 * Pagamentos Controller
 *
 * @property \App\Model\Table\PagamentosTable $Pagamentos
 */
class PagamentosController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Fornecedores', 'Funcionarios']
        ];
        $pagamentos = $this->paginate($this->Pagamentos);

        $this->set(compact('pagamentos'));
        $this->set('_serialize', ['pagamentos']);
    }

    /**
     * View method
     *
     * @param string|null $id Pagamento id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $pagamento = $this->Pagamentos->get($id, [
            'contain' => ['Fornecedores', 'Funcionarios', 'VendasProdutos']
        ]);

        $this->set('pagamento', $pagamento);
        $this->set('_serialize', ['pagamento']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $pagamento = $this->Pagamentos->newEntity();
        if ($this->request->is('post')) {
            $pagamento = $this->Pagamentos->patchEntity($pagamento, $this->request->data);
            if ($this->Pagamentos->save($pagamento)) {
                $this->Flash->success(__('The pagamento has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The pagamento could not be saved. Please, try again.'));
            }
        }
        $fornecedores = $this->Pagamentos->Fornecedores->find('list', ['limit' => 200]);
        $funcionarios = $this->Pagamentos->Funcionarios->find('list', ['limit' => 200]);
        $this->set(compact('pagamento', 'fornecedores', 'funcionarios'));
        $this->set('_serialize', ['pagamento']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Pagamento id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $pagamento = $this->Pagamentos->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $pagamento = $this->Pagamentos->patchEntity($pagamento, $this->request->data);
            if ($this->Pagamentos->save($pagamento)) {
                $this->Flash->success(__('The pagamento has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The pagamento could not be saved. Please, try again.'));
            }
        }
        $fornecedores = $this->Pagamentos->Fornecedores->find('list', ['limit' => 200]);
        $funcionarios = $this->Pagamentos->Funcionarios->find('list', ['limit' => 200]);
        $this->set(compact('pagamento', 'fornecedores', 'funcionarios'));
        $this->set('_serialize', ['pagamento']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Pagamento id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $pagamento = $this->Pagamentos->get($id);
        if ($this->Pagamentos->delete($pagamento)) {
            $this->Flash->success(__('The pagamento has been deleted.'));
        } else {
            $this->Flash->error(__('The pagamento could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
    
    public function realiza()
    {
    	
    }
    
    public function searchFornecedores()
    {
    	if( $this->request->query('search') )
    	{
     		$fornecedoresTable = TableRegistry::get('Fornecedores');
    		$fornecedores = $fornecedoresTable->find('all', 
    				['conditions' => 
    						['Fornecedores.nome LIKE' => '%'.  $this->request->query('search') .'%'],
    				]
    				);
    		$fornecedores->select(['id','nome','telefone']);
    		
    		$this->set(compact('fornecedores'));
    		$this->set('_serialize', ['fornecedores']);
    	}
    	else
    	{
    		$this->Flash->error("Requisição não permitida");
    		$this->redirect(['action'=>'realiza']);
    	}
    	
    }
    
    public function searchProdutosAPagar()
    {
     	if( $this->request->query('search') && $this->request->is('json'))
     	{
    		$produtosTable = TableRegistry::get("Produtos");
    		
    		$options = [];
    		$options['idFornecedor'] = $this->request->query('search');
    		$options['tempo'] = '30 days ago';
    		
    		$produtos = $produtosTable->find('ProdutosAPagar', $options);
    		//faz filtro para diminuir overload do json
      		$produtos->select(['referencia', 'nome', 'custo_bruto']);
    		
    		$this->set(compact('produtos'));
    		$this->set('_serialize', ['produtos','produtosD']);
    		
    	}
    	else
    	{
    		$this->Flash->error("Requisição não permitida");
    		$this->redirect(['action' => 'realiza']);
    	}
    }
    
    
    public function finaliza()
    {
    	if($this->request->is('post')){
    		
    		$options = [];
    		$options['idFornecedor'] = $this->request->data['id'];
    		$options['tempo'] = '30 days ago';
    		$produtosTable = TableRegistry::get("Produtos");
    		$produtos = $produtosTable->find('ProdutosAPagar', $options);
    		//faz filtro para diminuir overload do json
     		$total = $produtos->select(['soma'=>'sum( Produtos.custo_bruto )'])->first()->soma;
    		
    		//armazena sessão para concluir a venda
    		$sessao = $this->request->session();
    		$sessao->write('fornecedor', $this->request->data);
    		$sessao->write('total', $total);
    		
    		$this->set('fornecedor', $this->request->data);
    		$this->set('total', $total);
    		$this->set('_serialize', 'fornecedor');
    	}else 
    	{
    		$this->Flash->error("Você deve escolher o fornecedor primeiro");
    		$this->redirect(['action' => 'realiza']);
    	}
    }
    
    public function conclui()
    {
    	if ( $this->request->is('post') )
    	{
    		$fornecedorSession = $this->request->session()->read('fornecedor');
    		$pagamentoRequest = $this->request->data;
    		
    		
    		$pagamentosTable = TableRegistry::get('Pagamentos');
     		$funcionarioID= $pagamentosTable->Funcionarios->get($this->Auth->user('id')) ['id'];
     		$fornecedorID = $pagamentosTable->Fornecedores->get((int) $fornecedorSession['id'])['id'];
    		$pagamento = $this->Pagamentos->newEntity([
    					'data' => Time::now(),
    					'valor' => $this->request->session()->read('total'),
    					'forma_pagamento' => $pagamentoRequest['formaPagamento'] ,
    					'observacoes' => $pagamentoRequest['observacaoPagamento'],
    					'fornecedores_id' =>  $fornecedorID,
    					'funcionarios_id' => $funcionarioID,
    				]
    				);
    		
    		
    		$vendasProdutosTable = TableRegistry::get('VendasProdutos');
    		$vendasProdutos = $vendasProdutosTable->find('ProdutosAPagar', [
    			    									'idFornecedor' =>  $fornecedorSession['id'],
    			    									'tempo' => '30 days ago'
    					]);
    		
    		if( $pagamentosTable->save($pagamento)){
    			foreach ($vendasProdutos as $vendaProduto){
    				$vendaProduto->pagamento_id = $pagamento->id;
    				$vendasProdutosTable->save($vendaProduto);
    			}
     		}
    			
     		$this->Flash->success("Pagamento realizado com sucesso");
     		$this->redirect(['action' => 'view', $pagamento->id]);
     		
    		$this->set('pagamento', $pagamento );
    		$this->set('_serialize', ['pagamento']);
    	}
    }
}
