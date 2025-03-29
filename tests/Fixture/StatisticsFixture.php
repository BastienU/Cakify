<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * StatisticsFixture
 */
class StatisticsFixture extends TestFixture
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
                'created' => '2025-03-24 13:58:32',
                'modified' => '2025-03-24 13:58:32',
                'stat_type' => 'Lorem ipsum dolor sit amet',
                'item_id' => 1,
                'count' => 1,
            ],
        ];
        parent::init();
    }
}
