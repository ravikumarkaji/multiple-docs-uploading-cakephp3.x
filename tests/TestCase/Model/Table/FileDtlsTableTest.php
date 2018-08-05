<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\FileDtlsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\FileDtlsTable Test Case
 */
class FileDtlsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\FileDtlsTable
     */
    public $FileDtls;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.file_dtls',
        'app.files'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('FileDtls') ? [] : ['className' => FileDtlsTable::class];
        $this->FileDtls = TableRegistry::get('FileDtls', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->FileDtls);

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
