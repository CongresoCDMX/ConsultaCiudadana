<?php namespace App\Controller;

use App\Controller\AppController;

/**
 *  * Partido Controller
 *   *
 *    * @property \App\Model\Table\PartidoTable $Partido
 *     *
 *      * @method \App\Model\Entity\Partido[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 *       */
class PartidoController extends AppController
{

    /**
 *      * Index method
 *           *
 *                * @return \Cake\Http\Response|void
 *                     */
    public function index()
    {
        $this->viewBuilder()->setLayout('dash');

        $partido = $this->paginate($this->Partido);

        $this->set(compact('partido'));
    }

    /**
 *      * View method
 *           *
 *                * @param string|null $id Partido id.
 *                     * @return \Cake\Http\Response|void
 *                          * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
 *                               */
    public function view($id = null)
    {
        //$this->viewBuilder()->setLayout('dash');

	        $partido = $this->Partido->get($id, [
			            'contain' => []
				            ]);

	        $this->set('partido', $partido);
	    }

        /**
	 *      * Add method
	 *           *
	 *                * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
	 *                     */
        public function add()
		    {
			            $this->viewBuilder()->setLayout('dash');

				            $partido = $this->Partido->newEntity();
				            if ($this->request->is('post')) {
						                $partido = $this->Partido->patchEntity($partido, $this->request->getData());
								            if ($this->Partido->save($partido)) {
										                    $this->Flash->success(__('The partido has been saved.'));

												                    return $this->redirect(['action' => 'index']);
												                }
								            $this->Flash->error(__('The partido could not be saved. Please, try again.'));
								        }
					            $this->set(compact('partido'));
					        }

        /**
	 *      * Edit method
	 *           *
	 *                * @param string|null $id Partido id.
	 *                     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
	 *                          * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
	 *                               */
        public function edit($id = null)
		    {
			            $this->viewBuilder()->setLayout('dash');

				            $partido = $this->Partido->get($id, [
						                'contain' => []
								        ]);
				            if ($this->request->is(['patch', 'post', 'put'])) {
						                $partido = $this->Partido->patchEntity($partido, $this->request->getData());
								            if ($this->Partido->save($partido)) {
										                    $this->Flash->success(__('The partido has been saved.'));

												                    return $this->redirect(['action' => 'index']);
												                }
								            $this->Flash->error(__('The partido could not be saved. Please, try again.'));
								        }
				            $this->set(compact('partido'));
				        }

        /**
	 *      * Delete method
	 *           *
	 *                * @param string|null $id Partido id.
	 *                     * @return \Cake\Http\Response|null Redirects to index.
	 *                          * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
	 *                               */
        public function delete($id = null)
		    {
			            $this->request->allowMethod(['post', 'delete']);
				            $partido = $this->Partido->get($id);
				            if ($this->Partido->delete($partido)) {
						                $this->Flash->success(__('The partido has been deleted.'));
								        } else {
										            $this->Flash->error(__('The partido could not be deleted. Please, try again.'));
											            }

					            return $this->redirect(['action' => 'index']);
					        }
    }

