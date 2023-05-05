<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\RfqInquiry $rfqInquiry
 * @var string[]|\Cake\Collection\CollectionInterface $buyerSellerUsers
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $rfqInquiry->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $rfqInquiry->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Rfq Inquiries'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="rfqInquiries form content">
            <?= $this->Form->create($rfqInquiry) ?>
            <fieldset>
                <legend><?= __('Edit Rfq Inquiry') ?></legend>
                <?php
                    echo $this->Form->control('rfq_id');
                    echo $this->Form->control('seller_id', ['options' => $buyerSellerUsers]);
                    echo $this->Form->control('qty');
                    echo $this->Form->control('rate');
                    echo $this->Form->control('delivery_date', ['empty' => true]);
                    echo $this->Form->control('inquiry_data');
                    echo $this->Form->control('inquiry');
                    echo $this->Form->control('created_date');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
