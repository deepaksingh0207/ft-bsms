<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * ProductAttributesFixture
 */
class ProductAttributesFixture extends TestFixture
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
                'product_id' => 1,
                'product_sub_category_id' => 1,
                'attribute' => 'Lorem ip',
                'status' => 1,
                'added_date' => '2022-09-09 17:37:33',
                'updated_date' => '2022-09-09 17:37:33',
            ],
        ];
        parent::init();
    }
}
