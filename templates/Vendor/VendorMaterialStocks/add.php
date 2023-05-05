<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\VendorMaterialStock $vendorMaterialStock
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Vendor Material Stocks'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="vendorMaterialStocks form content">
            <?= $this->Form->create($vendorMaterialStock) ?>
            <fieldset>
                <legend><?= __('Add Vendor Material Stock') ?></legend>
                <?php
                    echo $this->Form->control('sap_vendor_code');
                    echo $this->Form->control('material');
                    echo $this->Form->control('part_code');
                    echo $this->Form->control('material_desc');
                    echo $this->Form->control('current_stock');
                    echo $this->Form->control('production_stock');
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
