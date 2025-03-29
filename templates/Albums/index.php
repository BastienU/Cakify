<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Album> $albums
 */
?>
<div class="albums index content">
    <?php if ($this->Identity->get('role_id') !== null && $this->Identity->get('data')['role_id'] === 1): ?>
        <?= $this->Html->link(__('New Album'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <?php endif; ?>

    <h3><?= __('Albums') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('created') ?></th>
                    <th><?= $this->Paginator->sort('modified') ?></th>
                    <th><?= $this->Paginator->sort('title') ?></th>
                    <th><?= $this->Paginator->sort('releaseDate') ?></th>
                    <th><?= $this->Paginator->sort('cover') ?></th>
                    <th><?= $this->Paginator->sort('name artist') ?></th>
                    <th><?= $this->Paginator->sort('spotifyLink') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($albums as $album): ?>
                <tr>
                    <td><?= $this->Number->format($album->id) ?></td>
                    <td><?= h($album->created) ?></td>
                    <td><?= h($album->modified) ?></td>
                    <td><?= h($album->title) ?></td>
                    <td><?= h($album->releaseDate) ?></td>
                    <td>
                        <?php if (!empty($album->cover)): ?>
                            <img src="<?= h($album->cover) ?>" alt="Cover Image" style="width: 100%; height: 100%; object-fit: cover;">
                        <?php else: ?>
                            <!-- Fallback if no cover is provided -->
                            <p>No cover image</p>
                        <?php endif; ?>
                    </td>

                    <td><?= h($album->artist ? $album->artist->name : 'Unknown') ?></td>
                    <td><a href="<?= $album->spotifyLink ?>" target="_blank"><?= h($album->spotifyLink) ?></a></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $album->id]) ?>

                        <?php
                        $identity = $this->request->getAttribute('identity');
                        if ($identity && $identity->can('edit', $album)): ?>
                            <?= $this->Html->link(__('Edit'), ['action' => 'edit', $album->id]) ?>
                        <?php endif; ?>
                        
                        <?php
                        if ($identity && $identity->can('delete', $album)): ?>
                            <?= $this->Form->postLink(
                                __('Delete'),
                                ['action' => 'delete', $album->id],
                                [
                                    'method' => 'delete',
                                    'confirm' => __('Are you sure you want to delete # {0}?', $album->id),
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