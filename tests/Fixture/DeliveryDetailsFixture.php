<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * DeliveryDetailsFixture
 */
class DeliveryDetailsFixture extends TestFixture
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
                'challan_no' => 'Lorem ipsum dolor ',
                'qty' => 1.5,
                'eway_bill_no' => 'Lorem ipsum d',
                'einvoice_no' => 'Lorem ipsum d',
                'challan_document' => 'Lorem ipsum dolor sit amet',
                'status' => 'L',
                'added_date' => '2023-01-14 09:55:43',
                'updated_date' => '2023-01-14 09:55:43',
            ],
        ];
        parent::init();
    }
}
