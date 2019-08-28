<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Estatus Controller
 *
 * @property \App\Model\Table\EstatusTable $Estatus
 *
 * @method \App\Model\Entity\Estatus[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class EstatusController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {

        //$this->viewBuilder()->setLayout('dash');

        $estatus = $this->paginate($this->Estatus);

        $this->set(compact('estatus'));
    }

    /**
     * View method
     *
     * @param string|null $id Estatus id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        //$this->viewBuilder()->setLayout('dash');

        $estatus = $this->Estatus->get($id, [
            'contain' => []
        ]);

        $this->set('estatus', $estatus);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        //$this->viewBuilder()->setLayout('dash');

        $estatus = $this->Estatus->newEntity();
        if ($this->request->is('post')) {
            $estatus = $this->Estatus->patchEntity($estatus, $this->request->getData());
            if ($this->Estatus->save($estatus)) {
                $this->Flash->success(__('The estatus has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The estatus could not be saved. Please, try again.'));
        }
        $this->set(compact('estatus'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Estatus id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        //$this->viewBuilder()->setLayout('dash');

        $estatus = $this->Estatus->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $estatus = $this->Estatus->patchEntity($estatus, $this->request->getData());
            if ($this->Estatus->save($estatus)) {
                $this->Flash->success(__('The estatus has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The estatus could not be saved. Please, try again.'));
        }
        $this->set(compact('estatus'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Estatus id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $estatus = $this->Estatus->get($id);
        if ($this->Estatus->delete($estatus)) {
            $this->Flash->success(__('The estatus has been deleted.'));
        } else {
            $this->Flash->error(__('The estatus could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
