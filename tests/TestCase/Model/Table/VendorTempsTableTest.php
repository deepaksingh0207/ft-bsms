<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\VendorTempsTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\VendorTempsTable Test Case
 */
class VendorTempsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\VendorTempsTable
     */
    protected $VendorTemps;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected $fixtures = [
        'app.VendorTemps',
        'app.PurchasingOrganizations',
        'app.AccountGroups',
        'app.SchemaGroups',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('VendorTemps') ? [] : ['className' => VendorTempsTable::class];
        $this->VendorTemps = $this->getTableLocator()->get('VendorTemps', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->VendorTemps);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\VendorTempsTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \App\Model\Table\VendorTempsTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
