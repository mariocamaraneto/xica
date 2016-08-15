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
        	'conditions' => ['cancelada'=>'0'] ,
        ];
        $vendas = $this->paginate($this->Vendas);

        $this->set(compact('vendas'));
        $this->set('_serialize', ['vendas']);
    }
    
    public function listcanceladas(){
    	$this->paginate = [
    			'contain' => ['Clientes', 'Funcionarios'],
    			'order' => ['data'=>'DESC'],
    			'conditions' => ['cancelada'=>'1'] ,
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
    	return $this->redirect(['action'=>'realiza']);
    	
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
     *Esse metodo não está mais habilitado
     *em seu lugar foi implementado a função CANCELA
     *sendo assim, não é mais permitido editar uma venda
     *somente cancela-la e refaze-la
     */
    public function edit($id = null)
    {
    	return $this->redirect(['action'=>'index']);
    }

    public function cancela($id=null){
    	$venda = $this->Vendas->get($id, [
    			'contain' => ['Produtos']
    	]);
    	
    	$venda->cancelada = 1;
    	foreach ($venda->produtos as $produto){
    		$produto->em_estoque = 1;
    	}
    	
    	$venda->dirty('produtos', true);
    	if($this->Vendas->save($venda, ['associated' => ['Produtos']] )){
    		$this->Flash->success("Cancelamento efetuado com sucesso");
    		return $this->redirect(['action'=>'index']);
    	}
    	
    	
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
	    	$parametros['subtotal'] = $this->request->data['subtotal'];
	    	
	    	$total = 0;
	    	foreach ($parametros['produtos'] as $produto){
	    		$total += $produto->preco; 
	    	}
	    	
	    	//se o total estiver certo continua, senão mostra erro
	    	if($total == $parametros['subtotal'])
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
    		$parametros['numeroParcelas'] = $this->request->data['numeroParcelas'];
    		
    		//recupera produtos da sessão
    		$sessao = $this->request->session();
    		$parametros['produtos'] = $sessao->read('venda')['produtos'];
    		$parametros['subtotal'] = (float) $sessao->read('venda')['subtotal'];
    		
    		//salva no bando de dados as informações de venda
    		$vendaBD = $this->Vendas->newEntity();
    		$vendaBD->subtotal =  $parametros['subtotal'];
    		$vendaBD->desconto = $parametros['desconto'];
    		$vendaBD->total =  $parametros['subtotal']-$parametros['desconto'];
    		$vendaBD->forma_pagamento = $parametros['formaPagamento'];
    		$vendaBD->cliente_id = $parametros['cliente']['id'];
    		$vendaBD->funcionarios_id = $this->Auth->user('id');
    		$vendaBD->numero_parcelas = $parametros['numeroParcelas'];
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
    		
    		//###  GERAÇÂO DE PARCELAS ####
    		$vendaBD->parcelas = [];
    		$parcelasTable = TableRegistry::get('Parcelas');
    		if($vendaBD->forma_pagamento == 'Prazo'){
    			$total = $vendaBD->total;
    			//Para facilitar o troco retira o resto para uma parcela única
    			$resto = fmod($total, $parametros['numeroParcelas']);
    			
    			$totalSemResto = $total - $resto;
    			$valorParcela = $totalSemResto / $parametros['numeroParcelas'];
    			
    			//primeira parcela possui parametro especial do resto
    			$parcelaEntity = $parcelasTable->newEntity();
    			$parcelaEntity->num_parcela = 1;
    			$parcelaEntity->valor_pago = 0;
    			$parcelaEntity->data_vencimento = new Time('+30 days');
    			$parcelaEntity->valor_total = $valorParcela+$resto;
    			array_push(  $vendaBD->parcelas, $parcelaEntity);
    			
    			for ( $i = 2; $i <= $parametros['numeroParcelas']; $i++){
	    			$parcelaEntity = $parcelasTable->newEntity();
	    			$parcelaEntity->num_parcela = $i;
	    			$parcelaEntity->valor_pago = 0;
	    			$parcelaEntity->data_vencimento = new Time( '+'.($i*30).' days' );
	    			$parcelaEntity->valor_total = $valorParcela;
	    			array_push(  $vendaBD->parcelas, $parcelaEntity);
    			}
    		}
    		//### FIM - GERAÇÂO DE PARCELAS ####
    		
    		//Tenta salvar todos os dados
    		if( $this->Vendas->save($vendaBD, ['associated' => ['Parcelas', 'Produtos']])){
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
     * Função responsável por realizar a pesquisa de produtos para mostrar ja janela Modal
     * para o usuário escolher quais produtos.
     * Retorno em json ou xml para requisição ajax. 
     * NÃO POSSUI VIEW CONSTRUIDA
     */
    public function searchProdutos(){
    	if( $this->request->query('search') && $this->request->is('json'))
    	{
    		$produtosTable = TableRegistry::get('Produtos');
    		$produtos = $produtosTable->find("GeralPonderado", ['pesquisa' =>$this->request->query('search')] );
    		$produtos->where(['em_estoque'=>1]);
    		$this->set(compact('produtos'));
    		$this->set('_serialize', ['produtos']);
    	}
    	else 
    	{
    		$this->Flash->error("requisição não permitida");
    		$this->redirect(['action'=>'realiza']);
    	}
    	
    }
    
    
    /**
     * Função responsavel por buscar as informações no banco com as propriedades 
     * especificadas pelo usuário na tela de relatorio de vendas.
     * Ela so executa a função quando receber um 'post' do formulario com as 
     * especificações do relatório.
     * Todos os relacionamneto são buscados no banco de dados para que a interface (view) 
     * possa decidir quais atributos serão mostrados com base nos parametros recebidos
     * de exibição.
     */
    public function relatorios()
    {
    	if($this->request->is('post'))
    	{
    		$parametros = $this->request->data;
    		//inicia a construção do sql com inner join das tabelas 
    		$query = $this->Vendas->find()->contain(['Produtos', 'Funcionarios', 'Clientes']);
    		
    		//relatório de todas vendas realiazadas nos X (intervaloDias) últimos dias 
    		if($parametros['intervaloDias'])
    		{
    			$diasFormatado = $parametros['intervaloDias'].' days ago';
    			$data = new Time($diasFormatado);
    			$query->where(['Vendas.data >' => $data->i18nFormat('yyyy-MM-dd')]);
    		} 
    		//relatório de vendas em um dia exclusivo
    		elseif ($parametros['dia']['day'] != '')
    		{
    			$data = new Time();
    			$data->day($parametros['dia']['day']);
    			$data->month($parametros['mes']['month']);
    			$data->year($parametros['ano']['year']);
    			 
    			$query->where(['Vendas.data' => $data->i18nFormat('yyyy-MM-dd')]);
    		}
    		//relatório de vendas em um mes completo
    		elseif($parametros['mes']['month'] != '')
    		{
    			$data = new Time();
    			$data->month($parametros['mes']['month']);
    			$data->year($parametros['ano']['year']);
    			
    			$data->day('01');
				$query->where(['Vendas.data >=' => $data->i18nFormat('yyyy-MM-dd')]);
				
				$data->day('31');
				$query->where(['Vendas.data <=' => $data->i18nFormat('yyyy-MM-dd')]);
    		}
    		
    		//seleciona produtos com um tipo especifico de pagamento [dinheiro, prazo, cartao, cheque]
    		if($parametros['formaPagamento'] != 'todas'){
    			$query->where(['Vendas.forma_pagamento' => $parametros['formaPagamento']]);
    		}
    		
    		
    		$vendas = $query->all();

    		$this->set(compact('vendas'));
    		$this->set('_serialize', ['vendas']);
    		
    		$this->set(compact('parametros'));
    		$this->render('index');
    	}
    }
    
}
