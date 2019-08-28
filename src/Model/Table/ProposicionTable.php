<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Proposicion Model
 *
 * @property \App\Model\Table\DiputadoTable|\Cake\ORM\Association\BelongsToMany $Diputado
 *
 * @method \App\Model\Entity\Proposicion get($primaryKey, $options = [])
 * @method \App\Model\Entity\Proposicion newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Proposicion[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Proposicion|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Proposicion saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Proposicion patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Proposicion[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Proposicion findOrCreate($search, callable $callback = null, $options = [])
 */
class ProposicionTable extends Table
{
    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->setTable('proposicion');
        $this->setDisplayField('id_proposicion');
        $this->setPrimaryKey('id_proposicion');

        $this->belongsToMany('Diputado', [
            'foreignKey' => 'proposicion_id',
            'targetForeignKey' => 'diputado_id',
            'joinTable' => 'proposicion_diputado'
        ]);

        $this->addBehavior('Josegonzalez/Upload.Upload', [
            'archivo_consulta',
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->integer('id_proposicion')
            ->allowEmptyString('id_proposicion', 'create');

        $validator
            ->scalar('legislatura')
            ->maxLength('legislatura', 45)
            ->requirePresence('legislatura', 'create')
            ->allowEmptyString('legislatura', false);

        $validator
            ->scalar('año')
            ->maxLength('año', 45)
            ->requirePresence('año', 'create')
            ->allowEmptyString('año', false);

        $validator
            ->scalar('periodo')
            ->maxLength('periodo', 45)
            ->requirePresence('periodo', 'create')
            ->allowEmptyString('periodo', false);

        $validator
            ->date('fecha_publicacion')
            ->requirePresence('fecha_publicacion', 'create')
            ->allowEmptyDate('fecha_publicacion', false);

        $validator
            ->integer('no_orden')
            ->requirePresence('no_orden', 'create')
            ->allowEmptyString('no_orden', false);

        $validator
            ->scalar('nombre')
            ->maxLength('nombre', 4294967295)
            ->requirePresence('nombre', 'create')
            ->allowEmptyString('nombre', false);

        $validator
            ->scalar('archivo_consulta')
            ->maxLength('archivo_consulta', 150)
            ->allowEmptyString('archivo_consulta');

        return $validator;
    }
}
