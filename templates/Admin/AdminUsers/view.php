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
            <?= $this->Html->link(__('Edit Admin User'), ['action' => 'edit', $adminUser->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Admin User'), ['action' => 'delete', $adminUser->id], ['confirm' => __('Are you sure you want to delete # {0}?', $adminUser->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Admin Users'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Admin User'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="adminUsers view content">
            <h3><?= h($adminUser->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Username') ?></th>
                    <td><?= h($adminUser->username) ?></td>
                </tr>
                <tr>
                    <th><?= __('Email Id') ?></th>
                    <td><?= h($adminUser->email_id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($adminUser->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Last Login') ?></th>
                    <td><?= h($adminUser->last_login) ?></td>
                </tr>
                <tr>
                    <th><?= __('Added Date') ?></th>
                    <td><?= h($adminUser->added_date) ?></td>
                </tr>
                <tr>
                    <th><?= __('Updated Date') ?></th>
                    <td><?= h($adminUser->updated_date) ?></td>
                </tr>
                <tr>
                    <th><?= __('Role') ?></th>
                    <td><?= $adminUser->role ? __('Yes') : __('No'); ?></td>
                </tr>
                <tr>
                    <th><?= __('Status') ?></th>
                    <td><?= $adminUser->status ? __('Yes') : __('No'); ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
