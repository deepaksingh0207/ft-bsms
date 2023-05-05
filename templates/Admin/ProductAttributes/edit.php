<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ProductAttribute $productAttribute
 * @var string[]|\Cake\Collection\CollectionInterface $products
 * @var string[]|\Cake\Collection\CollectionInterface $productSubCategories
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $productAttribute->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $productAttribute->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Product Attributes'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="productAttributes form content">
            <?= $this->Form->create($productAttribute) ?>
            <fieldset>
                <legend><?= __('Edit Product Attribute') ?></legend>
                <?php
                    echo $this->Form->control('product_id', ['options' => $products]);
                    echo $this->Form->control('product_sub_category_id', ['options' => $productSubCategories]);
                    echo $this->Form->control('attribute');
                    echo $this->Form->control('status');
                    echo $this->Form->control('added_date');
                    echo $this->Form->control('updated_date');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
