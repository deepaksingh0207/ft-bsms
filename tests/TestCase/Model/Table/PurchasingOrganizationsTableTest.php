<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\PurchasingOrganizationsTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\PurchasingOrganizationsTable Test Case
 */
class PurchasingOrganizationsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\PurchasingOrganizationsTable
     */
    protected $PurchasingOrganizations;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected $fixtures = [
        'app.PurchasingOrganizations',
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
        $config = $this->getTableLocator()->exists('PurchasingOrganizations') ? [] : ['className' => PurchasingOrganizationsTable::class];
        $this->PurchasingOrganizations = $this->getTableLocator()->get('PurchasingOrganizations', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->PurchasingOrganizations);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\PurchasingOrganizationsTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
