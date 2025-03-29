<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Request $request
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?php if ($this->Identity->get('role_id') !== null && $this->Identity->get('data')['role_id'] === 1): ?>
                <?= $this->Html->link(__('Edit Request'), ['action' => 'edit', $request->id], ['class' => 'side-nav-item']) ?>
                <?= $this->Form->postLink(__('Delete Request'), ['action' => 'delete', $request->id], ['confirm' => __('Are you sure you want to delete # {0}?', $request->id), 'class' => 'side-nav-item']) ?>
                <?= $this->Html->link(__('New Request'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
            <?php endif; ?>
            <?= $this->Html->link(__('List Requests'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="requests view content">
            <h3><?= h($request->name) ?></h3>
            <table>
                <tr>
                    <th><?= __('User') ?></th>
                    <td><?= $request->hasValue('user') ? $this->Html->link($request->user->email, ['controller' => 'Users', 'action' => 'view', $request->user->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Request Type') ?></th>
                    <td><?= h($request->request_type) ?></td>
                </tr>
                <tr>
                    <th><?= __('Name') ?></th>
                    <td><?= h($request->name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Status') ?></th>
                    <td><?= h($request->status) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($request->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= h($request->created) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modified') ?></th>
                    <td><?= h($request->modified) ?></td>
                </tr>
            </table>
            <div class="text">
                <strong><?= __('Details') ?></strong>
                <blockquote>
                    <?= $this->Text->autoParagraph(h($request->details)); ?>
                </blockquote>
            </div>
        </div>
    </div>
</div>