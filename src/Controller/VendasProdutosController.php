<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * VendasProdutos Controller
 *
 * @property \App\Model\Table\VendasProdutosTable $VendasProdutos
 */
class VendasProdutosController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Vendas', 'Produtos', 'Pagamentos']
        ];
        $vendasProdutos = $this->paginate($this->VendasProdutos);

        $this->set(compact('vendasProdutos'));
        $this->set('_serialize', ['vendasProdutos']);
    }

    /**
     * View method
     *
     * @param string|null $id Vendas Produto id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $vendasProduto = $this->VendasProdutos->get($id, [
            'contain' => ['Vendas', 'Produtos', 'Pagamentos']
        ]);

        $this->set('vendasProduto', $vendasProduto);
        $this->set('_serialize', ['vendasProduto']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $vendasProduto = $this->VendasProdutos->newEntity();
        if ($this->request->is('post')) {
            $vendasProduto = $this->VendasProdutos->patchEntity($vendasProduto, $this->request->data);
            if ($this->VendasProdutos->save($vendasProduto)) {
                $this->Flash->success(__('The vendas produto has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The vendas produto could not be saved. Please, try again.'));
            }
        }
        $vendas = $this->VendasProdutos->Vendas->find('list', ['limit' => 200]);
        $produtos = $this->VendasProdutos->Produtos->find('list', ['limit' => 200]);
        $pagamentos = $this->VendasProdutos->Pagamentos->find('list', ['limit' => 200]);
        $this->set(compact('vendasProduto', 'vendas', 'produtos', 'pagamentos'));
        $this->set('_serialize', ['vendasProduto']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Vendas Produto id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $vendasProduto = $this->VendasProdutos->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $vendasProduto = $this->VendasProdutos->patchEntity($vendasProduto, $this->request->data);
            if ($this->VendasProdutos->save($vendasProduto)) {
                $this->Flash->success(__('The vendas produto has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The vendas produto could not be saved. Please, try again.'));
            }
        }
        $vendas = $this->VendasProdutos->Vendas->find('list', ['limit' => 200]);
        $produtos = $this->VendasProdutos->Produtos->find('list', ['limit' => 200]);
        $pagamentos = $this->VendasProdutos->Pagamentos->find('list', ['limit' => 200]);
        $this->set(compact('vendasProduto', 'vendas', 'produtos', 'pagamentos'));
        $this->set('_serialize', ['vendasProduto']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Vendas Produto id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $vendasProduto = $this->VendasProdutos->get($id);
        if ($this->VendasProdutos->delete($vendasProduto)) {
            $this->Flash->success(__('The vendas produto has been deleted.'));
        } else {
            $this->Flash->error(__('The vendas produto could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
