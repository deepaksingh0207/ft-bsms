<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\DeliveryDetail $deliveryDetail
 * @var string[]|\Cake\Collection\CollectionInterface $poHeaders
 * @var string[]|\Cake\Collection\CollectionInterface $poFooters
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $deliveryDetail->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $deliveryDetail->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Delivery Details'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="deliveryDetails form content">
            <?= $this->Form->create($deliveryDetail) ?>
            <fieldset>
                <legend><?= __('Edit Delivery Detail') ?></legend>
                <?php
                    echo $this->Form->control('po_header_id', ['options' => $poHeaders]);
                    echo $this->Form->control('po_footer_id', ['options' => $poFooters]);
                    echo $this->Form->control('challan_no');
                    echo $this->Form->control('qty');
                    echo $this->Form->control('eway_bill_no');
                    echo $this->Form->control('einvoice_no');
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
