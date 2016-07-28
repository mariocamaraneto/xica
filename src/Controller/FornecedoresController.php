<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Fornecedores Controller
 *
 * @property \App\Model\Table\FornecedoresTable $Fornecedores
 */
class FornecedoresController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
    	if ($this->request->query('search'))
    	{	//se possui 'search' então é uma pesquisa
    		$this->paginate = [ 
    				'fields' => ['Fornecedores.id','Fornecedores.nome', 'Fornecedores.telefone'],
					'conditions'=>["Fornecedores.nome LIKE" => '%'.$this->request->query('search').'%'],
    			];
    		$fornecedores = $this->paginate($this->Fornecedores);
    		if(!$fornecedores->count())
    		{
    			//não é uma mensagem de sucesso mas é mais bonita que aquele vermelhão de erro
    			$this->Flash->success("Nenhuma fornecedora encontrada");
    		}
    	} else
    	{	//retorna todos os fornecedores
    		$this->paginate = ['fields' => ['Fornecedores.id', 'Fornecedores.nome', 'Fornecedores.telefone']];
	        $fornecedores = $this->paginate($this->Fornecedores);
    	}
    	
        $this->set(compact('fornecedores'));
        $this->set('_serialize', ['fornecedores']);
    }

    /**
     * View method
     *
     * @param string|null $id Fornecedor id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $fornecedor = $this->Fornecedores->get($id, [
            'contain' => ['Produtos']
        ]);

        $this->set('fornecedor', $fornecedor);
        $this->set('_serialize', ['fornecedor']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $fornecedor = $this->Fornecedores->newEntity();
        if ($this->request->is('post')) {
            $fornecedor = $this->Fornecedores->patchEntity($fornecedor, $this->request->data);
            if ($this->Fornecedores->save($fornecedor)) {
                $this->Flash->success(__('O fornecedor foi cadastrado com sucesso.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('As informações do fornecedor não foram salvas. Confira os dados e tente novamente.'));
            }
        }
        $this->set(compact('fornecedor'));
        $this->set('_serialize', ['fornecedor']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Fornecedor id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $fornecedor = $this->Fornecedores->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $fornecedor = $this->Fornecedores->patchEntity($fornecedor, $this->request->data);
            if ($this->Fornecedores->save($fornecedor)) {
                $this->Flash->success(__('As alterações foram salvas com sucesso.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('As alterações não foram salvas. Confira os dados e tente novamente.'));
            }
        }
        $this->set(compact('fornecedor'));
        $this->set('_serialize', ['fornecedor']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Fornecedor id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $fornecedor = $this->Fornecedores->get($id);
        try {
        	$this->Fornecedores->delete($fornecedor);
            $this->Flash->success(__('O fornecedor foi deletado com sucesso'));
        } 
        catch (\Exception $e){
            $this->Flash->error(__('Esse fornecedor não pode ser deletado. Existe movimentações em seu nome'));
        }
        finally
        {
        	return $this->redirect(['action' => 'index']);
        }
    }
}
