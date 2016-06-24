<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Produtos Controller
 *
 * @property \App\Model\Table\ProdutosTable $Produtos
 */
class ProdutosController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
    	if( $this->request->query('search') )
    	{
    		//tratamento para busca por palavras
    		//ou seja, adiciona-se coringa entre cada palavra
    		//assim busca-se todos as palavras digitadas
//     		$qFrase = str_replace(" ", "%", $this->request->query('search'));
//     		$this->paginate = ['conditions' => [
//     						'or'=>[
//     								'Produtos.nome RLIKe' => '%'.$this->request->query('search').'%',
//     								'Produtos.referencia RLIKE' => '%'.$this->request->query('search').'%',
//     								'Produtos.descricao like' => '%'.$this->request->query('search').'%'
//     								]
//     					]
//     			];
//     		$produtos=$this->paginate($this->Produtos);
//     		debug($produtos->find());

     		$produtos = $this->Produtos->find("GeralPonderado", ['pesquisa' =>$this->request->query('search')] );

//     		$palavras = str_replace(" ", "|", $this->request->query('search'));
//     		$this->paginate = ['conditions' => ['Produtos.nome RLIKe' =>   '('.$palavras.')'  ] ];
//     		$produtos=$this->paginate($this->Produtos);
//     		debug($produtos);
    		
     		if(!$produtos->count())
     		{
     			//não é uma mensagem de sucesso mas é mais bonita que aquele vermelhão de erro
     			$this->Flash->success("Nenhum produto encontrado");
     		}
    		
    		
    	}else 
    	{
	        $produtos = $this->paginate($this->Produtos);
    	}
    	
    	//retorna todos os valores para a View
        $this->set(compact('produtos'));
        $this->set('_serialize', ['produtos']);

    }

    /**
     * View method
     *
     * @param string|null $id Produto id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $produto = $this->Produtos->get($id, [
            'contain' => ['Fornecedores', 'Vendas']
        ]);

        $this->set('produto', $produto);
        $this->set('_serialize', ['produto']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $produto = $this->Produtos->newEntity();
        if ($this->request->is('post')) {
            $produto = $this->Produtos->patchEntity($produto, $this->request->data);
            if ($this->Produtos->save($produto)) {
                $this->Flash->success(__('The produto has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The produto could not be saved. Please, try again.'));
            }
        }
        $fornecedores = $this->Produtos->Fornecedores->find('list', ['limit' => 200]);
        $vendas = $this->Produtos->Vendas->find('list', ['limit' => 200]);
        $this->set(compact('produto', 'fornecedores', 'vendas'));
        $this->set('_serialize', ['produto']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Produto id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $produto = $this->Produtos->get($id, [
            'contain' => ['Vendas']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $produto = $this->Produtos->patchEntity($produto, $this->request->data);
            if ($this->Produtos->save($produto)) {
                $this->Flash->success(__('The produto has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The produto could not be saved. Please, try again.'));
            }
        }
        $fornecedores = $this->Produtos->Fornecedores->find('list', ['limit' => 200]);
        $vendas = $this->Produtos->Vendas->find('list', ['limit' => 200]);
        $this->set(compact('produto', 'fornecedores', 'vendas'));
        $this->set('_serialize', ['produto']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Produto id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $produto = $this->Produtos->get($id);
        if ($this->Produtos->delete($produto)) {
            $this->Flash->success(__('The produto has been deleted.'));
        } else {
            $this->Flash->error(__('The produto could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
    
    public function search()
    {
    	$palavras = $this->request->params;
    	debug($palavras);
    	exit();
    }
}