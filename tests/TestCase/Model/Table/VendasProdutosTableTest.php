<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\VendasProdutosTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\VendasProdutosTable Test Case
 */
class VendasProdutosTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\VendasProdutosTable
     */
    public $VendasProdutos;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.vendas_produtos',
        'app.vendas',
        'app.clientes',
        'app.funcionarios',
        'app.produtos',
        'app.fornecedores',
        'app.pagamentos'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('VendasProdutos') ? [] : ['className' => 'App\Model\Table\VendasProdutosTable'];
        $this->VendasProdutos = TableRegistry::get('VendasProdutos', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->VendasProdutos);

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
