<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;
use Cake\I18n\Time;

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
    		
    		//faz o select das informações que serão enviadas
    		$produtos = $produtosTable->find("all");
    		$produtos->select(['id', 'nome', 'custo_bruto', 'referencia']);
    		
    		//busca todos os produtos que são deste fornecedor
    		$produtos->where(['Produtos.fornecedor_id'=> $this->request->query('search')]);
    		
    		//faz inner join com a tabela de vendas com as vendas com datas maior de 30 dias
    		$produtos->matching('Vendas',function ($q){
    			return $q->where(  ['Vendas.data >' => new Time('30 days ago')]  );
    		});
    		
    		//filtra para aquelas que não foram pagas ainda
    		$produtos->where(['VendasProdutos.pagamento_id IS'=>null]);
    		
    		$this->set(compact('produtos'));
    		//$this->set('produtosD',debug($produtos));
    		$this->set('_serialize', ['produtos','produtosD']);
    		
    	}
    	else
    	{
    		$this->Flash->error("Requisição não permitida");
    		$this->redirect(['action' => 'realiza']);
    	}
    }
    
    
}
