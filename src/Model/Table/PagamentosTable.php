<?php
namespace App\Model\Table;

use App\Model\Entity\Pagamento;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Pagamentos Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Fornecedores
 * @property \Cake\ORM\Association\BelongsTo $Funcionarios
 * @property \Cake\ORM\Association\HasMany $VendasProdutos
 */
class PagamentosTable extends Table
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

        $this->table('pagamentos');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->belongsTo('Fornecedores', [
            'foreignKey' => 'fornecedores_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Funcionarios', [
            'foreignKey' => 'funcionarios_id',
            'joinType' => 'INNER'
        ]);
        $this->hasMany('VendasProdutos', [
            'foreignKey' => 'pagamento_id'
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
            ->requirePresence('data', 'create')
            ->notEmpty('data');

        $validator
            ->requirePresence('valor', 'create')
            ->notEmpty('valor');

        $validator
            ->requirePresence('forma_pagamento', 'create')
            ->notEmpty('forma_pagamento');

        $validator
            ->allowEmpty('observacoes');

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
        $rules->add($rules->existsIn(['fornecedores_id'], 'Fornecedores'));
        $rules->add($rules->existsIn(['funcionarios_id'], 'Funcionarios'));
        return $rules;
    }
}
