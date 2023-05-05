<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * RfqDetailsFixture
 */
class RfqDetailsFixture extends TestFixture
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
                'buyer_seller_user_id' => 1,
                'product_id' => 1,
                'product_sub_category_id' => 1,
                'attribute_data' => '',
                'description' => 'Lorem ipsum dolor sit amet',
                'status' => 1,
                'added_date' => '2022-09-13 07:25:51',
                'updated_date' => '2022-09-13 07:25:51',
            ],
        ];
        parent::init();
    }
}
