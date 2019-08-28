<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * ProposicionDiputado Controller
 *
 * @property \App\Model\Table\ProposicionDiputadoTable $ProposicionDiputado
 *
 * @method \App\Model\Entity\ProposicionDiputado[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ProposicionDiputadoController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $proposicionDiputado = $this->paginate($this->ProposicionDiputado);

        $this->set(compact('proposicionDiputado'));
    }

    /**
     * View method
     *
     * @param string|null $id Proposicion Diputado id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $proposicionDiputado = $this->ProposicionDiputado->get($id, [
            'contain' => []
        ]);

        $this->set('proposicionDiputado', $proposicionDiputado);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $proposicionDiputado = $this->ProposicionDiputado->newEntity();
        if ($this->request->is('post')) {
            $proposicionDiputado = $this->ProposicionDiputado->patchEntity($proposicionDiputado, $this->request->getData());
            if ($this->ProposicionDiputado->save($proposicionDiputado)) {
                $this->Flash->success(__('The proposicion diputado has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The proposicion diputado could not be saved. Please, try again.'));
        }
        $this->set(compact('proposicionDiputado'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Proposicion Diputado id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $proposicionDiputado = $this->ProposicionDiputado->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $proposicionDiputado = $this->ProposicionDiputado->patchEntity($proposicionDiputado, $this->request->getData());
            if ($this->ProposicionDiputado->save($proposicionDiputado)) {
                $this->Flash->success(__('The proposicion diputado has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The proposicion diputado could not be saved. Please, try again.'));
        }
        $this->set(compact('proposicionDiputado'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Proposicion Diputado id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $proposicionDiputado = $this->ProposicionDiputado->get($id);
        if ($this->ProposicionDiputado->delete($proposicionDiputado)) {
            $this->Flash->success(__('The proposicion diputado has been deleted.'));
        } else {
            $this->Flash->error(__('The proposicion diputado could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
