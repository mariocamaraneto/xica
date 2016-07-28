<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * RecebimentosParcelasFixture
 *
 */
class RecebimentosParcelasFixture extends TestFixture
{

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'parcelas_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'recebimentos_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        '_indexes' => [
            'fk_recebimentos_id_idx' => ['type' => 'index', 'columns' => ['recebimentos_id'], 'length' => []],
            'fk_parcelas_id_idx' => ['type' => 'index', 'columns' => ['parcelas_id'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['parcelas_id', 'recebimentos_id'], 'length' => []],
            'fk_parcelas_id' => ['type' => 'foreign', 'columns' => ['parcelas_id'], 'references' => ['parcelas', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
            'fk_recebimentos_id' => ['type' => 'foreign', 'columns' => ['recebimentos_id'], 'references' => ['recebimentos', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
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
            'parcelas_id' => 1,
            'recebimentos_id' => 1
        ],
    ];
}
