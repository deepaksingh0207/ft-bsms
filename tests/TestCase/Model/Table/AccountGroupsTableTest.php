<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\AccountGroupsTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\AccountGroupsTable Test Case
 */
class AccountGroupsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\AccountGroupsTable
     */
    protected $AccountGroups;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected $fixtures = [
        'app.AccountGroups',
        'app.VendorTemps',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('AccountGroups') ? [] : ['className' => AccountGroupsTable::class];
        $this->AccountGroups = $this->getTableLocator()->get('AccountGroups', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->AccountGroups);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\AccountGroupsTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
