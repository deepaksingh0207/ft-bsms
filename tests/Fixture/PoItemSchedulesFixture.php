<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * PoItemSchedulesFixture
 */
class PoItemSchedulesFixture extends TestFixture
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
                'po_header_id' => 1,
                'po_footer_id' => 1,
                'actual_qty' => 1.5,
                'received_qty' => 1.5,
                'delivery_date' => '2023-01-23 06:59:26',
                'status' => 1,
                'added_date' => '2023-01-23 06:59:26',
                'updated_date' => '2023-01-23 06:59:26',
            ],
        ];
        parent::init();
    }
}
