<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Dictamen Model
 *
 * @method \App\Model\Entity\Dictaman get($primaryKey, $options = [])
 * @method \App\Model\Entity\Dictaman newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Dictaman[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Dictaman|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Dictaman|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Dictaman patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Dictaman[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Dictaman findOrCreate($search, callable $callback = null, $options = [])
 */
class DictamenTable extends Table
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

        $this->setTable('dictamen');
        $this->setDisplayField('id_dictamen');
        $this->setPrimaryKey('id_dictamen');
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
            ->integer('id_dictamen')
            ->allowEmptyString('id_dictamen', 'create');

        $validator
            ->integer('id_iniciativa')
            ->requirePresence('id_iniciativa', 'create')
            ->allowEmptyString('id_iniciativa', false);

        $validator
            ->integer('id_estatus')
            ->requirePresence('id_estatus', 'create')
            ->allowEmptyString('id_estatus', false);

        $validator
            ->scalar('dictamen')
            ->maxLength('dictamen', 145)
            ->allowEmptyString('dictamen');

        $validator
            ->scalar('url')
            ->maxLength('url', 145)
            ->allowEmptyString('url');

        return $validator;
    }
}
