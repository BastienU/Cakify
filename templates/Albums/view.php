<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Album $album
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <?php if ($this->Identity->get('role_id') !== null && $this->Identity->get('data')['role_id'] === 1): ?>
                <h4 class="heading"><?= __('Actions') ?></h4>
                <?= $this->Html->link(__('Edit Album'), ['action' => 'edit', $album->id], ['class' => 'side-nav-item']) ?>
                <?= $this->Form->postLink(__('Delete Album'), ['action' => 'delete', $album->id], ['confirm' => __('Are you sure you want to delete # {0}?', $album->id), 'class' => 'side-nav-item']) ?>
                <?= $this->Html->link(__('New Album'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
            <?php endif; ?>
            <?= $this->Html->link(__('List Albums'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="albums view content">
            <h3><?= h($album->title) ?></h3>
            <table>
                <tr>
                    <th><?= __('Title') ?></th>
                    <td><?= h($album->title) ?></td>
                </tr>
                <tr>
                    <th><?= __('Cover') ?></th>
                    <td>
                        <?php if (!empty($album->cover)): ?>
                            <img src="<?= h($album->cover) ?>" alt="Cover Image" style="width: 100%; height: 100%; object-fit: cover;">
                        <?php else: ?>
                            <!-- Fallback if no cover is provided -->
                            <p>No cover image</p>
                        <?php endif; ?>
                    </td>
                </tr>
                <tr>
                    <th><?= __('SpotifyLink') ?></th>
                    <td><a href="<?= $album->spotifyLink ?>" target="_blank"><?= h($album->spotifyLink) ?></a></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($album->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Artist name') ?></th>
                    <td><?= h($album->artist->name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= h($album->created) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modified') ?></th>
                    <td><?= h($album->modified) ?></td>
                </tr>
                <tr>
                    <th><?= __('ReleaseDate') ?></th>
                    <td><?= h($album->releaseDate) ?></td>
                </tr>
            </table>
            <div class="related">
                <h4><?= __('Related Tracks') ?></h4>
                <?php if (!empty($album->tracks)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Created') ?></th>
                            <th><?= __('Modified') ?></th>
                            <th><?= __('Title') ?></th>
                            <th><?= __('Album Id') ?></th>
                            <th><?= __('DurationTime') ?></th>
                            <th><?= __('SpotifyLink') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($album->tracks as $track) : ?>
                        <tr>
                            <td><?= h($track->id) ?></td>
                            <td><?= h($track->created) ?></td>
                            <td><?= h($track->modified) ?></td>
                            <td><?= h($track->title) ?></td>
                            <td><?= h($track->album_id) ?></td>
                            <td><?= h($track->durationTime->format('H:i:s')) ?></td>
                            <td>
                                <?php
                                $spotifyLink = $track->spotifyLink;
                                preg_match('/track\/([a-zA-Z0-9]+)/', $spotifyLink, $matches);
                                $trackId = isset($matches[1]) ? $matches[1] : null;

                                if ($trackId): ?>
                                    <iframe style="border-radius:12px" 
                                            src="https://open.spotify.com/embed/track/<?= h($trackId) ?>" 
                                            width="120px"
                                            height="100vh"
                                            frameBorder="0" 
                                            allowfullscreen="" 
                                            allow="autoplay; clipboard-write; encrypted-media; fullscreen; picture-in-picture" 
                                            loading="lazy">
                                    </iframe>
                                <?php else: ?>>
                                    <p>Spotify link: <?= h($spotifyLink) ?></p>
                                <?php endif; ?>
                            </td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Tracks', 'action' => 'view', $track->id]) ?>
                                <?php if ($this->Identity->get('role_id') !== null && $this->Identity->get('data')['role_id'] === 1): ?>
                                    <?= $this->Html->link(__('Edit'), ['controller' => 'Tracks', 'action' => 'edit', $track->id]) ?>
                                    <?= $this->Form->postLink(
                                        __('Delete'),
                                        ['controller' => 'Tracks', 'action' => 'delete', $track->id],
                                        [
                                            'method' => 'delete',
                                            'confirm' => __('Are you sure you want to delete # {0}?', $track->id),
                                        ]
                                    ) ?>
                                <?php endif; ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>