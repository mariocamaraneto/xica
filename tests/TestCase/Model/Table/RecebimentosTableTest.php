<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\RecebimentosTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\RecebimentosTable Test Case
 */
class RecebimentosTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\RecebimentosTable
     */
    public $Recebimentos;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.recebimentos',
        'app.funcionarios',
        'app.parcelas',
        'app.vendas',
        'app.clientes',
        'app.produtos',
        'app.fornecedores',
        'app.vendas_produtos',
        'app.pagamentos',
        'app.recebimentos_parcelas'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Recebimentos') ? [] : ['className' => 'App\Model\Table\RecebimentosTable'];
        $this->Recebimentos = TableRegistry::get('Recebimentos', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Recebimentos);

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
     * Test validationDefault method
     *
     * @return void
     */
    public function testValidationDefault()
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
