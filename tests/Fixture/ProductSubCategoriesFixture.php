<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * ProductSubCategoriesFixture
 */
class ProductSubCategoriesFixture extends TestFixture
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
                'name' => 'Lorem ipsum dolor sit amet',
                'description' => 'Lorem ipsum dolor sit amet',
                'status' => 1,
                'added_date' => '2022-09-09 17:37:43',
                'updated_date' => '2022-09-09 17:37:43',
            ],
        ];
        parent::init();
    }
}
