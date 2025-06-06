<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Track Entity
 *
 * @property int $id
 * @property \Cake\I18n\DateTime $created
 * @property \Cake\I18n\DateTime $modified
 * @property string $title
 * @property int $album_id
 * @property \Cake\I18n\Time $durationTime
 * @property string $spotifyLink
 *
 * @property \App\Model\Entity\Album $album
 */
class Track extends Entity
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
        'album_id' => true,
        'durationTime' => true,
        'spotifyLink' => true,
        'album' => true,
    ];
}
