<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * PoFootersFixture
 */
class PoFootersFixture extends TestFixture
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
                'item' => 'Lor',
                'deleted_indication' => 'L',
                'material' => 'Lorem ipsum dolo',
                'short_text' => 'Lorem ipsum dolor sit amet',
                'po_qty' => 1.5,
                'grn_qty' => 1.5,
                'pending_qty' => 1.5,
                'order_unit' => 'L',
                'net_price' => 1.5,
                'price_unit' => 'L',
                'net_value' => 1.5,
                'gross_value' => 1.5,
                'added_date' => '2023-01-04 10:01:39',
                'updated_date' => '2023-01-04 10:01:39',
            ],
        ];
        parent::init();
    }
}
