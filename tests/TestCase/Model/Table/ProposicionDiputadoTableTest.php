<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ProposicionDiputadoTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ProposicionDiputadoTable Test Case
 */
class ProposicionDiputadoTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\ProposicionDiputadoTable
     */
    public $ProposicionDiputado;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.ProposicionDiputado'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('ProposicionDiputado') ? [] : ['className' => ProposicionDiputadoTable::class];
        $this->ProposicionDiputado = TableRegistry::getTableLocator()->get('ProposicionDiputado', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->ProposicionDiputado);

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
}
