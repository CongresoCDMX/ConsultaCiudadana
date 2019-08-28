<?php
namespace App\Controller;

namespace App\Controller;
use Cake\I18n\Time;
use App\Controller\AppController;
use Cake\ORM\TableRegistry;
use Cake\Log\Log;
use Cake\Event\Event;
use Cake\HTTP\ServerRequest;
use DataTables\Controller\DataTablesAjaxRequestTrait;
/**
 * Proposicion Controller
 *
 * @property \App\Model\Table\ProposicionTable $Proposicion
 *
 * @method \App\Model\Entity\Proposicion[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ProposicionController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->viewBuilder()->setLayout('dash');

        $proposicion = $this->paginate($this->Proposicion);

        $this->set(compact('proposicion'));
    }

    /**
     * View method
     *
     * @param string|null $id Proposicion id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $this->viewBuilder()->setLayout('dash');

        $proposicion = $this->Proposicion->get($id, [
            'contain' => []
        ]);

        $this->set('proposicion', $proposicion);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $this->viewBuilder()->setLayout('dash');

        $this->loadModel('diputado');
        $diputados = $this->diputado->find('list', ['keyField' => 'id_diputado', 'valueField' => 'nombre']);
        $this->set('diputados', $diputados);

        $proposicion = $this->Proposicion->newEntity();
        if ($this->request->is('post')) {
            $proposicion = $this->Proposicion->patchEntity($proposicion, $this->request->getData());
            $image = $this->request->getData('archivo_consulta');
            $sub_folder = 'proposicion';
            $fileOk = $this->uploadFiles('img/files', $image, $sub_folder);

            if (array_key_exists('urls', $fileOk)) {
                $proposicion->archivo_consulta = str_replace('img/', '', $fileOk['urls'][0]);
            }


            $autores = $this->request->getData('autor._ids');
            foreach ($autores as $autor){
                Log::debug("nombre diputado: ". $autor);

            }


            if ($this->Proposicion->save($proposicion)) {
                $proposicionDiputadoTable = TableRegistry::get('proposicion_diputado');
                foreach($autores as $row){
                    $proposiciondiputado = $proposicionDiputadoTable->newEntity();
                    $proposiciondiputado->id_proposicion = $proposicion->id_proposicion;
                    $proposiciondiputado->id_diputado = $row;
                    $proposicionDiputadoTable->save($proposiciondiputado);
                }

                $this->Flash->success(__('The proposicion has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('La proposicion no pudo ser guardada, intente de nuevo.'));
        }
        $this->set(compact('proposicion'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Proposicion id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $this->viewBuilder()->setLayout('dash');

        $proposicion = $this->Proposicion->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $proposicion = $this->Proposicion->patchEntity($proposicion, $this->request->getData());
            if ($this->Proposicion->save($proposicion)) {
                $this->Flash->success(__('The proposicion has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The proposicion could not be saved. Please, try again.'));
        }
        $this->set(compact('proposicion'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Proposicion id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundExcepuse App\Controller\AppController;
use Cake\Log\Log;
use Cake\ORM\TableRegistry;
tail tion When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $proposicion = $this->Proposicion->get($id);
        if ($this->Proposicion->delete($proposicion)) {
            $this->Flash->success(__('The proposicion has been deleted.'));
        } else {
            $this->Flash->error(__('The proposicion could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function lista($id = null){

        $proposicion = TableRegistry::get('Proposicion');
        $query = $proposicion->find()
            ->select([
                'id_proposicion',
                'fecha_publicacion',
                'nombre'
            ])
            ->order(['id_proposicion' => 'DESC']);

        $this->set('proposicion', $this->paginate($query));
        $this->set('_serialize', ['proposicion']);
    }

    public function ver($id = null)
    {
        $proposicion = $this->Proposicion->get($id, [
            'contain' => []
        ]);

        $this->set('proposicion', $proposicion);
    }
}
