<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * UsersFixture
 */
class UsersFixture extends TestFixture
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
                'username' => 'Lorem ipsum dolor sit amet',
                'password' => '',
                'group_id' => 1,
                'created' => '2023-01-05 10:47:36',
                'modified' => '2023-01-05 10:47:36',
            ],
        ];
        parent::init();
    }
}
