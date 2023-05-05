<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\DeliveryDetail $deliveryDetail
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Delivery Detail'), ['action' => 'edit', $deliveryDetail->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Delivery Detail'), ['action' => 'delete', $deliveryDetail->id], ['confirm' => __('Are you sure you want to delete # {0}?', $deliveryDetail->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Delivery Details'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Delivery Detail'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="deliveryDetails view content">
            <h3><?= h($deliveryDetail->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Po Header') ?></th>
                    <td><?= $deliveryDetail->has('po_header') ? $this->Html->link($deliveryDetail->po_header->id, ['controller' => 'PoHeaders', 'action' => 'view', $deliveryDetail->po_header->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Po Footer') ?></th>
                    <td><?= $deliveryDetail->has('po_footer') ? $this->Html->link($deliveryDetail->po_footer->id, ['controller' => 'PoFooters', 'action' => 'view', $deliveryDetail->po_footer->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Challan No') ?></th>
                    <td><?= h($deliveryDetail->challan_no) ?></td>
                </tr>
                <tr>
                    <th><?= __('Eway Bill No') ?></th>
                    <td><?= h($deliveryDetail->eway_bill_no) ?></td>
                </tr>
                <tr>
                    <th><?= __('Einvoice No') ?></th>
                    <td><?= h($deliveryDetail->einvoice_no) ?></td>
                </tr>
                <tr>
                    <th><?= __('Status') ?></th>
                    <td><?= h($deliveryDetail->status) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($deliveryDetail->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Qty') ?></th>
                    <td><?= $this->Number->format($deliveryDetail->qty) ?></td>
                </tr>
                <tr>
                    <th><?= __('Added Date') ?></th>
                    <td><?= h($deliveryDetail->added_date) ?></td>
                </tr>
                <tr>
                    <th><?= __('Updated Date') ?></th>
                    <td><?= h($deliveryDetail->updated_date) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
