<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\RfqDetail $rfqDetail
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Rfq Detail'), ['action' => 'edit', $rfqDetail->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Rfq Detail'), ['action' => 'delete', $rfqDetail->id], ['confirm' => __('Are you sure you want to delete # {0}?', $rfqDetail->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Rfq Details'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Rfq Detail'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="rfqDetails view content">
            <h3><?= h($rfqDetail->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Buyer Seller User') ?></th>
                    <td><?= $rfqDetail->has('buyer_seller_user') ? $this->Html->link($rfqDetail->buyer_seller_user->company_name, ['controller' => 'BuyerSellerUsers', 'action' => 'view', $rfqDetail->buyer_seller_user->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Product') ?></th>
                    <td><?= $rfqDetail->has('product') ? $this->Html->link($rfqDetail->product->name, ['controller' => 'Products', 'action' => 'view', $rfqDetail->product->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Product Sub Category') ?></th>
                    <td><?= $rfqDetail->has('product_sub_category') ? $this->Html->link($rfqDetail->product_sub_category->name, ['controller' => 'ProductSubCategories', 'action' => 'view', $rfqDetail->product_sub_category->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Part Name') ?></th>
                    <td><?= h($rfqDetail->part_name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Uom') ?></th>
                    <td><?= $rfqDetail->has('uom') ? $this->Html->link($rfqDetail->uom->description, ['controller' => 'Uoms', 'action' => 'view', $rfqDetail->uom->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Remarks') ?></th>
                    <td><?= h($rfqDetail->remarks) ?></td>
                </tr>
                <tr>
                    <th><?= __('Make') ?></th>
                    <td><?= h($rfqDetail->make) ?></td>
                </tr>
                <tr>
                    <th><?= __('Uploaded Files') ?></th>
                    <td><?= h($rfqDetail->uploaded_files) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($rfqDetail->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Rfq No') ?></th>
                    <td><?= $this->Number->format($rfqDetail->rfq_no) ?></td>
                </tr>
                <tr>
                    <th><?= __('Qty') ?></th>
                    <td><?= $this->Number->format($rfqDetail->qty) ?></td>
                </tr>
                <tr>
                    <th><?= __('Added Date') ?></th>
                    <td><?= h($rfqDetail->added_date) ?></td>
                </tr>
                <tr>
                    <th><?= __('Updated Date') ?></th>
                    <td><?= h($rfqDetail->updated_date) ?></td>
                </tr>
                <tr>
                    <th><?= __('Status') ?></th>
                    <td><?= $rfqDetail->status ? __('Yes') : __('No'); ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
