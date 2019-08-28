<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Diputado Model
 *
 * @method \App\Model\Entity\Diputado get($primaryKey, $options = [])
 * @method \App\Model\Entity\Diputado newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Diputado[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Diputado|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Diputado|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Diputado patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Diputado[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Diputado findOrCreate($search, callable $callback = null, $options = [])
 */
class DiputadoTable extends Table
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

        $this->setTable('diputado');
        $this->setDisplayField('id_diputado');
        $this->setPrimaryKey('id_diputado');


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
            ->integer('id_diputado')
            ->allowEmptyString('id_diputado', 'create');

        $validator
            ->scalar('nombre')
            ->maxLength('nombre', 45)
            ->requirePresence('nombre', 'create')
            ->allowEmptyString('nombre', false);

        $validator
            ->integer('id_partido')
            ->requirePresence('id_partido', 'create')
            ->allowEmptyString('id_partido', false);

        return $validator;
    }
}
