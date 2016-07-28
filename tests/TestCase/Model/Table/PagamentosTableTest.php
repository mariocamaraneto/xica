<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\PagamentosTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\PagamentosTable Test Case
 */
class PagamentosTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\PagamentosTable
     */
    public $Pagamentos;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.pagamentos',
        'app.fornecedores',
        'app.produtos',
        'app.funcionarios',
        'app.vendas_produtos'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Pagamentos') ? [] : ['className' => 'App\Model\Table\PagamentosTable'];
        $this->Pagamentos = TableRegistry::get('Pagamentos', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Pagamentos);

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
