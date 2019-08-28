<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 *  * Turnado Controller
 *   *
 *    * @property \App\Model\Table\TurnadoTable $Turnado
 *     *
 *      * @method \App\Model\Entity\Turnado[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 *       */
class TurnadoController extends AppController
{

    /**
 *      * Index method
 *           *
 *                * @return \Cake\Http\Response|void
 *                     */
    public function index()
    {

        //$this->viewBuilder()->setLayout('dash');

        $turnado = $this->paginate($this->Turnado);

        $this->set(compact('turnado'));
    }

    /**
 *      * View method
 *           *
 *                * @param string|null $id Turnado id.
 *                     * @return \Cake\Http\Response|void
 *                          * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
 *                               */
    public function view($id = null)
    {

	            //$this->viewBuilder()->setLayout('dash');

		            $turnado = $this->Turnado->get($id, [
				                'contain' => []
						        ]);

		            $this->set('turnado', $turnado);
		        }

        /**
	 *      * Add method
	 *           *
	 *                * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
	 *                     */
        public function add()
		    {

			            //$this->viewBuilder()->setLayout('dash');

				            $turnado = $this->Turnado->newEntity();
				            if ($this->request->is('post')) {
						                $turnado = $this->Turnado->patchEntity($turnado, $this->request->getData());
								            if ($this->Turnado->save($turnado)) {
										                    $this->Flash->success(__('The turnado has been saved.'));

												                    return $this->redirect(['action' => 'index']);
												                }
								            $this->Flash->error(__('The turnado could not be saved. Please, try again.'));
								        }
					            $this->set(compact('turnado'));
					        }

        /**
	 *      * Edit method
	 *           *
	 *                * @param string|null $id Turnado id.
	 *                     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
	 *                          * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
	 *                               */
        public function edit($id = null)
		    {

			            //$this->viewBuilder()->setLayout('dash');

				            $turnado = $this->Turnado->get($id, [
						                'contain' => []
								        ]);
				            if ($this->request->is(['patch', 'post', 'put'])) {
						                $turnado = $this->Turnado->patchEntity($turnado, $this->request->getData());
								            if ($this->Turnado->save($turnado)) {
										                    $this->Flash->success(__('The turnado has been saved.'));

												                    return $this->redirect(['action' => 'index']);
												                }
								            $this->Flash->error(__('The turnado could not be saved. Please, try again.'));
								        }
				            $this->set(compact('turnado'));
				        }

        /**
	 *      * Delete method
	 *           *
	 *                * @param string|null $id Turnado id.
	 *                     * @return \Cake\Http\Response|null Redirects to index.
	 *                          * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
	 *                               */
        public function delete($id = null)
		    {
			            $this->request->allowMethod(['post', 'delete']);
				            $turnado = $this->Turnado->get($id);
				            if ($this->Turnado->delete($turnado)) {
						                $this->Flash->success(__('The turnado has been deleted.'));
								        } else {
										            $this->Flash->error(__('The turnado could not be deleted. Please, try again.'));
											            }

					            return $this->redirect(['action' => 'index']);
					        }
    }

