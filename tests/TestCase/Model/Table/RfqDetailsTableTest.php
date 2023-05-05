<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\RfqDetailsTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\RfqDetailsTable Test Case
 */
class RfqDetailsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\RfqDetailsTable
     */
    protected $RfqDetails;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected $fixtures = [
        'app.RfqDetails',
        'app.BuyerSellerUsers',
        'app.Products',
        'app.ProductSubCategories',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('RfqDetails') ? [] : ['className' => RfqDetailsTable::class];
        $this->RfqDetails = $this->getTableLocator()->get('RfqDetails', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->RfqDetails);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\RfqDetailsTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \App\Model\Table\RfqDetailsTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
