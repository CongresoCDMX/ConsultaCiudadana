<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Iniciativa Model
 *
 * @method \App\Model\Entity\Iniciativa get($primaryKey, $options = [])
 * @method \App\Model\Entity\Iniciativa newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Iniciativa[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Iniciativa|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Iniciativa|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Iniciativa patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Iniciativa[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Iniciativa findOrCreate($search, callable $callback = null, $options = [])
 */
class IniciativaTable extends Table
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

        $this->setTable('iniciativa');
        $this->setDisplayField('id_iniciativa');
        $this->setPrimaryKey('id_iniciativa');
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
            ->integer('id_iniciativa')
            ->allowEmptyString('id_iniciativa', 'create');

        $validator
            ->date('fecha')
            ->requirePresence('fecha', 'create')
            ->allowEmptyDate('fecha', false);

        $validator
            ->date('fecha_cierre')
            ->allowEmptyDate('fecha_cierre');

        $validator
            ->scalar('tipo')
            ->maxLength('tipo', 100)
            ->requirePresence('tipo', 'create')
            ->allowEmptyString('tipo', false);

        $validator
            ->scalar('ley')
            ->requirePresence('ley', 'create')
            ->allowEmptyString('ley', false);

        $validator
            ->scalar('nombre')
            ->requirePresence('nombre', 'create')
            ->allowEmptyString('nombre', false);

        $validator
            ->integer('suscrita')
            ->requirePresence('suscrita', 'create')
            ->allowEmptyString('suscrita', false);

        $validator
            ->integer('partido')
            ->requirePresence('partido', 'create')
            ->allowEmptyString('partido', false);

        $validator
            ->scalar('dice')
            ->requirePresence('dice', 'create')
            ->allowEmptyString('dice', false);

        $validator
            ->scalar('propuesta')
            ->requirePresence('propuesta', 'create')
            ->allowEmptyString('propuesta', false);

        $validator
            ->scalar('turnado')
            ->maxLength('turnado', 100)
            ->requirePresence('turnado', 'create')
            ->allowEmptyString('turnado', false);

        $validator
            ->scalar('segundo_turnado')
            ->maxLength('segundo_turnado', 150)
            ->allowEmptyString('segundo_turnado');

        $validator
            ->scalar('consulta')
            ->allowEmptyString('consulta');

        $validator
            ->scalar('archivo_consulta')
            ->maxLength('archivo_consulta', 150)
            ->allowEmptyString('archivo_consulta');

        return $validator;
    }
}
