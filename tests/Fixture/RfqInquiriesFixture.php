<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * RfqInquiriesFixture
 */
class RfqInquiriesFixture extends TestFixture
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
                'rfq_id' => 1,
                'seller_id' => 1,
                'qty' => 1.5,
                'rate' => 1.5,
                'discount' => 1.5,
                'sub_total' => 1.5,
                'delivery_date' => '2024-03-06',
                'inquiry_data' => '',
                'inquiry' => 1,
                'created_date' => '2024-03-06 11:02:27',
                'updated_date' => '2024-03-06 11:02:27',
                'neg_rate' => 1.5,
            ],
        ];
        parent::init();
    }
}
