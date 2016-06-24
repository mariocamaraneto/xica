<?php
namespace App\Model\Table;

use App\Model\Entity\Fornecedor;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Fornecedores Model
 *
 * @property \Cake\ORM\Association\HasMany $Produtos
 */
class FornecedoresTable extends Table
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

        $this->table('fornecedores');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->hasMany('Produtos', [
            'foreignKey' => 'fornecedor_id'
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
            ->requirePresence('nome', 'create')
            ->notEmpty('nome');

        $validator
            ->allowEmpty('CPF_CNPJ')
            ->add('CPF_CNPJ', 'unique', ['rule' => 'validateUnique', 'provider' => 'table']);

        $validator
            ->allowEmpty('endereco');

        $validator
            ->requirePresence('telefone', 'create')
            ->notEmpty('telefone');

        $validator
            ->email('email')
            ->allowEmpty('email');

        $validator
            ->allowEmpty('metodo_pagamento');

        $validator
            ->allowEmpty('conta_banco');

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
        $rules->add($rules->isUnique(['email']));
        $rules->add($rules->isUnique(['CPF_CNPJ']));
        return $rules;
    }
}
