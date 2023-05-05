<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\AdminUser $adminUser
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $adminUser->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $adminUser->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Admin Users'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="adminUsers form content">
            <?= $this->Form->create($adminUser) ?>
            <fieldset>
                <legend><?= __('Edit Admin User') ?></legend>
                <?php
                    echo $this->Form->control('username');
                    echo $this->Form->control('password');
                    echo $this->Form->control('email_id');
                    echo $this->Form->control('role');
                    echo $this->Form->control('status');
                    echo $this->Form->control('last_login', ['empty' => true]);
                    echo $this->Form->control('added_date');
                    echo $this->Form->control('updated_date');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
