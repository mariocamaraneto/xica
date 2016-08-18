<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\I18n\Time;

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
    		$this->paginate = ['order'=>['id'=>'DESC'],
    						'conditions' => ['em_estoque'=>'1'],
    		];
	        $produtos = $this->paginate($this->Produtos);
    	}
    	
    	//retorna todos os valores para a View
        $this->set(compact('produtos'));
        $this->set('_serialize', ['produtos']);

    }

    public function listForaEstoque(){
    	$this->paginate = ['order'=>['id'=>'DESC'],
    			'conditions' => ['em_estoque'=>'0'],
    	];
    	$produtos = $this->paginate($this->Produtos);
    	 
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
                $this->Flash->success(__('O produto foi cadastrado com sucesso.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('O Produto não foi salvo. Confira os dados e tente novamente.'));
            }
        }
        $fornecedores = $this->Produtos->Fornecedores->find('all')->select(['id','nome']);
        $vendas = $this->Produtos->Vendas->find('list', ['limit' => 200]);
        
        $ref = $this->Produtos->find('all')->select(['referencia'])->max('referencia')->referencia;
        if($ref < 20000){
        	$ref = 19999;
        }
        $ref += 1;
        $produto->referencia = $ref;
        
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
                $this->Flash->success(__('As alterações foram salvas com sucesso.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('As alterações não foram salvas. Confira os dados e tente novamente.'));
            }
        }
        $fornecedores = $this->Produtos->Fornecedores->find('all')->select(['id','nome']);
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
            $this->Flash->success(__('O produto foi deletado com sucesso.'));
        } else {
            $this->Flash->error(__('Esse produto não pode ser deletado.'));
        }
        return $this->redirect(['action' => 'index']);
    }
    
    public function relatorios() {
    	
    	if( $this->request->is('post') )
    	{
     		$query = $this->Produtos->find()->distinct(['Produtos.id']);

    		$query = $query->select(['referencia', 'nome', 'preco', 'em_estoque', 'id']);
    		if( $this->request->data['tipo'] == 'emEstoque')
    		{
    			$query = $query->where(['em_estoque' => '1']);
    		}
    		elseif ($this->request->data['tipo'] == 'foraEstoque')
    		{
    			$query = $query->where(['em_estoque' => '0']);
    		}

    		if($this->request->data['intervaloDiasVendidos'])
    		{
    			$diasFormatado = $this->request->data['intervaloDiasVendidos'].' days ago';
    			$data = new Time($diasFormatado);
    			$query = $query->matching('Vendas', function ($query) use ($data) {
    				return $query->where(['Vendas.data >' => $data->i18nFormat('yyyy-MM-dd')]);
    			});
    		}
    		
    		if($this->request->data['ordenacao'] == 'referencia')
    		{
    			$query->order(['Produtos.referencia'=>"ASC"]);
    		}
    		else
    		{
    			$query->order(['Produtos.nome'=>"ASC"]);
    		}
    		
    		$produtos = $this->paginate($query);
    		 
    		//retorna todos os valores para a View
    		$this->set(compact('produtos'));
    		
    		
    		$this->set('_serialize', ['produtos']);
    		//altera a view padrão
			$this->render('index');    		
    	}
    }

}
