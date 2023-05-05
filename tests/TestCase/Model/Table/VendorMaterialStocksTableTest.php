<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\VendorMaterialStocksTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\VendorMaterialStocksTable Test Case
 */
class VendorMaterialStocksTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\VendorMaterialStocksTable
     */
    protected $VendorMaterialStocks;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected $fixtures = [
        'app.VendorMaterialStocks',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('VendorMaterialStocks') ? [] : ['className' => VendorMaterialStocksTable::class];
        $this->VendorMaterialStocks = $this->getTableLocator()->get('VendorMaterialStocks', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->VendorMaterialStocks);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\VendorMaterialStocksTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
