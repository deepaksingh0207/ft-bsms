<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * BuyerSellerUsersFixture
 */
class BuyerSellerUsersFixture extends TestFixture
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
                'company_name' => 'Lorem ipsum dolor sit amet',
                'address' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
                'cities' => 'Lorem ipsum dolor sit amet',
                'email_id' => 'Lorem ipsum dolor sit amet',
                'contact' => 'Lorem ip',
                'alt_contact' => 'Lorem ip',
                'business_type' => 'Lorem ipsum dolor ',
                'is_verified' => 1,
                'status' => 1,
                'added_date' => '2022-09-09 17:37:18',
                'updated_date' => '2022-09-09 17:37:18',
            ],
        ];
        parent::init();
    }
}
