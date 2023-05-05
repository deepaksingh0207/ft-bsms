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
    <div class="column-responsive">
        <div class="vendorTemps form content">
        <legend><?= __('Onboarding') ?></legend>
            <?= $this->Form->create($vendorTemp) ?>
                OTP sent to <?= $vendorTemp->email ?>
                <div class="col-3 mt-3">
                <?php
                    echo $this->Form->control('otp', ['class' => 'form-control','div' => 'form-group' , 'required']);
                ?>
                </div>

            <div class="col-1 mt-1 pt-1">
                <?php echo $this->Form->button('Submit',array('class' => 'button button-rounded button-reveal button-large button-yellow button-light text-end w-100'));?>
            </div>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
