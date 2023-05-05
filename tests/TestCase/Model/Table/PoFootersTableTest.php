<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\PoFootersTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\PoFootersTable Test Case
 */
class PoFootersTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\PoFootersTable
     */
    protected $PoFooters;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected $fixtures = [
        'app.PoFooters',
        'app.PoHeaders',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('PoFooters') ? [] : ['className' => PoFootersTable::class];
        $this->PoFooters = $this->getTableLocator()->get('PoFooters', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->PoFooters);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\PoFootersTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \App\Model\Table\PoFootersTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
