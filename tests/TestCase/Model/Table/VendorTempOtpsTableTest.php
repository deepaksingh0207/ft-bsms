<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\VendorTempOtpsTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\VendorTempOtpsTable Test Case
 */
class VendorTempOtpsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\VendorTempOtpsTable
     */
    protected $VendorTempOtps;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected $fixtures = [
        'app.VendorTempOtps',
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
        $config = $this->getTableLocator()->exists('VendorTempOtps') ? [] : ['className' => VendorTempOtpsTable::class];
        $this->VendorTempOtps = $this->getTableLocator()->get('VendorTempOtps', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->VendorTempOtps);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\VendorTempOtpsTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \App\Model\Table\VendorTempOtpsTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
