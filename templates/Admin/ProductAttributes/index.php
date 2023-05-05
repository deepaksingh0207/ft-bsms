<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ProductAttribute[]|\Cake\Collection\CollectionInterface $productAttributes
 */
?>
<div class="productAttributes index content">
    <?= $this->Html->link(__('New Product Attribute'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Product Attributes') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('product_id') ?></th>
                    <th><?= $this->Paginator->sort('attribute') ?></th>
                    <th><?= $this->Paginator->sort('added_date') ?></th>
                    <th><?= $this->Paginator->sort('updated_date') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($productAttributes as $productAttribute): ?>
                <tr>
                    <td><?= $productAttribute->has('product') ? $this->Html->link($productAttribute->product->name, ['controller' => 'Products', 'action' => 'view', $productAttribute->product->id]) : '' ?></td>
                    <!-- <td><?= $productAttribute->has('product_sub_category') ? $this->Html->link($productAttribute->product_sub_category->name, ['controller' => 'ProductSubCategories', 'action' => 'view', $productAttribute->product_sub_category->id]) : '' ?></td> -->
                    <td><?= h($productAttribute->attribute) ?></td>
                    <td><?= h($productAttribute->added_date) ?></td>
                    <td><?= h($productAttribute->updated_date) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $productAttribute->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $productAttribute->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $productAttribute->id], ['confirm' => __('Are you sure you want to delete # {0}?', $productAttribute->id)]) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(__('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')) ?></p>
    </div>
</div>
