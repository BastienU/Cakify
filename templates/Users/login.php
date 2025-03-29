<h2>Connexion</h2>

<?= $this->Form->create() ?>

    <?= $this->Form->control('username') ?>
    <?= $this->Form->control('password') ?>

    <?= $this->Form->button(__('Se connecter')) ?>

<?= $this->Form->end() ?>