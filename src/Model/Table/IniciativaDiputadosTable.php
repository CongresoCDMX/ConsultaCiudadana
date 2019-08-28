<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * IniciativaDiputados Model
 *
 * @method \App\Model\Entity\IniciativaDiputado get($primaryKey, $options = [])
 * @method \App\Model\Entity\IniciativaDiputado newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\IniciativaDiputado[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\IniciativaDiputado|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\IniciativaDiputado|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\IniciativaDiputado patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\IniciativaDiputado[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\IniciativaDiputado findOrCreate($search, callable $callback = null, $options = [])
 */
class IniciativaDiputadosTable extends Table
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

        $this->setTable('iniciativa_diputados');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Iniciativa',[
            'foreignKey'=>'id_iniciativa'
        ]);

        $this->belongsTo('Diputado',[
            'foreignKey'=>'id_diputado'
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
            ->integer('id')
            ->allowEmptyString('id', 'create');

        $validator
            ->integer('id_iniciativa')
            ->requirePresence('id_iniciativa', 'create')
            ->allowEmptyString('id_iniciativa', false);

        $validator
            ->integer('id_diputado')
            ->allowEmpty('id_diputado');

        return $validator;
    }
}
