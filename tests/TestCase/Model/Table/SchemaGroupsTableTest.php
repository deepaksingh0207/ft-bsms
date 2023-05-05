<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\SchemaGroupsTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\SchemaGroupsTable Test Case
 */
class SchemaGroupsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\SchemaGroupsTable
     */
    protected $SchemaGroups;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected $fixtures = [
        'app.SchemaGroups',
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
        $config = $this->getTableLocator()->exists('SchemaGroups') ? [] : ['className' => SchemaGroupsTable::class];
        $this->SchemaGroups = $this->getTableLocator()->get('SchemaGroups', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->SchemaGroups);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\SchemaGroupsTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
