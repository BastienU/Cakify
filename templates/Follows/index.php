<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Follow> $follows
 */
?>
<div class="follows index content">
    <?= $this->Html->link(__('New Follow'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Follows') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('created') ?></th>
                    <th><?= $this->Paginator->sort('modified') ?></th>
                    <th><?= $this->Paginator->sort('user_id') ?></th>
                    <th><?= $this->Paginator->sort('album_id') ?></th>
                    <th><?= $this->Paginator->sort('artist_id') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($follows as $follow): ?>
                <tr>
                    <td><?= $this->Number->format($follow->id) ?></td>
                    <td><?= h($follow->created) ?></td>
                    <td><?= h($follow->modified) ?></td>
                    <td><?= $follow->hasValue('user') ? $this->Html->link($follow->user->email, ['controller' => 'Users', 'action' => 'view', $follow->user->id]) : '' ?></td>
                    <td><?= $follow->hasValue('album') ? $this->Html->link($follow->album->title, ['controller' => 'Albums', 'action' => 'view', $follow->album->id]) : '' ?></td>
                    <td><?= $follow->hasValue('artist') ? $this->Html->link($follow->artist->name, ['controller' => 'Artists', 'action' => 'view', $follow->artist->id]) : '' ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $follow->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $follow->id]) ?>
                        <?= $this->Form->postLink(
                            __('Delete'),
                            ['action' => 'delete', $follow->id],
                            [
                                'method' => 'delete',
                                'confirm' => __('Are you sure you want to delete # {0}?', $follow->id),
                            ]
                        ) ?>
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