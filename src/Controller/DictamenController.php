<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;
/**
 * Dictamen Controller
 *
 * @property \App\Model\Table\DictamenTable $Dictamen
 *
 * @method \App\Model\Entity\Dictaman[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class DictamenController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        //$this->viewBuilder()->setLayout('dash');
        $dictamen = $this->paginate($this->Dictamen);

        $this->set(compact('dictamen'));
    }

    /**
     * View method
     *
     * @param string|null $id Dictaman id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        //$this->viewBuilder()->setLayout('dash');

        $dictaman = $this->Dictamen->get($id, [
            'contain' => []
        ]);

        $this->set('dictaman', $dictaman);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add($id_iniciativa = null)
    {
        //$this->viewBuilder()->setLayout('dash');
        $dictaman = $this->Dictamen->newEntity();


        $iniciativaTable = TableRegistry::get('Iniciativa');
        $iniciativa = $iniciativaTable->get($id_iniciativa,[
            'contain'=>[]
        ]);

        $this->loadModel('estatus');
        $estatus = $this->estatus->find('list', ['keyField' => 'id_estatus',
            'valueField' => 'estatus']);
        $this->set('estatus', $estatus);

        if ($this->request->is('post')) {
            $dictaman = $this->Dictamen->patchEntity($dictaman, $this->request->getData());
            $image = $this->request->getData('dictamen');
            $sub_folder = 'dictamen';
            $fileOk = $this->uploadFiles('img/files', $image, $sub_folder);

            if (array_key_exists('urls', $fileOk)) {
                $dictaman->dictamen = str_replace('img/', '', $fileOk['urls'][0]);
            }

            if ($this->Dictamen->save($dictaman)) {
                $this->Flash->success(__('The dictaman has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The dictaman could not be saved. Please, try again.'));
        }
        $this->set(compact('dictaman', 'iniciativa'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Dictaman id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        //$this->viewBuilder()->setLayout('dash');
        $dictaman = $this->Dictamen->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $dictaman = $this->Dictamen->patchEntity($dictaman, $this->request->getData());
            if ($this->Dictamen->save($dictaman)) {
                $this->Flash->success(__('The dictaman has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The dictaman could not be saved. Please, try again.'));
        }
        $this->set(compact('dictaman'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Dictaman id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $dictaman = $this->Dictamen->get($id);
        if ($this->Dictamen->delete($dictaman)) {
            $this->Flash->success(__('The dictaman has been deleted.'));
        } else {
            $this->Flash->error(__('The dictaman could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
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

}
