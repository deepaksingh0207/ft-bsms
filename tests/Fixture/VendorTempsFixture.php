<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * VendorTempsFixture
 */
class VendorTempsFixture extends TestFixture
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
                'purchasing_organization_id' => 1,
                'account_group_id' => 1,
                'schema_group_id' => 1,
                'name' => 'Lorem ipsum dolor sit amet',
                'address' => 'Lorem ipsum dolor sit amet',
                'city' => 'Lorem ipsum dolor sit amet',
                'pincode' => 'Lore',
                'mobile' => 'Lorem ipsu',
                'email_id' => 'Lorem ipsum dolor sit amet',
                'country' => 'Lorem ipsum dolor sit amet',
                'payment_term' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
                'order_currency' => 'Lorem ip',
                'gst_no' => 'Lorem ipsum dolor ',
                'pan_no' => 'Lorem ipsum dolor ',
                'contact_person' => 'Lorem ipsum dolor sit amet',
                'contact_email_id' => 'Lorem ipsum dolor sit amet',
                'contact_mobile' => 'Lorem ipsu',
                'cin_no' => 'Lorem ipsum dolor sit a',
                'tan_no' => 'Lorem ipsum dolor sit a',
                'status' => 1,
                'valid_date' => '2023-01-02 07:45:20',
                'buyer_id' => 1,
                'added_date' => '2023-01-02 07:45:20',
                'updated_date' => '2023-01-02 07:45:20',
            ],
        ];
        parent::init();
    }
}
