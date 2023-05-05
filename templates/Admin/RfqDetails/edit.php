<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\RfqDetail $rfqDetail
 * @var string[]|\Cake\Collection\CollectionInterface $buyerSellerUsers
 * @var string[]|\Cake\Collection\CollectionInterface $products
 * @var string[]|\Cake\Collection\CollectionInterface $productSubCategories
 * @var string[]|\Cake\Collection\CollectionInterface $uoms
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $rfqDetail->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $rfqDetail->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Rfq Details'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="rfqDetails form content">
            <?= $this->Form->create($rfqDetail) ?>
            <fieldset>
                <legend><?= __('Edit Rfq Detail') ?></legend>
                <?php
                    echo $this->Form->control('buyer_seller_user_id', ['options' => $buyerSellerUsers]);
                    echo $this->Form->control('rfq_no');
                    echo $this->Form->control('product_id', ['options' => $products]);
                    echo $this->Form->control('product_sub_category_id', ['options' => $productSubCategories, 'empty' => true]);
                    echo $this->Form->control('part_name');
                    echo $this->Form->control('qty');
                    echo $this->Form->control('uom_code', ['options' => $uoms]);
                    echo $this->Form->control('remarks');
                    echo $this->Form->control('make');
                    echo $this->Form->control('uploaded_files');
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
