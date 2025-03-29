<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Follow $follow
 * @var string[]|\Cake\Collection\CollectionInterface $users
 * @var string[]|\Cake\Collection\CollectionInterface $albums
 * @var string[]|\Cake\Collection\CollectionInterface $artists
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
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $follow->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $follow->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Follows'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="follows form content">
            <?= $this->Form->create($follow) ?>
            <fieldset>
                <legend><?= __('Edit Follow') ?></legend>
                <?php
                    echo$this->Form->control('user_id', [
                        'options' => $filteredUsersOptions,
                        'empty' => $loggedInUserName,
                        'readonly' => true,
                        'style' => 'display: none;'
                    ]);
                    echo $this->Form->control('album_id', ['options' => $albums]);
                    echo $this->Form->control('artist_id', ['options' => $artists]);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
