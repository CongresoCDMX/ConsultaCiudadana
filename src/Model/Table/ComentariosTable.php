<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Comentarios Model
 *
 * @method \App\Model\Entity\Comentario get($primaryKey, $options = [])
 * @method \App\Model\Entity\Comentario newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Comentario[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Comentario|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Comentario saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Comentario patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Comentario[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Comentario findOrCreate($search, callable $callback = null, $options = [])
 */
class ComentariosTable extends Table
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

        $this->setTable('comentarios');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');
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
            ->integer('id')
            ->allowEmptyString('id', 'create');

        $validator
            ->integer('id_iniciativa')
            ->requirePresence('id_iniciativa', 'create')
            ->allowEmptyString('id_iniciativa', false);

        $validator
            ->scalar('correo')
            ->maxLength('correo', 45)
            ->requirePresence('correo', 'create')
            ->allowEmptyString('correo', false);

        $validator
            ->scalar('comentario')
            ->allowEmptyString('comentario');

        $validator
            ->scalar('archivo')
            ->maxLength('archivo', 100)
            ->allowEmptyString('archivo');

        $validator
            ->boolean('me_gusta')
            ->allowEmptyString('me_gusta');

        $validator
            ->boolean('no_gusta')
            ->allowEmptyString('no_gusta');

        $validator
            ->dateTime('fecha')
            ->allowEmptyDateTime('fecha');

        return $validator;
    }
}
