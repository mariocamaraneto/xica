<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\I18n\Time;
use Cake\ORM\TableRegistry;

/**
 * Vendas Controller
 *
 * @property \App\Model\Table\VendasTable $Vendas
 */
class VendasController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Clientes', 'Funcionarios'],
        	'order' => ['data'=>'DESC'],
        ];
        $vendas = $this->paginate($this->Vendas);

        $this->set(compact('vendas'));
        $this->set('_serialize', ['vendas']);
    }

    /**
     * View method
     *
     * @param string|null $id Venda id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $venda = $this->Vendas->get($id, [
            'contain' => ['Clientes', 'Funcionarios', 'Produtos']
        ]);

        $this->set('venda', $venda);
        $this->set('_serialize', ['venda']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $venda = $this->Vendas->newEntity();
        if ($this->request->is('post')) {
            $venda = $this->Vendas->patchEntity($venda, $this->request->data);
            if ($this->Vendas->save($venda)) {
                $this->Flash->success(__('The venda has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The venda could not be saved. Please, try again.'));
            }
        }
        $clientes = $this->Vendas->Clientes->find('list', ['limit' => 200]);
        $funcionarios = $this->Vendas->Funcionarios->find('list', ['limit' => 200]);
        $produtos = $this->Vendas->Produtos->find('list', ['limit' => 200]);
        $this->set(compact('venda', 'clientes', 'funcionarios', 'produtos'));
        $this->set('_serialize', ['venda']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Venda id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $venda = $this->Vendas->get($id, [
            'contain' => ['Produtos']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $venda = $this->Vendas->patchEntity($venda, $this->request->data);
            if ($this->Vendas->save($venda)) {
                $this->Flash->success(__('The venda has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The venda could not be saved. Please, try again.'));
            }
        }
        $clientes = $this->Vendas->Clientes->find('list', ['limit' => 200]);
        $funcionarios = $this->Vendas->Funcionarios->find('list', ['limit' => 200]);
        $produtos = $this->Vendas->Produtos->find('list', ['limit' => 200]);
        $this->set(compact('venda', 'clientes', 'funcionarios', 'produtos'));
        $this->set('_serialize', ['venda']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Venda id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $venda = $this->Vendas->get($id);
        if ($this->Vendas->delete($venda)) {
            $this->Flash->success(__('The venda has been deleted.'));
        } else {
            $this->Flash->error(__('The venda could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
    
    /**
     * Controller responsável por realizar uma venda
     */
    public function realiza()
    {

    }
    
    /**
     * Controller responsável por finalizar uma venda
     * realizando algumas validações e efetuando o procedimentos necessários
     * para a conclusão da venda
     */
    public function finaliza(){
    	
    	if ($this->request->is('post')){
    		//recupera os valor enviados por 'post'
    		$parametros = [];
	    	$parametros['produtos'] = json_decode($this->request->data['produtos']);
	    	$parametros['total'] = $this->request->data['total'];
	    	
	    	$total = 0;
	    	foreach ($parametros['produtos'] as $produto){
	    		$total += $produto->preco; 
	    	}
	    	
	    	//se o total estiver certo continua, senão mostra erro
	    	if($total == $parametros['total'])
	    	{
		    	//armazena isso na sessão para a próxima etapa
		    	$sessao = $this->request->session();
	    		$sessao->write('venda', $parametros);
	    	
	    		//envia parametros para view
	    		$this->set($parametros);
				$this->set('_serialize', ['produtos','total']);
				return ;
	    	}
    	}
    	
		//Se não for um requisição 'post', ou seja, acessou a função digitando a action na url direto
		//Ou algo não deu certo -> validação, sessão, retorna um erro
		$this->Flash->error("Algo está errado. Realize a venda novamente.");
		return $this->redirect([
				'controller' => 'vendas', 
				'action' => 'realiza'					
			]);

    }

    public function conclui(){
    	if ($this->request->is('post')){
    		//recupera os valor enviados por 'post'
    		$parametros = [];
    		$parametros['cliente'] = json_decode($this->request->data['cliente']);
    		$parametros['desconto'] = (float)  $this->request->data['desconto'];
    		$parametros['formaPagamento'] = $this->request->data['formaPagamento'];
    		
    		//recupera produtos da sessão
    		$sessao = $this->request->session();
    		$parametros['produtos'] = $sessao->read('venda')['produtos'];
    		$parametros['total'] = (float) $sessao->read('venda')['total'];
    		
    		//salva no bando de dados as informações de venda
    		$vendaBD = $this->Vendas->newEntity();
    		$vendaBD->total =  $parametros['total'];
    		$vendaBD->desconto = $parametros['desconto'];
    		$vendaBD->forma_pagamento = $parametros['formaPagamento'];
    		$vendaBD->cliente_id = $parametros['cliente']->id;
    		$vendaBD->funcionarios_id = $this->Auth->user('id');
    		$vendaBD->data = Time::now();
    		
    		//linka todos os produtos (join) =>  populariza a 3 tabela N:N e retira do estoque os produtos vendidos
    		$vendaBD->produtos = [];
    		$produtosTable = TableRegistry::get('Produtos');
    		foreach ($parametros['produtos'] as $produto)
    		{
    			$produtoEntity = $produtosTable->find()
    							->where(['id'=>$produto->id])
    							->first();
    			$produtoEntity->em_estoque = 0;
    			array_push(  $vendaBD->produtos, $produtoEntity);
    		}
    		
    		//Tenta salvar todos os dados
    		if( $this->Vendas->save($vendaBD)){
    			$this->Flash->success("Venda efetuada com sucesso");
    		}
    		else 
    		{
    			$this->Flash->error("Ocorreu problemas ao salvar venda, por favor tente novamente");
    		}
    		
    		
    		return $this->redirect(['action'=>'realiza']);
    		//envia parametros para view
    		$this->set($parametros);
    		$this->set('_serialize', ['cliente','desconto','formaPagamento', 'produtos', 'total']);
    	}
    	else 
    	{
    		$this->Flash->error("É necessário selecionar os produtos primeiro.");
    		$this->redirect(['action'=>'realiza']);
    	}
    }
    
    /**
     * Função responsável por realizar a pesquisa de produtos 
     */
    public function searchProdutos(){
    	if( $this->request->query('search') )
    	{
    		$produtosTable = TableRegistry::get('Produtos');
    		$produtos = $produtosTable->find("GeralPonderado", ['pesquisa' =>$this->request->query('search')] );
    		$produtos->where(['em_estoque'=>1]);
    		$this->set(compact('produtos'));
    		$this->set('_serialize', ['produtos']);
    	}
    	
    }
    
}
