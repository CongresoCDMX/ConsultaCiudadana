<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\DictamenTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\DictamenTable Test Case
 */
class DictamenTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\DictamenTable
     */
    public $Dictamen;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.Dictamen'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Dictamen') ? [] : ['className' => DictamenTable::class];
        $this->Dictamen = TableRegistry::getTableLocator()->get('Dictamen', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Dictamen);

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
