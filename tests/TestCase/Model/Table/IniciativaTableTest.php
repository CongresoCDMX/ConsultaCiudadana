<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\IniciativaTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\IniciativaTable Test Case
 */
class IniciativaTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\IniciativaTable
     */
    public $Iniciativa;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.Iniciativa',
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
        $config = TableRegistry::getTableLocator()->exists('Iniciativa') ? [] : ['className' => IniciativaTable::class];
        $this->Iniciativa = TableRegistry::getTableLocator()->get('Iniciativa', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Iniciativa);

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
