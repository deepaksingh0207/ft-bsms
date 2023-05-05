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
                'inquiry' => 1,
                'created_date' => '2022-09-24 17:08:18',
            ],
        ];
        parent::init();
    }
}
