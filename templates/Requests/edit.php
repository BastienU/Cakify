<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Request $request
 * @var string[]|\Cake\Collection\CollectionInterface $users
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $request->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $request->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Requests'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="requests form content">
            <?= $this->Form->create($request) ?>
            <fieldset>
                <legend><?= __('Edit Request') ?></legend>
                <?php
                    echo $this->Form->control('user_id', ['options' => $users]);
                    echo $this->Form->control('request_type', [
                        'type' => 'select',
                        'options' => [
                            'new_artist' => 'New artist',
                            'edit_artist' => 'Edit artist',
                            'delete_artist' => 'Delete artist',
                            'new_album' => 'New album',
                            'edit_album' => 'Edit album',
                            'delete_album' => 'Delete album',
                            'new_track' => 'New track',
                            'edit_track' => 'Edit track',
                            'delete_track' => 'Delete track',
                        ]
                    ]);
                    echo $this->Form->control('name');
                    echo $this->Form->control('details');
                    echo $this->Form->control('status', [
                        'type' => 'select',
                        'options' => [
                            'new' => 'New',
                            'in_progress' => 'In Progress',
                            'finished' => 'Finished',
                            'canceled_refused' => 'Canceled/Refused'
                        ]
                    ]);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
