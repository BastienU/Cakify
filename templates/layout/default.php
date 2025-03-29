<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 * @var \App\View\AppView $this
 */

$cakeDescription = 'CakePHP: the rapid development php framework';
?>
<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>
        <?= $cakeDescription ?>:
        <?= $this->fetch('title') ?>
    </title>
    <?= $this->Html->meta('icon') ?>

    <?= $this->Html->css(['normalize.min', 'milligram.min', 'fonts', 'cake']) ?>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
</head>
<body>
    <nav class="top-nav">
        <div class="top-nav-title">
            <a href="<?= $this->Url->build('/') ?>"><span>Cake</span>PHP</a>
        </div>
        <div class="top-nav-links">
            <?= $this->Html->link('Artistes', ['controller' => 'Artists', 'action' => 'index']); ?>
            <?= $this->Html->link('Albums', ['controller' => 'Albums', 'action' => 'index']); ?>
            <?= $this->Html->link('Musiques', ['controller' => 'Tracks', 'action' => 'index']); ?>
            <?= $this->Html->link('Requêtes', ['controller' => 'Requests', 'action' => 'index']); ?>

            <?php if ($this->Identity->get('role_id') !== null && $this->Identity->get('data')['role_id'] === 2): ?>
                <?= $this->Html->link('Favoris', ['controller' => 'Favorites', 'action' => 'index']); ?>
                <?= $this->Html->link('Suivis', ['controller' => 'Follows', 'action' => 'index']); ?>
            <?php endif; ?>

            <?php if ($this->Identity->get('role_id') !== null && $this->Identity->get('data')['role_id'] === 1): ?>
                <?= $this->Html->link('Statistiques', ['controller' => 'Statistics', 'action' => 'index']); ?>
            <?php endif; ?>


            <?php if (empty($this->request->getAttribute('identity'))): ?>
                <?= $this->Html->link('Créer un compte', ['controller' => 'Users', 'action' => 'add']); ?>
                <?= $this->Html->link('Se connecter', ['controller' => 'Users', 'action' => 'login']); ?>
            
            <?php else: ?>
                <?= $this->Html->link('Se déconnecter', ['controller' => 'Users', 'action' => 'logout']); ?>
            <?php endif; ?>

        </div>
    </nav>
    <main class="main">
        <div class="container">
            <?= $this->Flash->render() ?>
            <?= $this->fetch('content') ?>
        </div>
    </main>
    <footer>
    </footer>
</body>
</html>
