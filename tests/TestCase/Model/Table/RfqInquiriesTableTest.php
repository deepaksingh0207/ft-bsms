<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\RfqInquiriesTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\RfqInquiriesTable Test Case
 */
class RfqInquiriesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\RfqInquiriesTable
     */
    protected $RfqInquiries;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected $fixtures = [
        'app.RfqInquiries',
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
        $config = $this->getTableLocator()->exists('RfqInquiries') ? [] : ['className' => RfqInquiriesTable::class];
        $this->RfqInquiries = $this->getTableLocator()->get('RfqInquiries', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->RfqInquiries);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\RfqInquiriesTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \App\Model\Table\RfqInquiriesTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
