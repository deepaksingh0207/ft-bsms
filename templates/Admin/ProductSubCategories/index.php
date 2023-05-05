<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ProductSubCategory[]|\Cake\Collection\CollectionInterface $productSubCategories
 */
?>
<div class="productSubCategories index content">
    <?= $this->Html->link(__('New Product Sub Category'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Product Sub Categories') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('product_id') ?></th>
                    <th><?= $this->Paginator->sort('name') ?></th>
                    <th><?= $this->Paginator->sort('description') ?></th>
                    <th><?= $this->Paginator->sort('status') ?></th>
                    <th><?= $this->Paginator->sort('added_date') ?></th>
                    <th><?= $this->Paginator->sort('updated_date') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($productSubCategories as $productSubCategory): ?>
                <tr>
                    <td><?= $this->Number->format($productSubCategory->id) ?></td>
                    <td><?= $productSubCategory->has('product') ? $this->Html->link($productSubCategory->product->name, ['controller' => 'Products', 'action' => 'view', $productSubCategory->product->id]) : '' ?></td>
                    <td><?= h($productSubCategory->name) ?></td>
                    <td><?= h($productSubCategory->description) ?></td>
                    <td><?= $this->Number->format($productSubCategory->status) ?></td>
                    <td><?= h($productSubCategory->added_date) ?></td>
                    <td><?= h($productSubCategory->updated_date) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $productSubCategory->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $productSubCategory->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $productSubCategory->id], ['confirm' => __('Are you sure you want to delete # {0}?', $productSubCategory->id)]) ?>
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
