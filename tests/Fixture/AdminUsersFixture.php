<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * AdminUsersFixture
 */
class AdminUsersFixture extends TestFixture
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
                'username' => 'Lorem ipsum dolor ',
                'password' => 'Lorem ip',
                'email_id' => 'Lorem ipsum dolor sit amet',
                'role' => 1,
                'status' => 1,
                'last_login' => '2022-09-09 17:36:43',
                'added_date' => '2022-09-09 17:36:43',
                'updated_date' => '2022-09-09 17:36:43',
            ],
        ];
        parent::init();
    }
}
