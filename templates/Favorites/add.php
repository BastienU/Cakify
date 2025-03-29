<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Favorite $favorite
 * @var \Cake\Collection\CollectionInterface|string[] $users
 * @var \Cake\Collection\CollectionInterface|string[] $albums
 * @var \Cake\Collection\CollectionInterface|string[] $artists
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
            <?= $this->Html->link(__('List Favorites'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="favorites form content">
            <?= $this->Form->create($favorite) ?>
            <fieldset>
                <legend><?= __('Add Favorite') ?></legend>

                <?= $this->Form->control('user_id', [
                    'options' => $filteredUsersOptions,
                    'empty' => $loggedInUserName,
                    'readonly' => true,
                    'style' => 'display: none;'
                ]) ?>

                <?= $this->Form->control('artist_id', [
                    'label' => 'Select Artist',
                    'options' => $artists, 
                    'empty' => 'Choose an artist'
                ]) ?>

                <?= $this->Form->control('album_id', [
                    'label' => 'Select Album',
                    'options' => $albums, 
                    'empty' => 'Choose an album'
                ]) ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
