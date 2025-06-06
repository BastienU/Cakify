<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Artist> $artists
 */
?>
<div class="artists index content">
    <?php if ($this->Identity->get('role_id') !== null && $this->Identity->get('data')['role_id'] === 1): ?>
        <?= $this->Html->link(__('New Artist'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <?php endif; ?>

    <h3><?= __('Artists') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('created') ?></th>
                    <th><?= $this->Paginator->sort('modified') ?></th>
                    <th><?= $this->Paginator->sort('name') ?></th>
                    <th><?= $this->Paginator->sort('spotifyLink') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($artists as $artist): ?>
                <tr>
                    <td><?= $this->Number->format($artist->id) ?></td>
                    <td><?= h($artist->created) ?></td>
                    <td><?= h($artist->modified) ?></td>
                    <td><?= h($artist->name) ?></td>
                    <td><a href="<?= $artist->spotifyLink ?>" target="_blank"><?= h($artist->spotifyLink) ?></a></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $artist->id]) ?>

                        <?php
                        $identity = $this->request->getAttribute('identity');
                        if ($identity && $identity->can('edit', $artist)): ?>
                            <?= $this->Html->link(__('Edit'), ['action' => 'edit', $artist->id]) ?>
                        <?php endif; ?>
                        
                        <?php
                        if ($identity && $identity->can('delete', $artist)): ?>
                            <?= $this->Form->postLink(
                                __('Delete'),
                                ['action' => 'delete', $artist->id],
                                [
                                    'method' => 'delete',
                                    'confirm' => __('Are you sure you want to delete # {0}?', $artist->id),
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