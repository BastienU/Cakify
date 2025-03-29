<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Track $track
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?php if ($this->Identity->get('role_id') !== null && $this->Identity->get('data')['role_id'] === 1): ?>
                <?= $this->Html->link(__('Edit Track'), ['action' => 'edit', $track->id], ['class' => 'side-nav-item']) ?>
                <?= $this->Form->postLink(__('Delete Track'), ['action' => 'delete', $track->id], ['confirm' => __('Are you sure you want to delete # {0}?', $track->id), 'class' => 'side-nav-item']) ?>
                <?= $this->Html->link(__('New Track'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
            <?php endif; ?>
            <?= $this->Html->link(__('List Tracks'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="tracks view content">
            <h3><?= h($track->title) ?></h3>
            <table>
                <tr>
                    <th><?= __('Title') ?></th>
                    <td><?= h($track->title) ?></td>
                </tr>
                <tr>
                    <th><?= __('Album') ?></th>
                    <td><?= $track->hasValue('album') ? $this->Html->link($track->album->title, ['controller' => 'Albums', 'action' => 'view', $track->album->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('SpotifyLink') ?></th>
                    <td>
                        <?php
                        $spotifyLink = $track->spotifyLink;
                        preg_match('/track\/([a-zA-Z0-9]+)/', $spotifyLink, $matches);
                        $trackId = isset($matches[1]) ? $matches[1] : null;

                        if ($trackId): ?>
                            <iframe style="border-radius:12px" 
                                    src="https://open.spotify.com/embed/track/<?= h($trackId) ?>" 
                                    width="100%" 
                                    height="80vh"
                                    frameBorder="0" 
                                    allowfullscreen="" 
                                    allow="autoplay; clipboard-write; encrypted-media; fullscreen; picture-in-picture" 
                                    loading="lazy">
                            </iframe>
                        <?php else: ?>>
                            <p>Spotify link: <?= h($spotifyLink) ?></p>
                        <?php endif; ?>
                    </td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($track->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= h($track->created) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modified') ?></th>
                    <td><?= h($track->modified) ?></td>
                </tr>
                <tr>
                    <th><?= __('DurationTime') ?></th>
                    <td><?= h($track->durationTime->format('H:i:s')) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>