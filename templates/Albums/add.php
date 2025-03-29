<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Album $album
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Albums'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="albums form content">
            <?= $this->Form->create($album) ?>
            <fieldset>
                <legend><?= __('Add Album') ?></legend>
                <?php
                    echo $this->Form->control('title');
                    echo $this->Form->control('releaseDate');
                    echo $this->Form->control('cover');
                    echo $this->Form->control('artist_id', [
                        'label' => 'Artist',
                        'options' => $artists,
                        'empty' => 'Select an Artist'
                    ]);
                    echo $this->Form->control('spotifyLink');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
