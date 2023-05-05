<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * VendorTempOtpsFixture
 */
class VendorTempOtpsFixture extends TestFixture
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
                'vendor_temp_id' => 1,
                'otp' => 'Lore',
                'expire_date' => '2023-01-03 07:19:05',
                'verified' => 1,
                'added_date' => '2023-01-03 07:19:05',
            ],
        ];
        parent::init();
    }
}
