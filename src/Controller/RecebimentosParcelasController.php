<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * RecebimentosParcelas Controller
 *
 * @property \App\Model\Table\RecebimentosParcelasTable $RecebimentosParcelas
 */
class RecebimentosParcelasController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Parcelas', 'Recebimentos']
        ];
        $recebimentosParcelas = $this->paginate($this->RecebimentosParcelas);

        $this->set(compact('recebimentosParcelas'));
        $this->set('_serialize', ['recebimentosParcelas']);
    }

    /**
     * View method
     *
     * @param string|null $id Recebimentos Parcela id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $recebimentosParcela = $this->RecebimentosParcelas->get($id, [
            'contain' => ['Parcelas', 'Recebimentos']
        ]);

        $this->set('recebimentosParcela', $recebimentosParcela);
        $this->set('_serialize', ['recebimentosParcela']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $recebimentosParcela = $this->RecebimentosParcelas->newEntity();
        if ($this->request->is('post')) {
            $recebimentosParcela = $this->RecebimentosParcelas->patchEntity($recebimentosParcela, $this->request->data);
            if ($this->RecebimentosParcelas->save($recebimentosParcela)) {
                $this->Flash->success(__('The recebimentos parcela has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The recebimentos parcela could not be saved. Please, try again.'));
            }
        }
        $parcelas = $this->RecebimentosParcelas->Parcelas->find('list', ['limit' => 200]);
        $recebimentos = $this->RecebimentosParcelas->Recebimentos->find('list', ['limit' => 200]);
        $this->set(compact('recebimentosParcela', 'parcelas', 'recebimentos'));
        $this->set('_serialize', ['recebimentosParcela']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Recebimentos Parcela id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $recebimentosParcela = $this->RecebimentosParcelas->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $recebimentosParcela = $this->RecebimentosParcelas->patchEntity($recebimentosParcela, $this->request->data);
            if ($this->RecebimentosParcelas->save($recebimentosParcela)) {
                $this->Flash->success(__('The recebimentos parcela has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The recebimentos parcela could not be saved. Please, try again.'));
            }
        }
        $parcelas = $this->RecebimentosParcelas->Parcelas->find('list', ['limit' => 200]);
        $recebimentos = $this->RecebimentosParcelas->Recebimentos->find('list', ['limit' => 200]);
        $this->set(compact('recebimentosParcela', 'parcelas', 'recebimentos'));
        $this->set('_serialize', ['recebimentosParcela']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Recebimentos Parcela id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $recebimentosParcela = $this->RecebimentosParcelas->get($id);
        if ($this->RecebimentosParcelas->delete($recebimentosParcela)) {
            $this->Flash->success(__('The recebimentos parcela has been deleted.'));
        } else {
            $this->Flash->error(__('The recebimentos parcela could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
