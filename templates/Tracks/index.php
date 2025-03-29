<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Track> $tracks
 */
?>
<div class="tracks index content">
    <?php if ($this->Identity->get('role_id') !== null && $this->Identity->get('data')['role_id'] === 1): ?>
        <?= $this->Html->link(__('New Track'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <?php endif; ?>

    <h3><?= __('Tracks') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('created') ?></th>
                    <th><?= $this->Paginator->sort('modified') ?></th>
                    <th><?= $this->Paginator->sort('title') ?></th>
                    <th><?= $this->Paginator->sort('album_id') ?></th>
                    <th><?= $this->Paginator->sort('durationTime') ?></th>
                    <th><?= $this->Paginator->sort('spotifyLink') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($tracks as $track): ?>
                <tr>
                    <td><?= $this->Number->format($track->id) ?></td>
                    <td><?= h($track->created) ?></td>
                    <td><?= h($track->modified) ?></td>
                    <td><?= h($track->title) ?></td>
                    <td><?= $track->hasValue('album') ? $this->Html->link($track->album->title, ['controller' => 'Albums', 'action' => 'view', $track->album->id]) : '' ?></td>
                    <td><?= h($track->durationTime->format('H:i:s')) ?></td>
                    <td>
                        <?php
                        $spotifyLink = $track->spotifyLink;
                        preg_match('/track\/([a-zA-Z0-9]+)/', $spotifyLink, $matches);
                        $trackId = isset($matches[1]) ? $matches[1] : null;

                        if ($trackId): ?>
                            <iframe style="border-radius:12px" 
                                    src="https://open.spotify.com/embed/track/<?= h($trackId) ?>" 
                                    width="115%"
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
                        <?= $this->Html->link(__('View'), ['action' => 'view', $track->id]) ?>
                        <?php
                            $identity = $this->request->getAttribute('identity');
                            if ($identity && $identity->can('edit', $track)): ?>
                                <?= $this->Html->link(__('Edit'), ['action' => 'edit', $track->id]) ?>
                            <?php endif; ?>
                            
                            <?php
                            if ($identity && $identity->can('delete', $track)): ?>
                                <?= $this->Form->postLink(
                                    __('Delete'),
                                    ['action' => 'delete', $track->id],
                                    [
                                        'method' => 'delete',
                                        'confirm' => __('Are you sure you want to delete # {0}?', $track->id),
                                    ]
                                ) ?>
                        <?php endif; ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(__('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')) ?></p>
    </div>
</div>