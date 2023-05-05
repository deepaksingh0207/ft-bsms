<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * VendorMaterialStocksFixture
 */
class VendorMaterialStocksFixture extends TestFixture
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
                'sap_vendor_code' => 'Lorem ip',
                'material' => 'Lorem ipsum dolo',
                'part_code' => 'Lorem ipsum dolor ',
                'material_desc' => 'Lorem ipsum dolor sit amet',
                'current_stock' => 1.5,
                'production_stock' => 1.5,
                'status' => 1,
                'added_date' => '2023-01-31 07:05:40',
                'updated_date' => '2023-01-31 07:05:40',
            ],
        ];
        parent::init();
    }
}
