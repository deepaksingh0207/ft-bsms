<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ProductSubCategory $productSubCategory
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Product Sub Category'), ['action' => 'edit', $productSubCategory->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Product Sub Category'), ['action' => 'delete', $productSubCategory->id], ['confirm' => __('Are you sure you want to delete # {0}?', $productSubCategory->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Product Sub Categories'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Product Sub Category'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="productSubCategories view content">
            <h3><?= h($productSubCategory->name) ?></h3>
            <table>
                <tr>
                    <th><?= __('Product') ?></th>
                    <td><?= $productSubCategory->has('product') ? $this->Html->link($productSubCategory->product->name, ['controller' => 'Products', 'action' => 'view', $productSubCategory->product->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Name') ?></th>
                    <td><?= h($productSubCategory->name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Description') ?></th>
                    <td><?= h($productSubCategory->description) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($productSubCategory->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Status') ?></th>
                    <td><?= $this->Number->format($productSubCategory->status) ?></td>
                </tr>
                <tr>
                    <th><?= __('Added Date') ?></th>
                    <td><?= h($productSubCategory->added_date) ?></td>
                </tr>
                <tr>
                    <th><?= __('Updated Date') ?></th>
                    <td><?= h($productSubCategory->updated_date) ?></td>
                </tr>
            </table>
            <div class="related">
                <h4><?= __('Related Product Attributes') ?></h4>
                <?php if (!empty($productSubCategory->product_attributes)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Product Id') ?></th>
                            <th><?= __('Product Sub Category Id') ?></th>
                            <th><?= __('Attribute') ?></th>
                            <th><?= __('Status') ?></th>
                            <th><?= __('Added Date') ?></th>
                            <th><?= __('Updated Date') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($productSubCategory->product_attributes as $productAttributes) : ?>
                        <tr>
                            <td><?= h($productAttributes->id) ?></td>
                            <td><?= h($productAttributes->product_id) ?></td>
                            <td><?= h($productAttributes->product_sub_category_id) ?></td>
                            <td><?= h($productAttributes->attribute) ?></td>
                            <td><?= h($productAttributes->status) ?></td>
                            <td><?= h($productAttributes->added_date) ?></td>
                            <td><?= h($productAttributes->updated_date) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'ProductAttributes', 'action' => 'view', $productAttributes->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'ProductAttributes', 'action' => 'edit', $productAttributes->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'ProductAttributes', 'action' => 'delete', $productAttributes->id], ['confirm' => __('Are you sure you want to delete # {0}?', $productAttributes->id)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
