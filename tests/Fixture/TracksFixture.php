<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * TracksFixture
 */
class TracksFixture extends TestFixture
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
                'created' => '2025-03-24 13:57:33',
                'modified' => '2025-03-24 13:57:33',
                'title' => '',
                'album_id' => 1,
                'durationTime' => '13:57:33',
                'spotifyLink' => 'Lorem ipsum dolor sit amet',
            ],
        ];
        parent::init();
    }
}
