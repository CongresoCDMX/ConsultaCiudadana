<?php

namespace App\Controller;
use Cake\I18n\Time;
use App\Controller\AppController;
use Cake\ORM\TableRegistry;
use Cake\Log\Log;
use Cake\Event\Event;
use Cake\HTTP\ServerRequest;
use DataTables\Controller\DataTablesAjaxRequestTrait;


/**
 *  Iniciativa Controller
 *
 * @property \App\Model\Table\IniciativaTable $Iniciativa
 *
 * @method \App\Model\Entity\Iniciativa[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class IniciativaController extends AppController
{
    use DataTablesAjaxRequestTrait;

    public function initialize()
    {
        parent::initialize();
        $this->loadComponent('DataTables.DataTables');

    }

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->viewBuilder()->setLayout('dash');
        //$iniciativa = $this->paginate($this->Iniciativa);
        //$this->set(compact('iniciativa'));

        $query = $this->Iniciativa
            ->find()
            ->select([
                'id_iniciativa',
                'fecha',
                'fecha_cierre',
                'tipo',
                'ley',
                'nombre',
                'nom_suscrita' => 'e.nombre',
                'nom_partido' => 'c.nombre',
                'dice',
                'propuesta',
                'nom_turnado' => 'd.nombre',
                'segundo_turnado',
                'consulta',
                'archivo_consulta'
            ])
            ->enableHydration(false)
            ->join([
                'c' => [
                    'table' => 'partido',
                    'type' => 'INNER',
                    'conditions' => 'c.id_partido = Iniciativa.partido'
                ]
            ])
            ->join([
                'd' => [
                    'table' => 'turnado',
                    'type' => 'INNER',
                    'conditions' => 'd.id_turnado = Iniciativa.turnado'
                ]
            ])
            ->join([
                'e' => [
                    'table' => 'diputado',
                    'type' => 'INNER',
                    'conditions' => 'e.id_diputado = Iniciativa.suscrita'
                ]
            ]);

        $this->set('iniciativa', $this->paginate($query));
        $this->set('_serialize', ['iniciativa']);


    }

    /**
     *View method
     *
     * @param string|null $id Iniciativa id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $this->viewBuilder()->setLayout('dash');

        $query = $this->Iniciativa
            ->find()
            ->select([
                'id_iniciativa',
                'fecha',
                'fecha_cierre',
                'tipo',
                'ley',
                'nombre',
                'nom_suscrita' => 'e.nombre',
                'nom_partido' => 'c.nombre',
                'dice',
                'propuesta',
                'nom_turnado' => 'd.nombre',
                'segundo_turnado',
                'consulta',
                'archivo_consulta'
            ])
            ->enableHydration(false)
            ->join([
                'c' => [
                    'table' => 'partido',
                    'type' => 'INNER',
                    'conditions' => 'c.id_partido = Iniciativa.partido'
                ]
            ])
            ->join([
                'd' => [
                    'table' => 'turnado',
                    'type' => 'INNER',
                    'conditions' => 'd.id_turnado = Iniciativa.turnado'
                ]
            ])
            ->join([
                'e' => [
                    'table' => 'diputado',
                    'type' => 'INNER',
                    'conditions' => 'e.id_diputado = Iniciativa.suscrita'
                ]
            ])
            ->where(['id_iniciativa' => $id]);
        $row = $query->first();

        $this->set('iniciativa', $row);
        $this->set('_serialize', ['iniciativa']);


        $this->loadModel('Comentarios');
        $comentario = $this->Comentarios->newEntity();
        if ($this->request->is('post')) {
            $comentario = $this->Comentarios->patchEntity($comentario, $this->request->getData());
            if ($this->Comentarios->save($comentario)) {
                $this->Flash->success(__('¡Gracias por su comentario!'));
                return $this->redirect(['action' => 'lista']);

            }
            $this->Flash->error(__('The comentario could not be saved. Please, try again.'));
        }
        $this->set(compact('comentario'));


        $adheridoTable = TableRegistry::get('Diputado');
        $adheridos = $adheridoTable->find()
            ->select(['nom_adherido' => 'a.nombre'])
            ->join([
                'ac' => [
                    'table' => 'iniciativa_diputados',
                    'type' => 'RIGHT',
                    'conditions' => 'ac.id_diputado = Diputado.id_diputado',
                ],
                'a' => [
                    'table' => 'diputado',
                    'type' => 'RIGHT',
                    'conditions' => 'a.id_diputado = ac.id_diputado',
                ]
            ])
            ->where(['ac.id_iniciativa' => $id]);

        $this->set('adheridos', $adheridos);
    }

    /**
     *  Add method
     *  turn \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $this->viewBuilder()->setLayout('dash');

        $this->loadModel('partido');
        $options = $this->partido->find('list', ['keyField' => 'id_partido', 'valueField' => 'nombre']);
        $this->set('options', $options);

        $this->loadModel('diputado');
        $diputados = $this->diputado->find('list', ['keyField' => 'id_diputado', 'valueField' => 'nombre']);
        $this->set('diputados', $diputados);

        $this->loadModel('turnado');
        $turnado = $this->turnado->find('list', ['keyField' => 'id_turnado', 'valueField' => 'nombre']);
        $this->set('turnado', $turnado);


        $iniciativa = $this->Iniciativa->newEntity();
        if ($this->request->is('post')) {
            $iniciativa = $this->Iniciativa->patchEntity($iniciativa, $this->request->getData());
            $image = $this->request->getData('archivo_consulta');
            $sub_folder = 'iniciativa';
            $fileOk = $this->uploadFiles('img/files', $image, $sub_folder);

            if (array_key_exists('urls', $fileOk)) {
                $iniciativa->archivo_consulta = str_replace('img/', '', $fileOk['urls'][0]);
            }


            $adheridos = $this->request->getData('adhiere._ids');
            foreach ($adheridos as $adherido){
                Log::debug("nombre diputado: ". $adherido);

	    }

            if ($this->Iniciativa->save($iniciativa)) {
               $iniciativaDiputadoTable = TableRegistry::get('iniciativa_diputados');
                foreach($adheridos as $row){
                    $iniciativadiputado = $iniciativaDiputadoTable->newEntity();
                    $iniciativadiputado->id_iniciativa = $iniciativa->id_iniciativa;
                    $iniciativadiputado->id_diputado = $row;
		            $iniciativaDiputadoTable->save($iniciativadiputado);
                }
                $this->Flash->success(__('The iniciativa has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The iniciativa could not be saved. Please, try again.'));
        }
    $this->set(compact('iniciativa', 'adherido'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Iniciativa id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */

    public function edit($id = null)
    {
        $this->viewBuilder()->setLayout('dash');

        $iniciativa = $this->Iniciativa->get($id, [
            'contain' => []
        ]);

        $this->loadModel('partido');
        $options = $this->partido->find('list', ['keyField' => 'id_partido', 'valueField' => 'nombre']);
        $this->set('options', $options);


        $this->loadModel('diputado');
        $diputados = $this->diputado->find('list', ['keyField' => 'id_diputado', 'valueField' => 'nombre']);
        $this->set('diputados', $diputados);

        $this->loadModel('turnado');
        $turnado = $this->turnado->find('list', ['keyField' => 'id_turnado', 'valueField' => 'nombre']);
        $this->set('turnado', $turnado);
        

        if ($this->request->is(['patch', 'post', 'put'])) {
            $iniciativa = $this->Iniciativa->patchEntity($iniciativa, $this->request->getData());
            $image = $this->request->getData('archivo_consulta');

            $sub_folder = 'iniciativa';
            $fileOk = $this->uploadFiles('img/files', $image, $sub_folder);

            if (array_key_exists('urls', $fileOk)) {
                $iniciativa->archivo_consulta = str_replace('img/', '', $fileOk['urls'][0]);
            }


            $adheridos = $this->request->getData('adhiere._ids');
            foreach ($adheridos as $adherido){
                Log::debug("nombre diputado: ". $adherido);

            }
            if ($this->Iniciativa->save($iniciativa)) {
                $iniciativaDiputadoTable = TableRegistry::get('iniciativa_diputados');
                foreach($adheridos as $row){
                    $iniciativadiputado = $iniciativaDiputadoTable->newEntity();
                    $iniciativadiputado->id_iniciativa = $iniciativa->id_iniciativa;
                    $iniciativadiputado->id_diputado = $row;
                    $iniciativaDiputadoTable->save($iniciativadiputado);
                }
                $this->Flash->success(__('The iniciativa has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The iniciativa could not be saved. Please, try again.'));
        }
        $this->set(compact('iniciativa'));
    }

    /**
     * Delete method
     * @param string|null $id Iniciativa id.
     * @return \Cake\Http\Response|null Redirects to index.
     *  @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $iniciativa = $this->Iniciativa->get($id);
        if ($this->Iniciativa->delete($iniciativa)) {
            $this->Flash->success(__('The iniciativa has been deleted.'));
        } else {
            $this->Flash->error(__('The iniciativa could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function lista($id = null)
    {
      /*  $keyword = $this->request->query('keyword');
        if(!empty($keyword)){
            $this->paginate = [
                'condition' => ['name'=>$keyword]
            ];
        }*/

        $iniciativa = TableRegistry::get('Iniciativa');
        $query = $iniciativa->find()
                             ->select([
                                 'id_iniciativa',
                                 'fecha',
                                 'nombre',
                                 'suscrita'
                                 ])
                             ->order(['id_iniciativa' => 'DESC']);

        $this->set('iniciativa', $this->paginate($query));
        $this->set('_serialize', ['iniciativa']);


        //$iniciativa = $this->paginate($this->Iniciativa);
        //$this->set(compact('iniciativa'));

    }

    public function vista($id = null)
    {
        /*    $iniciativa = $this->Iniciativa->get($id, [
                        'contain' => []
                ]); */


        $query = $this->Iniciativa
            ->find()
            ->select([
                'id_iniciativa',
                'fecha',
                'fecha_cierre',
                'tipo',
                'ley',
                'nombre',
                'nom_suscrita' => 'e.nombre',
                'nom_partido' => 'c.nombre',
                'dice',
                'propuesta',
                'nom_turnado' => 'd.nombre',
                'segundo_turnado',
                'consulta',
                'archivo_consulta'
            ])
            ->enableHydration(false)
            ->join([
                'c' => [
                    'table' => 'partido',
                    'type' => 'INNER',
                    'conditions' => 'c.id_partido = Iniciativa.partido'
                ]
            ])
            ->join([
                'd' => [
                    'table' => 'turnado',
                    'type' => 'INNER',
                    'conditions' => 'd.id_turnado = Iniciativa.turnado'
                ]
            ])
            ->join([
                'e' => [
                    'table' => 'diputado',
                    'type' => 'INNER',
                    'conditions' => 'e.id_diputado = Iniciativa.suscrita'
                ]
            ])
            ->where(['id_iniciativa' => $id]);
        $row = $query->first();

        $this->set('iniciativa', $row);
        $this->set('_serialize', ['iniciativa']);


        $this->loadModel('Comentarios');
        $comentario = $this->Comentarios->newEntity();
        if ($this->request->is('post')) {
            $comentario = $this->Comentarios->patchEntity($comentario, $this->request->getData());
            if ($this->Comentarios->save($comentario)) {
                $this->Flash->success(__('¡Gracias por su comentario!'));
                return $this->redirect(['action' => 'lista']);

            }
            $this->Flash->error(__('The comentario could not be saved. Please, try again.'));
        }
        $this->set(compact('comentario'));


        $adheridoTable = TableRegistry::get('Diputado');
        $adheridos = $adheridoTable->find()
            ->select(['nom_adherido' => 'a.nombre'])
            ->join([
                'ac' => [
                    'table' => 'iniciativa_diputados',
                    'type' => 'RIGHT',
                    'conditions' => 'ac.id_diputado = Diputado.id_diputado',
                ],
                'a' => [
                    'table' => 'diputado',
                    'type' => 'RIGHT',
                    'conditions' => 'a.id_diputado = ac.id_diputado',
                ]
            ])
            ->where(['ac.id_iniciativa' => $id]);

        $this->set('adheridos', $adheridos);

    }

    public function detalle()
    {

        $query = $this->Iniciativa
            ->find()
            ->select([
                'id_iniciativa',
                'fecha',
                'fecha_inicio',
                'tipo',
                'ley',
                'nombre',
                'nom_suscrita' => 'e.nombre',
                'nom_partido' => 'c.nombre',
                'adhiere',
                'dice',
                'propuesta',
                'nom_turnado' => 'd.nombre',
                'segundo_turnado',
                'consulta',
                'activo'
            ])
            ->enableHydration(false)
            ->join([
                'c' => [
                    'table' => 'partido',
                    'type' => 'INNER',
                    'conditions' => 'c.id_partido = Iniciativa.partido'
                ]
            ])
            ->join([
                'd' => [
                    'table' => 'turnado',
                    'type' => 'INNER',
                    'conditions' => 'd.id_turnado = Iniciativa.turnado'
                ]
            ])
            ->join([
                'e' => [
                    'table' => 'diputado',
                    'type' => 'INNER',
                    'conditions' => 'e.id_diputado = Iniciativa.suscrita'
                ]
            ])
            ->where([]);

        $row = $query->first();

        $this->set('iniciativa', $row);
        $this->set('_serialize', ['iniciativa']);


        $this->loadModel('Comentarios');
        $comentario = $this->Comentarios->newEntity();
        if ($this->request->is('post')) {
            $comentario = $this->Comentarios->patchEntity($comentario, $this->request->getData());
            if ($this->Comentarios->save($comentario)) {
                $this->Flash->success(__('¡Gracias por su comentario!'));
                return $this->redirect(['action' => 'lista']);

            }
            $this->Flash->error(__('The comentario could not be saved. Please, try again.'));
        }
        $this->set(compact('comentario'));
    }


    public function pa($arr) {
        echo '<pre>';
        print_r($arr);
        echo '</pre>';
    }

    function uploadFiles($folder, $file, $sub_folder) {
        // setup dir names absolute and relative
        $folder_url = WWW_ROOT . $folder;
        $rel_url = $folder;


        // create the folder if it does not exist
        if (!is_dir($folder_url)) {
            mkdir($folder_url);
        }

        // if itemId is set create an item folder
        if ($sub_folder) {
            // set new absolute folder
            $folder_url = WWW_ROOT . $folder . DS . $sub_folder;
            // set new relative folder
            $rel_url = $folder . DS . $sub_folder;
            // create directory
            if (!is_dir($folder_url)) {
                mkdir($folder_url);
            }
        }

        // list of permitted file types, this is only images but documents can be added
        $permitted = array('image' . DS . 'jpg', 'image' . DS . 'JPG', 'image' . DS . 'gif', 'image' . DS . 'jpeg', 'image' . DS . 'pjpeg', 'image' . DS . 'png', 'application' . DS . 'pdf', 'application' . DS . 'rtf');

        $filename = str_replace(' ', '_', $file['name']);
        $typeOK = false;
        foreach ($permitted as $type) {
            if ($type == $file['type']) {
                $typeOK = true;
                break;
            }
        }

        // if file type ok upload the file
        if ($typeOK) {
            // switch based on error code
            switch ($file['error']) {
                case 0:
                    // check filename already exists
                    if (!file_exists($folder_url . DS . $filename)) {
                        // create full filename
                        $full_url = $folder_url . DS . $filename;
                        $url = $rel_url . DS . $filename;
                        // upload the file
                        $success = move_uploaded_file($file['tmp_name'], $url);
                        // if upload was successful
                        if ($success) {
                            // save the url of the file
                            $result['urls'][] = $url;
                        } else {
                            $result['errors'][] = "Error.";
                            $this->Flash->error(__('Error uploaded ' . $filename . ' Please try again.'));
                        }
                    } else {
                        // $result['errors'][] = "Error uploaded $filename. Image already loaded, Please try again.";
                        $result['errors'][] = "Error.";
                        $this->Flash->error(__('Error  ' . $filename . ' already loaded, Please try again.'));
                    }
                    break;
                case 3:
                    // an error occured
                    $result['errors'][] = "Error.";
                    $this->Flash->error(__('Error uploading ' . $filename . ' Please try again.'));
                    break;
                default:
                    // an error occured
                    $result['errors'][] = "Error.";
                    $this->Flash->error(__('System error uploading ' . $filename . ' Contact webmaster.'));
                    break;
            }
        } elseif ($file['error'] == 4) {
            // no file was selected for upload
            $result['errors'][] = "Error.";
            $this->Flash->error(__('No file Selected'));
        } else {
            // unacceptable file type
            $result['errors'][] = "Error.";
            $this->Flash->error(__($filename . 'El archivo no pudo ser cargado.  Admitidos: gif, jpg, png, pdf.'));
        }

        return $result;
    }

    function BorrarFile($imagepath) {
        $sys_path = WWW_ROOT . $imagepath;
        $file = new File($sys_path);
        $this->log($sys_path, 'debug');

        if ($file->exists()) {
            $file->delete();
        }
    }

    public function download($id)
    {
        $file = $this->Files->Iniciativa->id_iniciativa;
        $path = WWW_ROOT . $file->path;
        $this->response->withBody(function () use ($path){
         return file_get_contents($path);
        });

            return $this->response->withDownload($file->name);
    }

    function dictamenes (){
        //$this->viewBuilder()->setLayout('dash');
        //$iniciativa = $this->paginate($this->Iniciativa);
        //$this->set(compact('iniciativa'));

        $query = $this->Iniciativa
            ->find()
            ->select([
                'id_iniciativa',
                'fecha',
                'fecha_cierre',
                'tipo',
                'ley',
                'nombre',
                'nom_suscrita' => 'e.nombre',
                'nom_partido' => 'c.nombre',
                'dice',
                'propuesta',
                'nom_turnado' => 'd.nombre',
                'segundo_turnado',
                'consulta',
                'archivo_consulta',
                'nom_estatus' => 'g.estatus',
                'arc_dictamen' => 'f.dictamen',
                'url_dic' => 'f.url',
            ])
            ->enableHydration(false)
            ->join([
                'c' => [
                    'table' => 'partido',
                    'type' => 'INNER',
                    'conditions' => 'c.id_partido = Iniciativa.partido'
                ]
            ])
            ->join([
                'd' => [
                    'table' => 'turnado',
                    'type' => 'INNER',
                    'conditions' => 'd.id_turnado = Iniciativa.turnado'
                ]
            ])
            ->join([
                'e' => [
                    'table' => 'diputado',
                    'type' => 'INNER',
                    'conditions' => 'e.id_diputado = Iniciativa.suscrita'
                ]
            ])
            ->join([
                'f' => [
                    'table' => 'dictamen',
                    'type' => 'INNER',
                    'conditions' => 'f.id_iniciativa = Iniciativa.id_iniciativa'
                ]
            ])
            ->join([
                'g' => [
                    'table' => 'estatus',
                    'type' => 'INNER',
                    'conditions' => 'g.id_estatus = f.id_estatus'
                ]
            ]);

        $this->set('iniciativa', $this->paginate($query));
        $this->set('_serialize', ['iniciativa']);
    }


    public function home(){

    }

    public function select(){

    }

}


