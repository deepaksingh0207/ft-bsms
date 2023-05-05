<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Product $product
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Product'), ['action' => 'edit', $product->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Product'), ['action' => 'delete', $product->id], ['confirm' => __('Are you sure you want to delete # {0}?', $product->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Products'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Product'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="products view content">
            <h3><?= h($product->name) ?></h3>
            <table>
                <tr>
                    <th><?= __('Name') ?></th>
                    <td><?= h($product->name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Description') ?></th>
                    <td><?= h($product->description) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($product->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Added Date') ?></th>
                    <td><?= h($product->added_date) ?></td>
                </tr>
                <tr>
                    <th><?= __('Updated Date') ?></th>
                    <td><?= h($product->updated_date) ?></td>
                </tr>
                <tr>
                    <th><?= __('Status') ?></th>
                    <td><?= $product->status ? __('Yes') : __('No'); ?></td>
                </tr>
            </table>
            <div class="related">
                <h4><?= __('Related Product Attributes') ?></h4>
                <?php if (!empty($product->product_attributes)) : ?>
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
                        <?php foreach ($product->product_attributes as $productAttributes) : ?>
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
            <div class="related">
                <h4><?= __('Related Product Sub Categories') ?></h4>
                <?php if (!empty($product->product_sub_categories)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Product Id') ?></th>
                            <th><?= __('Name') ?></th>
                            <th><?= __('Description') ?></th>
                            <th><?= __('Status') ?></th>
                            <th><?= __('Added Date') ?></th>
                            <th><?= __('Updated Date') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($product->product_sub_categories as $productSubCategories) : ?>
                        <tr>
                            <td><?= h($productSubCategories->id) ?></td>
                            <td><?= h($productSubCategories->product_id) ?></td>
                            <td><?= h($productSubCategories->name) ?></td>
                            <td><?= h($productSubCategories->description) ?></td>
                            <td><?= h($productSubCategories->status) ?></td>
                            <td><?= h($productSubCategories->added_date) ?></td>
                            <td><?= h($productSubCategories->updated_date) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'ProductSubCategories', 'action' => 'view', $productSubCategories->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'ProductSubCategories', 'action' => 'edit', $productSubCategories->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'ProductSubCategories', 'action' => 'delete', $productSubCategories->id], ['confirm' => __('Are you sure you want to delete # {0}?', $productSubCategories->id)]) ?>
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
