<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * IniciativaDiputados Controller
 *
 * @property \App\Model\Table\IniciativaDiputadosTable $IniciativaDiputados
 *
 * @method \App\Model\Entity\IniciativaDiputado[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class IniciativaDiputadosController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $iniciativaDiputados = $this->paginate($this->IniciativaDiputados);

        $this->set(compact('iniciativaDiputados'));
    }

    /**
     * View method
     *
     * @param string|null $id Iniciativa Diputado id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $iniciativaDiputado = $this->IniciativaDiputados->get($id, [
            'contain' => []
        ]);

        $this->set('iniciativaDiputado', $iniciativaDiputado);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $iniciativaDiputado = $this->IniciativaDiputados->newEntity();
        if ($this->request->is('post')) {
            $iniciativaDiputado = $this->IniciativaDiputados->patchEntity($iniciativaDiputado, $this->request->getData());
            if ($this->IniciativaDiputados->save($iniciativaDiputado)) {
                $this->Flash->success(__('The iniciativa diputado has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The iniciativa diputado could not be saved. Please, try again.'));
        }
        $this->set(compact('iniciativaDiputado'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Iniciativa Diputado id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $iniciativaDiputado = $this->IniciativaDiputados->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $iniciativaDiputado = $this->IniciativaDiputados->patchEntity($iniciativaDiputado, $this->request->getData());
            if ($this->IniciativaDiputados->save($iniciativaDiputado)) {
                $this->Flash->success(__('The iniciativa diputado has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The iniciativa diputado could not be saved. Please, try again.'));
        }
        $this->set(compact('iniciativaDiputado'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Iniciativa Diputado id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $iniciativaDiputado = $this->IniciativaDiputados->get($id);
        if ($this->IniciativaDiputados->delete($iniciativaDiputado)) {
            $this->Flash->success(__('The iniciativa diputado has been deleted.'));
        } else {
            $this->Flash->error(__('The iniciativa diputado could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
