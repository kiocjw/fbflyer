<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ShoppingCartsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ShoppingCartsTable Test Case
 */
class ShoppingCartsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\ShoppingCartsTable
     */
    public $ShoppingCarts;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.shopping_carts',
        'app.users',
        'app.companies',
        'app.deals',
        'app.categories',
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
        $config = TableRegistry::exists('ShoppingCarts') ? [] : ['className' => 'App\Model\Table\ShoppingCartsTable'];
        $this->ShoppingCarts = TableRegistry::get('ShoppingCarts', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->ShoppingCarts);

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
