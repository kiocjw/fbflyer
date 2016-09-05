<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\DealsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\DealsTable Test Case
 */
class DealsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\DealsTable
     */
    public $Deals;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.deals',
        'app.users',
        'app.companies',
        'app.merchants',
        'app.merchants_deals'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Deals') ? [] : ['className' => 'App\Model\Table\DealsTable'];
        $this->Deals = TableRegistry::get('Deals', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Deals);

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
