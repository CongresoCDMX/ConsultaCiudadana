<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;

/**
 * Comentarios Controller
 *
 * @property \App\Model\Table\ComentariosTable $Comentarios
 *
 * @method \App\Model\Entity\Comentario[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ReportesController extends AppController
{

    public function initialize()
    {
        parent::initialize();
        $this->loadComponent('RequestHandler');
    }

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->viewBuilder()->setLayout('dash');

        $reportes = TableRegistry::get('Comentarios');


        $query = $reportes
            ->find()
            ->select([
                'id',
                'nom_iniciativa' => 'c.nombre',
                'correo',
                'comentario',
                'archivo'
            ])
            ->enableHydration(false)
            ->join([
                'c' => [
                    'table' => 'iniciativa',
                    'type' => 'INNER',
                    'conditions' => 'c.id_iniciativa = Comentarios.id_iniciativa'
                ]
            ]);
        $this->viewBuilder()->options([
            'pdfConfig' => [
                'orientation' => 'portrait',
                'filename' => 'comentarios'.'.pdf'
            ]
        ]);
        $this->set('comentarios', $this->paginate($query));
        $this->set('_serialize', ['comentarios']);
    }

    /**
     * View method
     *
     * @param string|null $id Comentario id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        //$this->viewBuilder()->setLayout('dash');
        //$reportes = TableRegistry::get('Comentarios');

        $reportes = $this->Comentarios->get($id, [
            'contain' => []
        ]);
        $this->viewBuilder()->options([
            'pdfConfig' => [
                'orientation' => 'portrait',
                'filename' => 'User_' . $id . '.pdf'
            ]
        ]);
        $this->set('reportes', $reportes);
    }



}
