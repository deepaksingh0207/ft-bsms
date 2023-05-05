<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\BuyerSellerUsersTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\BuyerSellerUsersTable Test Case
 */
class BuyerSellerUsersTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\BuyerSellerUsersTable
     */
    protected $BuyerSellerUsers;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected $fixtures = [
        'app.BuyerSellerUsers',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('BuyerSellerUsers') ? [] : ['className' => BuyerSellerUsersTable::class];
        $this->BuyerSellerUsers = $this->getTableLocator()->get('BuyerSellerUsers', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->BuyerSellerUsers);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\BuyerSellerUsersTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \App\Model\Table\BuyerSellerUsersTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
