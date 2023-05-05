<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\PoHeadersTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\PoHeadersTable Test Case
 */
class PoHeadersTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\PoHeadersTable
     */
    protected $PoHeaders;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected $fixtures = [
        'app.PoHeaders',
        'app.PoFooters',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('PoHeaders') ? [] : ['className' => PoHeadersTable::class];
        $this->PoHeaders = $this->getTableLocator()->get('PoHeaders', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->PoHeaders);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\PoHeadersTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
