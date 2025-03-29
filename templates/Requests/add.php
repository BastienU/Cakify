<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Request $request
 * @var \Cake\Collection\CollectionInterface|string[] $users
 */

 // Get the logged-in user ID
$loggedInUserId = $this->request->getAttribute('identity')->getIdentifier();
$loggedInUserName = $this->request->getAttribute('identity')->get('name'); // or 'email'

// Filter the users collection to show only the logged-in user
// CakePHP's FormHelper expects an array of 'id' => 'name' for dropdowns, so we prepare that format.
$filteredUsersOptions = [
    $loggedInUserId => $loggedInUserName
];
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Requests'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="requests form content">
            <?= $this->Form->create($request) ?>
            <fieldset>
                <legend><?= __('Add Request') ?></legend>
                <?php
                    echo $this->Form->control('user_id', [
                        'options' => $filteredUsersOptions,
                        'empty' => $loggedInUserName,
                        'readonly' => true,
                        'style' => 'display: none;'
                    ]);
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
                            'new' => 'New'
                        ]
                    ]);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
