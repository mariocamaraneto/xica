<?php
namespace App\Test\TestCase\Controller;

use App\Controller\ParcelasController;
use Cake\TestSuite\IntegrationTestCase;

/**
 * App\Controller\ParcelasController Test Case
 */
class ParcelasControllerTest extends IntegrationTestCase
{

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.parcelas',
        'app.vendas',
        'app.clientes',
        'app.funcionarios',
        'app.produtos',
        'app.fornecedores',
        'app.vendas_produtos',
        'app.pagamentos',
        'app.recebimentos',
        'app.recebimentos_parcelas'
    ];

    /**
     * Test index method
     *
     * @return void
     */
    public function testIndex()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test view method
     *
     * @return void
     */
    public function testView()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test add method
     *
     * @return void
     */
    public function testAdd()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test edit method
     *
     * @return void
     */
    public function testEdit()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test delete method
     *
     * @return void
     */
    public function testDelete()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
