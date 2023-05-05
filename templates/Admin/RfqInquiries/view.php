<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\RfqInquiry $rfqInquiry
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Rfq Inquiry'), ['action' => 'edit', $rfqInquiry->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Rfq Inquiry'), ['action' => 'delete', $rfqInquiry->id], ['confirm' => __('Are you sure you want to delete # {0}?', $rfqInquiry->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Rfq Inquiries'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Rfq Inquiry'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="rfqInquiries view content">
            <h3><?= h($rfqInquiry->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Buyer Seller User') ?></th>
                    <td><?= $rfqInquiry->has('buyer_seller_user') ? $this->Html->link($rfqInquiry->buyer_seller_user->id, ['controller' => 'BuyerSellerUsers', 'action' => 'view', $rfqInquiry->buyer_seller_user->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Inquiry Data') ?></th>
                    <td><?= h($rfqInquiry->inquiry_data) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($rfqInquiry->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Rfq Id') ?></th>
                    <td><?= $this->Number->format($rfqInquiry->rfq_id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Qty') ?></th>
                    <td><?= $rfqInquiry->qty === null ? '' : $this->Number->format($rfqInquiry->qty) ?></td>
                </tr>
                <tr>
                    <th><?= __('Rate') ?></th>
                    <td><?= $rfqInquiry->rate === null ? '' : $this->Number->format($rfqInquiry->rate) ?></td>
                </tr>
                <tr>
                    <th><?= __('Delivery Date') ?></th>
                    <td><?= h($rfqInquiry->delivery_date) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created Date') ?></th>
                    <td><?= h($rfqInquiry->created_date) ?></td>
                </tr>
                <tr>
                    <th><?= __('Inquiry') ?></th>
                    <td><?= $rfqInquiry->inquiry ? __('Yes') : __('No'); ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
