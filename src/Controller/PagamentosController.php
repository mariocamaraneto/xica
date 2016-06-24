<?php
namespace App\Controller;

use App\Controller\AppController;

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
}
