<?php
namespace App\Model\Table;

use App\Model\Entity\Recebimento;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Recebimentos Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Funcionarios
 * @property \Cake\ORM\Association\BelongsToMany $Parcelas
 */
class RecebimentosTable extends Table
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

        $this->table('recebimentos');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->belongsTo('Funcionarios', [
            'foreignKey' => 'funcionario_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsToMany('Parcelas', [
            'foreignKey' => 'recebimento_id',
            'targetForeignKey' => 'parcela_id',
            'joinTable' => 'recebimentos_parcelas'
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
            ->allowEmpty('id', 'create');

        $validator
            ->dateTime('data')
            ->allowEmpty('data');

        $validator
            ->allowEmpty('forma_pagamento');

        $validator
            ->decimal('valor')
            ->allowEmpty('valor');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->existsIn(['funcionario_id'], 'Funcionarios'));
        return $rules;
    }
}
