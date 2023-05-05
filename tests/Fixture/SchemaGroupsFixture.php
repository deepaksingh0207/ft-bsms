<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * SchemaGroupsFixture
 */
class SchemaGroupsFixture extends TestFixture
{
    /**
     * Init method
     *
     * @return void
     */
    public function init(): void
    {
        $this->records = [
            [
                'id' => 1,
                'name' => 'Lorem ipsum dolor sit amet',
                'status' => 1,
                'added_date' => '2023-01-02 08:05:09',
                'updated_date' => '2023-01-02 08:05:09',
            ],
        ];
        parent::init();
    }
}
