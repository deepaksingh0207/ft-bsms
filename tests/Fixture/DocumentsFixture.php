<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * DocumentsFixture
 */
class DocumentsFixture extends TestFixture
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
                'type' => 'Lorem ipsum dolor ',
                'path' => 'Lorem ipsum dolor sit amet',
                'status' => 1,
                'added_date' => '2022-09-09 17:37:27',
                'updated_date' => '2022-09-09 17:37:27',
            ],
        ];
        parent::init();
    }
}
