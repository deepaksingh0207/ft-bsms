<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\RfqForSellersTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\RfqForSellersTable Test Case
 */
class RfqForSellersTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\RfqForSellersTable
     */
    protected $RfqForSellers;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected $fixtures = [
        'app.RfqForSellers',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('RfqForSellers') ? [] : ['className' => RfqForSellersTable::class];
        $this->RfqForSellers = $this->getTableLocator()->get('RfqForSellers', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->RfqForSellers);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\RfqForSellersTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \App\Model\Table\RfqForSellersTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
