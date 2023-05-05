<?php
/**
 * @var \App\View\AppView $this
 */
?>
<div class="users form content">
<?= $this->Flash->render('auth') ?>
    <?= $this->Form->create() ?>
    <fieldset>
        <legend><?= __('Please enter your username and password') ?></legend>
        <?= $this->Form->text('username', ) ?>
        
        <?= $this->Form->control('password', ) ?>
    </fieldset>
    <?= $this->Form->button(__('Login')); ?>
    <?= $this->Form->end() ?>
</div>
