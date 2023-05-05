<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\BuyerSellerUser $buyerSellerUser
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Buyer Seller User'), ['action' => 'edit', $buyerSellerUser->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Buyer Seller User'), ['action' => 'delete', $buyerSellerUser->id], ['confirm' => __('Are you sure you want to delete # {0}?', $buyerSellerUser->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Buyer Seller Users'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Buyer Seller User'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="buyerSellerUsers view content">
            <h3><?= h($buyerSellerUser->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Username') ?></th>
                    <td><?= h($buyerSellerUser->username) ?></td>
                </tr>
                <tr>
                    <th><?= __('Company Name') ?></th>
                    <td><?= h($buyerSellerUser->company_name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Cities') ?></th>
                    <td><?= h($buyerSellerUser->cities) ?></td>
                </tr>
                <tr>
                    <th><?= __('Email') ?></th>
                    <td><?= h($buyerSellerUser->email) ?></td>
                </tr>
                <tr>
                    <th><?= __('Contact') ?></th>
                    <td><?= h($buyerSellerUser->contact) ?></td>
                </tr>
                <tr>
                    <th><?= __('Alt Contact') ?></th>
                    <td><?= h($buyerSellerUser->alt_contact) ?></td>
                </tr>
                <tr>
                    <th><?= __('Business Type') ?></th>
                    <td><?= h($buyerSellerUser->business_type) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($buyerSellerUser->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Is Verified') ?></th>
                    <td><?= (!$buyerSellerUser->is_verified) ? 'No' : 'Yes' ?></td>
                </tr>
                <tr>
                    <th><?= __('Status') ?></th>
                    <td><?= ($buyerSellerUser->status == 0) ? 'new' : 'Active' ?></td>
                </tr>
                <tr>
                    <th><?= __('Added Date') ?></th>
                    <td><?= h($buyerSellerUser->added_date) ?></td>
                </tr>
                <tr>
                    <th><?= __('Updated Date') ?></th>
                    <td><?= h($buyerSellerUser->updated_date) ?></td>
                </tr>
            </table>
            <div class="text">
                <strong><?= __('Address') ?></strong>
                <blockquote>
                    <?= $this->Text->autoParagraph(h($buyerSellerUser->address)); ?>
                </blockquote>
            </div>
        </div>
    </div>
</div>
