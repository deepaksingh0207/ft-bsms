<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\UomsTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\UomsTable Test Case
 */
class UomsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\UomsTable
     */
    protected $Uoms;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected $fixtures = [
        'app.Uoms',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Uoms') ? [] : ['className' => UomsTable::class];
        $this->Uoms = $this->getTableLocator()->get('Uoms', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->Uoms);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\UomsTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
