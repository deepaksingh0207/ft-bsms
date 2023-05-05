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
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Vendor Temps'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="vendorTemps form content">
            <?= $this->Form->create($vendorTemp) ?>
            <fieldset>
                <legend><?= __('Add Vendor') ?></legend>
                <?php
                    echo $this->Form->control('purchasing_organization_id', ['options' => $purchasingOrganizations]);
                    echo $this->Form->control('account_group_id', ['options' => $accountGroups]);
                    echo $this->Form->control('schema_group_id', ['options' => $schemaGroups]);
                    echo $this->Form->control('name');
                    echo $this->Form->control('mobile');
                    echo $this->Form->control('email');
                    echo $this->Form->control('payment_term');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
