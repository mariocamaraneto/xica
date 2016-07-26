<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\RecebimentosParcelasTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\RecebimentosParcelasTable Test Case
 */
class RecebimentosParcelasTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\RecebimentosParcelasTable
     */
    public $RecebimentosParcelas;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.recebimentos_parcelas',
        'app.parcelas',
        'app.vendas',
        'app.clientes',
        'app.funcionarios',
        'app.produtos',
        'app.fornecedores',
        'app.vendas_produtos',
        'app.pagamentos',
        'app.recebimentos'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('RecebimentosParcelas') ? [] : ['className' => 'App\Model\Table\RecebimentosParcelasTable'];
        $this->RecebimentosParcelas = TableRegistry::get('RecebimentosParcelas', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->RecebimentosParcelas);

        parent::tearDown();
    }

    /**
     * Test initialize method
     *
     * @return void
     */
    public function testInitialize()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     */
    public function testBuildRules()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
