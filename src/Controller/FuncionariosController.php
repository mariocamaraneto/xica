<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;
use Cake\I18n\Time;

/**
 * Funcionarios Controller
 *
 * @property \App\Model\Table\FuncionariosTable $Funcionarios
 */
class FuncionariosController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
    	$this->paginate = ['order' => ['Funcionarios.ativo' => 'desc']];
        $funcionarios = $this->paginate($this->Funcionarios);

        $this->set(compact('funcionarios'));
        $this->set('_serialize', ['funcionarios']);
    }

    /**
     * View method
     *
     * @param string|null $id Funcionario id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $funcionario = $this->Funcionarios->get($id, [
            'contain' => []
        ]);

        $this->set('funcionario', $funcionario);
        $this->set('_serialize', ['funcionario']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $funcionario = $this->Funcionarios->newEntity();
        if ($this->request->is('post')) {
            $funcionario = $this->Funcionarios->patchEntity($funcionario, $this->request->data);
            if ($this->Funcionarios->save($funcionario)) {
                $this->Flash->success(__('O funcionário foi cadastradi com sucesso'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('O funcionário não foi salvo. Confira os dados e tente novamente.'));
            }
        }
        $this->set(compact('funcionario'));
        $this->set('_serialize', ['funcionario']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Funcionario id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $funcionario = $this->Funcionarios->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $funcionario = $this->Funcionarios->patchEntity($funcionario, $this->request->data);
            if ($this->Funcionarios->save($funcionario)) {
                $this->Flash->success(__('As alterações foram salvas com sucesso.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('As alterações não foram salvas. Confira os dados e tente novamente.'));
            }
        }
        $this->set(compact('funcionario'));
        $this->set('_serialize', ['funcionario']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Funcionario id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $funcionario = $this->Funcionarios->get($id);
        if ($this->Funcionarios->delete($funcionario)) {
            $this->Flash->success(__('O funcionário foi deletado com sucesso.'));
        } else {
            $this->Flash->error(__('Esse funcionário não pode ser deletado.'));
        }
        return $this->redirect(['action' => 'index']);
    }
    
    
    public function login()
    {
    	//chama cabeçalho login.ctp
    	$this->viewBuilder()->layout('login');
    	if ( $this->request->is('post') )
    	{
    		$funcionario = $this->Auth->identify();
    		if ($funcionario)
    		{
    			if($funcionario['ativo'])
    			{
    				$this->Auth->setUser($funcionario);
    				$url = $this->Auth->redirectUrl();
    				if($url =='/'){
    					return $this->redirect(['controller' => 'Pages', 'action' => 'display', 'home']);
    				}
    				return $this->redirect( $url );
    			} 
    			else 
    			{
    				$this->Flash->error("Você não possui mais permissão de acesso");
    				return;
    			}
    		}
    		
    		//não possui acesso
    		$this->Flash->error("Você não possui permissão de acesso ou digitou a senha errada.");
    		return $this->redirect($this->Auth->logout());
    	}
    }
    
    public function logout()
    {
    	$this->Flash->success('Você saiu do sistema');
    	return $this->redirect($this->Auth->logout());
    }

    public function vendasFuncionario($id = null)
    {
        $produtosTable = TableRegistry::get('Vendas');
        
        $query = $produtosTable->find('all');
        $query = $query->contain(['Clientes']);
        $query = $query->where(['Vendas.funcionarios_id'=>$id]);
        
        $mes = '';
        $ano = '';
        $total = 0;
        
        if( $this->request->query('mes') )
        {
	        $mes = $this->request->query('mes');
        	$query = $query->where(['MONTH(data)'=>$mes]);
        	$now = Time::now(); //configura o ano padrão corrente
        	$ano = $now->year;
        	$query = $query->where(['YEAR(data)'=>$ano]);
        	$sub_query = clone $query;
        	$total = $sub_query->select(['total'=>'SUM(Vendas.total)'])->first()->total;
        }
        if( $this->request->query('ano') )
        {
	        $ano = $this->request->query('ano');
	        $query = $query->where(['YEAR(data)'=>$ano]);
        }
        
        $vendas = $this->paginate($query);
        
        $this->set(compact('vendas', 'ano', 'mes', 'total'));
        $this->set('_serialize', ['vendas']);
    }
}
