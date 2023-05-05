<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * ItemScheduleMessagesFixture
 */
class ItemScheduleMessagesFixture extends TestFixture
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
                'user_id' => 1,
                'schedule_id' => 1,
                'message' => 'Lorem ipsum dolor sit amet',
                'is_read' => 1,
                'status' => 1,
                'added_date' => '2023-02-02 09:52:34',
                'updated_date' => '2023-02-02 09:52:34',
            ],
        ];
        parent::init();
    }
}
