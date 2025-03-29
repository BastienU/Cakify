<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Album Entity
 *
 * @property int $id
 * @property \Cake\I18n\DateTime $created
 * @property \Cake\I18n\DateTime $modified
 * @property string $title
 * @property \Cake\I18n\Date $releaseDate
 * @property string $cover
 * @property int $artist_id
 * @property string $spotifyLink
 *
 * @property \App\Model\Entity\Track[] $tracks
 */
class Album extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array<string, bool>
     */
    protected array $_accessible = [
        'created' => true,
        'modified' => true,
        'title' => true,
        'releaseDate' => true,
        'cover' => true,
        'artist_id' => true,
        'spotifyLink' => true,
        'tracks' => true,
    ];
}
