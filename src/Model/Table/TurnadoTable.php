<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Turnado Model
 *
 * @method \App\Model\Entity\Turnado get($primaryKey, $options = [])
 * @method \App\Model\Entity\Turnado newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Turnado[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Turnado|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Turnado|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Turnado patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Turnado[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Turnado findOrCreate($search, callable $callback = null, $options = [])
 */
class TurnadoTable extends Table
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

        $this->setTable('turnado');
        $this->setDisplayField('id_turnado');
        $this->setPrimaryKey('id_turnado');
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
            ->integer('id_turnado')
            ->allowEmptyString('id_turnado', 'create');

        $validator
            ->scalar('nombre')
            ->maxLength('nombre', 250)
            ->requirePresence('nombre', 'create')
            ->allowEmptyString('nombre', false);

        return $validator;
    }
}
