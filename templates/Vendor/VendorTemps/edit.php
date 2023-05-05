<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\VendorTemp $vendorTemp
 * @var string[]|\Cake\Collection\CollectionInterface $purchasingOrganizations
 * @var string[]|\Cake\Collection\CollectionInterface $accountGroups
 * @var string[]|\Cake\Collection\CollectionInterface $schemaGroups
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $vendorTemp->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $vendorTemp->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Vendor Temps'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="vendorTemps form content">
            <?= $this->Form->create($vendorTemp) ?>
            <fieldset>
                <legend><?= __('Edit Vendor Temp') ?></legend>
                <?php
                    echo $this->Form->control('purchasing_organization_id', ['options' => $purchasingOrganizations]);
                    echo $this->Form->control('account_group_id', ['options' => $accountGroups]);
                    echo $this->Form->control('schema_group_id', ['options' => $schemaGroups]);
                    echo $this->Form->control('name');
                    echo $this->Form->control('address');
                    echo $this->Form->control('city');
                    echo $this->Form->control('pincode');
                    echo $this->Form->control('mobile');
                    echo $this->Form->control('email_id');
                    echo $this->Form->control('country');
                    echo $this->Form->control('payment_term');
                    echo $this->Form->control('order_currency');
                    echo $this->Form->control('gst_no');
                    echo $this->Form->control('pan_no');
                    echo $this->Form->control('contact_person');
                    echo $this->Form->control('contact_email_id');
                    echo $this->Form->control('contact_mobile');
                    echo $this->Form->control('cin_no');
                    echo $this->Form->control('tan_no');
                    echo $this->Form->control('status');
                    echo $this->Form->control('valid_date');
                    echo $this->Form->control('buyer_id');
                    echo $this->Form->control('added_date');
                    echo $this->Form->control('updated_date');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
