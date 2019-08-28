<?php

namespace App\Controller;

use App\Controller\AppController;

/**
 *  * Diputado Controller
 *   *
 *    * @property \App\Model\Table\DiputadoTable $Diputado
 *     *
 *      * @method \App\Model\Entity\Diputado[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 *       */
class DiputadoController extends AppController
{

    /**
 *      * Index method
 *           *
 *                * @return \Cake\Http\Response|void
 *                     */
    public function index()
    {

        $this->viewBuilder()->setLayout('dash');

        //$diputado = $this->paginate($this->Diputado);
        //$this->set(compact('diputado'));

        $query = $this->Diputado
            ->find()
            ->select([
                'id_diputado',
                'nombre',
                'nom_partido' => 'c.nombre'
            ])
            ->enableHydration(false)
            ->join([
                'c' => [
                    'table' => 'partido',
                    'type' => 'INNER',
                    'conditions' => 'c.id_partido = Diputado.id_partido'
                ]
            ]);

        $this->set('diputado', $this->paginate($query));
        $this->set('_serialize', ['diputado']);
    }

    /**
 *      * View method
 *           *
 *                * @param string|null $id Diputado id.
 *                     * @return \Cake\Http\Response|void
 *                          * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
 *                               */
    public function view($id = null)
    {

	            $this->viewBuilder()->setLayout('dash');

		            $diputado = $this->Diputado->get($id, [
				                'contain' => []
						        ]);

		            $this->set('diputado', $diputado);
		        }

        /**
	 *      * Add method
	 *           *
	 *                * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
	 *                     */
        public function add()
		    {
			            $this->viewBuilder()->setLayout('dash');

				            $this->loadModel('partido');
				        $options = $this->partido->find('list', ['keyField' => 'id_partido',
							    'valueField' => 'nombre']);
				        $this->set('options', $options);



				        $diputado = $this->Diputado->newEntity();
					        if ($this->request->is('post')) {
							            $diputado = $this->Diputado->patchEntity($diputado, $this->request->getData());
								                if ($this->Diputado->save($diputado)) {
											                $this->Flash->success(__('The diputado has been saved.'));

													                return $this->redirect(['action' => 'index']);
													            }
								                $this->Flash->error(__('The diputado could not be saved. Please, try again.'));
								            }
					        $this->set(compact('diputado'));
					    }

        /**
	 *      * Edit method
	 *           *
	 *                * @param string|null $id Diputado id.
	 *                     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
	 *                          * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
	 *                               */
        public function edit($id = null)
		    {
			            $this->viewBuilder()->setLayout('dash');

				            $diputado = $this->Diputado->get($id, [
						                'contain' => []
								        ]);
				            if ($this->request->is(['patch', 'post', 'put'])) {
						                $diputado = $this->Diputado->patchEntity($diputado, $this->request->getData());
								            if ($this->Diputado->save($diputado)) {
										                    $this->Flash->success(__('The diputado has been saved.'));

												                    return $this->redirect(['action' => 'index']);
												                }
								            $this->Flash->error(__('The diputado could not be saved. Please, try again.'));
								        }
				            $this->set(compact('diputado'));
				        }

        /**
	 *      * Delete method
	 *           *
	 *                * @param string|null $id Diputado id.
	 *                     * @return \Cake\Http\Response|null Redirects to index.
	 *                          * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
	 *                               */
        public function delete($id = null)
		    {
			            $this->request->allowMethod(['post', 'delete']);
				            $diputado = $this->Diputado->get($id);
				            if ($this->Diputado->delete($diputado)) {
						                $this->Flash->success(__('The diputado has been deleted.'));
								        } else {
										            $this->Flash->error(__('The diputado could not be deleted. Please, try again.'));
											            }

					            return $this->redirect(['action' => 'index']);
					        }
    }

