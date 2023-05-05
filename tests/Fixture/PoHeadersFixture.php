<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * PoHeadersFixture
 */
class PoHeadersFixture extends TestFixture
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
                'po_no' => 'Lorem ip',
                'document_type' => 'Lo',
                'created_on' => '2023-01-04 10:01:34',
                'created_by' => 'Lorem ipsu',
                'pay_terms' => 'Lorem ipsum dolor sit amet',
                'currency' => 'L',
                'exchange_rate' => 1.5,
                'release_status' => 'Lorem ip',
                'added_date' => '2023-01-04 10:01:34',
                'updated_date' => '2023-01-04 10:01:34',
            ],
        ];
        parent::init();
    }
}
