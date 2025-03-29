<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * FollowsFixture
 */
class FollowsFixture extends TestFixture
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
                'created' => '2025-03-29 14:49:19',
                'modified' => '2025-03-29 14:49:19',
                'user_id' => 1,
                'album_id' => 1,
                'artist_id' => 1,
            ],
        ];
        parent::init();
    }
}
