<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\DeliveryDetail $deliveryDetail
 * @var \Cake\Collection\CollectionInterface|string[] $poHeaders
 * @var \Cake\Collection\CollectionInterface|string[] $poFooters
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Delivery Details'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="deliveryDetails form content">
            <?= $this->Form->create($deliveryDetail) ?>
            <fieldset>
                <legend><?= __('Add Delivery Detail') ?></legend>
                <?php
                    echo $this->Form->control('po_header_id', ['options' => $poHeaders]);
                    echo $this->Form->control('po_footer_id', ['options' => $poFooters]);
                    echo $this->Form->control('challan_no');
                    echo $this->Form->control('qty');
                    echo $this->Form->control('eway_bill_no');
                    echo $this->Form->control('einvoice_no');
                    
                    
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
