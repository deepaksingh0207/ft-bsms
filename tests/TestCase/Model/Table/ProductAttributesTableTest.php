<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ProductAttributesTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ProductAttributesTable Test Case
 */
class ProductAttributesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\ProductAttributesTable
     */
    protected $ProductAttributes;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected $fixtures = [
        'app.ProductAttributes',
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
        $config = $this->getTableLocator()->exists('ProductAttributes') ? [] : ['className' => ProductAttributesTable::class];
        $this->ProductAttributes = $this->getTableLocator()->get('ProductAttributes', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->ProductAttributes);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\ProductAttributesTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \App\Model\Table\ProductAttributesTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
