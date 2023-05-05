<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\VendorTemp $vendorTemp
 * @var \Cake\Collection\CollectionInterface|string[] $purchasingOrganizations
 * @var \Cake\Collection\CollectionInterface|string[] $accountGroups
 * @var \Cake\Collection\CollectionInterface|string[] $schemaGroups
 */
?>
<div class="row">
    
    <div class="column-responsive">
        <div class="vendorTemps form content">
            <?= $this->Form->create($vendorTemp) ?>
            <fieldset>
                <legend><?= __('Add Vendor') ?></legend>
                <?php 
                echo $this->Form->control('purchasing_organization_id', array('class' => 'custom-select rounded-0','div' => 'form-group'));
                echo $this->Form->control('account_group_id', array('class' => 'custom-select rounded-0','div' => 'form-group'));
                echo $this->Form->control('schema_group_id', array('class' => 'custom-select rounded-0','div' => 'form-group'));

                echo $this->Form->control('name', array('class' => 'form-control rounded-0','div' => 'form-group'));
                echo $this->Form->control('mobile', array('class' => 'form-control rounded-0','div' => 'form-group'));
                echo $this->Form->control('email', array('class' => 'form-control rounded-0','div' => 'form-group'));

                echo $this->Form->control('payment_term', array('class' => 'form-control rounded-0','div' => 'form-group'));
                ?>

            </fieldset>
            <?= $this->Form->button(__('Submit'), ['class' => 'btn btn-info']) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
