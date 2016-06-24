<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * VendasProdutosFixture
 *
 */
class VendasProdutosFixture extends TestFixture
{

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'venda_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'produto_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'pagamento_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'quantidade' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        '_indexes' => [
            'fk_vendas_has_produtos_produtos1_idx' => ['type' => 'index', 'columns' => ['produto_id'], 'length' => []],
            'fk_vendas_has_produtos_vendas1_idx' => ['type' => 'index', 'columns' => ['venda_id'], 'length' => []],
            'fk_vendas_produtos_pagamento1_idx' => ['type' => 'index', 'columns' => ['pagamento_id'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['venda_id', 'produto_id'], 'length' => []],
            'fk_vendas_has_produtos_produtos1' => ['type' => 'foreign', 'columns' => ['produto_id'], 'references' => ['produtos', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
            'fk_vendas_has_produtos_vendas1' => ['type' => 'foreign', 'columns' => ['venda_id'], 'references' => ['vendas', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
            'fk_vendas_produtos_pagamento1' => ['type' => 'foreign', 'columns' => ['pagamento_id'], 'references' => ['pagamentos', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
        ],
        '_options' => [
            'engine' => 'InnoDB',
            'collation' => 'utf8_general_ci'
        ],
    ];
    // @codingStandardsIgnoreEnd

    /**
     * Records
     *
     * @var array
     */
    public $records = [
        [
            'venda_id' => 1,
            'produto_id' => 1,
            'pagamento_id' => 1,
            'quantidade' => 1
        ],
    ];
}
