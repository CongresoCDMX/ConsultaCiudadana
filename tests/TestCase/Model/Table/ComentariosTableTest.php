<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ComentariosTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ComentariosTable Test Case
 */
class ComentariosTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\ComentariosTable
     */
    public $Comentarios;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.Comentarios'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Comentarios') ? [] : ['className' => ComentariosTable::class];
        $this->Comentarios = TableRegistry::getTableLocator()->get('Comentarios', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Comentarios);

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
