<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Recebimentos Controller
 *
 * @property \App\Model\Table\RecebimentosTable $Recebimentos
 */
class RecebimentosController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Funcionarios']
        ];
        $recebimentos = $this->paginate($this->Recebimentos);

        $this->set(compact('recebimentos'));
        $this->set('_serialize', ['recebimentos']);
    }

    /**
     * View method
     *
     * @param string|null $id Recebimento id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $recebimento = $this->Recebimentos->get($id, [
            'contain' => ['Funcionarios', 'Parcelas']
        ]);

        $this->set('recebimento', $recebimento);
        $this->set('_serialize', ['recebimento']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $recebimento = $this->Recebimentos->newEntity();
        if ($this->request->is('post')) {
            $recebimento = $this->Recebimentos->patchEntity($recebimento, $this->request->data);
            if ($this->Recebimentos->save($recebimento)) {
                $this->Flash->success(__('The recebimento has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The recebimento could not be saved. Please, try again.'));
            }
        }
        $funcionarios = $this->Recebimentos->Funcionarios->find('list', ['limit' => 200]);
        $parcelas = $this->Recebimentos->Parcelas->find('list', ['limit' => 200]);
        $this->set(compact('recebimento', 'funcionarios', 'parcelas'));
        $this->set('_serialize', ['recebimento']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Recebimento id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $recebimento = $this->Recebimentos->get($id, [
            'contain' => ['Parcelas']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $recebimento = $this->Recebimentos->patchEntity($recebimento, $this->request->data);
            if ($this->Recebimentos->save($recebimento)) {
                $this->Flash->success(__('The recebimento has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The recebimento could not be saved. Please, try again.'));
            }
        }
        $funcionarios = $this->Recebimentos->Funcionarios->find('list', ['limit' => 200]);
        $parcelas = $this->Recebimentos->Parcelas->find('list', ['limit' => 200]);
        $this->set(compact('recebimento', 'funcionarios', 'parcelas'));
        $this->set('_serialize', ['recebimento']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Recebimento id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $recebimento = $this->Recebimentos->get($id);
        if ($this->Recebimentos->delete($recebimento)) {
            $this->Flash->success(__('The recebimento has been deleted.'));
        } else {
            $this->Flash->error(__('The recebimento could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
