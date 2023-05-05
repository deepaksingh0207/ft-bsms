<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * RfqForSellersFixture
 */
class RfqForSellersFixture extends TestFixture
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
                'seller_id' => 1,
                'rfq_id' => 1,
            ],
        ];
        parent::init();
    }
}
