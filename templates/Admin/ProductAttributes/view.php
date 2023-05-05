<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ProductAttribute $productAttribute
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Product Attribute'), ['action' => 'edit', $productAttribute->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Product Attribute'), ['action' => 'delete', $productAttribute->id], ['confirm' => __('Are you sure you want to delete # {0}?', $productAttribute->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Product Attributes'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Product Attribute'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="productAttributes view content">
            <h3><?= h($productAttribute->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Product') ?></th>
                    <td><?= $productAttribute->has('product') ? $this->Html->link($productAttribute->product->name, ['controller' => 'Products', 'action' => 'view', $productAttribute->product->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Product Sub Category') ?></th>
                    <td><?= $productAttribute->has('product_sub_category') ? $this->Html->link($productAttribute->product_sub_category->name, ['controller' => 'ProductSubCategories', 'action' => 'view', $productAttribute->product_sub_category->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Attribute') ?></th>
                    <td><?= h($productAttribute->attribute) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($productAttribute->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Status') ?></th>
                    <td><?= $this->Number->format($productAttribute->status) ?></td>
                </tr>
                <tr>
                    <th><?= __('Added Date') ?></th>
                    <td><?= h($productAttribute->added_date) ?></td>
                </tr>
                <tr>
                    <th><?= __('Updated Date') ?></th>
                    <td><?= h($productAttribute->updated_date) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
