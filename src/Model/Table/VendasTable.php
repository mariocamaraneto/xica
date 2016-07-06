<?php
namespace App\Model\Table;

use App\Model\Entity\Venda;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;


/**
 * Vendas Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Clientes
 * @property \Cake\ORM\Association\BelongsTo $Funcionarios
 * @property \Cake\ORM\Association\BelongsToMany $Produtos
 */
class VendasTable extends Table
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

        $this->table('vendas');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->belongsTo('Clientes', [
            'foreignKey' => 'cliente_id',
        ]);
        $this->belongsTo('Funcionarios', [
            'foreignKey' => 'funcionarios_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsToMany('Produtos', [
            'foreignKey' => 'venda_id',
            'targetForeignKey' => 'produto_id',
            'joinTable' => 'vendas_produtos'
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
            ->allowEmpty('data');

        $validator
            ->decimal('total')
            ->allowEmpty('total');

        $validator
            ->allowEmpty('desconto');

        $validator
            ->allowEmpty('forma_pagamento');

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
        $rules->add($rules->existsIn(['cliente_id'], 'Clientes'));
        $rules->add($rules->existsIn(['funcionarios_id'], 'Funcionarios'));
        return $rules;
    }
    
}
