<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Parcelas Controller
 *
 * @property \App\Model\Table\ParcelasTable $Parcelas
 */
class ParcelasController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Vendas']
        ];
        $parcelas = $this->paginate($this->Parcelas);

        $this->set(compact('parcelas'));
        $this->set('_serialize', ['parcelas']);
    }

    /**
     * View method
     *
     * @param string|null $id Parcela id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $parcela = $this->Parcelas->get($id, [
            'contain' => ['Vendas', 'Recebimentos']
        ]);

        $this->set('parcela', $parcela);
        $this->set('_serialize', ['parcela']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $parcela = $this->Parcelas->newEntity();
        if ($this->request->is('post')) {
            $parcela = $this->Parcelas->patchEntity($parcela, $this->request->data);
            if ($this->Parcelas->save($parcela)) {
                $this->Flash->success(__('The parcela has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The parcela could not be saved. Please, try again.'));
            }
        }
        $vendas = $this->Parcelas->Vendas->find('list', ['limit' => 200]);
        $recebimentos = $this->Parcelas->Recebimentos->find('list', ['limit' => 200]);
        $this->set(compact('parcela', 'vendas', 'recebimentos'));
        $this->set('_serialize', ['parcela']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Parcela id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $parcela = $this->Parcelas->get($id, [
            'contain' => ['Recebimentos']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $parcela = $this->Parcelas->patchEntity($parcela, $this->request->data);
            if ($this->Parcelas->save($parcela)) {
                $this->Flash->success(__('The parcela has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The parcela could not be saved. Please, try again.'));
            }
        }
        $vendas = $this->Parcelas->Vendas->find('list', ['limit' => 200]);
        $recebimentos = $this->Parcelas->Recebimentos->find('list', ['limit' => 200]);
        $this->set(compact('parcela', 'vendas', 'recebimentos'));
        $this->set('_serialize', ['parcela']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Parcela id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $parcela = $this->Parcelas->get($id);
        if ($this->Parcelas->delete($parcela)) {
            $this->Flash->success(__('The parcela has been deleted.'));
        } else {
            $this->Flash->error(__('The parcela could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
