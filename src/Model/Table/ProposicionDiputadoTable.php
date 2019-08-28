<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * ProposicionDiputado Model
 *
 * @method \App\Model\Entity\ProposicionDiputado get($primaryKey, $options = [])
 * @method \App\Model\Entity\ProposicionDiputado newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\ProposicionDiputado[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\ProposicionDiputado|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\ProposicionDiputado saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\ProposicionDiputado patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\ProposicionDiputado[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\ProposicionDiputado findOrCreate($search, callable $callback = null, $options = [])
 */
class ProposicionDiputadoTable extends Table
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

        $this->setTable('proposicion_diputado');
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
            ->integer('id_proposicion')
            ->allowEmptyString('id_proposicion');

        $validator
            ->integer('id_diputado')
            ->allowEmptyString('id_diputado');

        return $validator;
    }
}
