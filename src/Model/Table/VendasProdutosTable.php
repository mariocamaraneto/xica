<?php
namespace App\Model\Table;

use App\Model\Entity\VendasProduto;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * VendasProdutos Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Vendas
 * @property \Cake\ORM\Association\BelongsTo $Produtos
 * @property \Cake\ORM\Association\BelongsTo $Pagamentos
 */
class VendasProdutosTable extends Table
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

        $this->table('vendas_produtos');
        $this->displayField('venda_id');
        $this->primaryKey(['venda_id', 'produto_id']);

        $this->belongsTo('Vendas', [
            'foreignKey' => 'venda_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Produtos', [
            'foreignKey' => 'produto_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Pagamentos', [
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
            ->integer('quantidade')
            ->requirePresence('quantidade', 'create')
            ->notEmpty('quantidade');

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
        $rules->add($rules->existsIn(['venda_id'], 'Vendas'));
        $rules->add($rules->existsIn(['produto_id'], 'Produtos'));
        $rules->add($rules->existsIn(['pagamento_id'], 'Pagamentos'));
        return $rules;
    }
}
