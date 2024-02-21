<?php
/**
 * @var \App\View\AppView $this
 */
?>

<style>
    .form-container {
        display: flex;
        justify-content: center;
        align-items: center;
    }
    .users {
        width: 25%;
        padding-top: 40px;
        padding-bottom: 40px;
    }

    label { margin-bottom:  1rem !important;}
    input { margin-bottom: 2rem !important;}
    .login-btn {background-color: #004B88 !important; border: 1px solid #004B88 !important;}
    .btn-container { text-align: center !important;}
</style>
<div class="form-container">
    <div class="users form content">
            <?= $this->Flash->render('auth') ?>
            <?= $this->Form->create() ?>
            <fieldset>
                <legend><?= __('Please enter your username and password') ?></legend>
                <label for="username">Username</label>
                <?= $this->Form->text('username', ) ?>
                
                <?= $this->Form->control('password', ) ?>
            </fieldset>
            <div class="btn-container">
            <?= $this->Form->button(__('Login'), ['class' => 'login-btn']); ?>
            </div>

            <?= $this->Form->end() ?>
    </div>
</div>
