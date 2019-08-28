<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ProposicionTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ProposicionTable Test Case
 */
class ProposicionTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\ProposicionTable
     */
    public $Proposicion;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.Proposicion',
        'app.Diputado'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Proposicion') ? [] : ['className' => ProposicionTable::class];
        $this->Proposicion = TableRegistry::getTableLocator()->get('Proposicion', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Proposicion);

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
