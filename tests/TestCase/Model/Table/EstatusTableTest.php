<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\EstatusTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\EstatusTable Test Case
 */
class EstatusTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\EstatusTable
     */
    public $Estatus;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.Estatus'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Estatus') ? [] : ['className' => EstatusTable::class];
        $this->Estatus = TableRegistry::getTableLocator()->get('Estatus', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Estatus);

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
