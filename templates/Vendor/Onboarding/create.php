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
    <div class="column-responsive column-80">
        <div class="vendorTemps form content">
        <legend><?= __('Onboarding') ?></legend>

        <div class="card">
						<div class="card-body">
            <?= $this->Form->create($vendorTemp) ?>
            <div class="row">
            
                <div class="col-3 mt-3">
                    <?php echo $this->Form->control('purchasing_organization_id', ['disabled' =>'disabled','options' => $purchasingOrganizations, 'class' => 'form-control']);?>
                </div>

                <div class="col-3 mt-3">
                    <?php echo $this->Form->control('account_group_id', ['disabled' =>'disabled', 'options' => $accountGroups, 'class' => 'form-control']);?>
                </div>

                <div class="col-3 mt-3">
                    <?php echo $this->Form->control('schema_group_id', ['disabled' =>'disabled', 'options' => $schemaGroups, 'class' => 'form-control']); ?>
                </div>
            </div>
            <div class="row">
                <div class="col-3 mt-3">
                    <?php  echo $this->Form->control('name',['disabled' =>'disabled', 'class' => 'form-control']);?>
                </div>

                <div class="col-3 mt-3">
                    <?php  echo $this->Form->control('mobile', ['disabled' =>'disabled', 'class' => 'form-control']); ?>
                </div>

                <div class="col-3 mt-3">
                    <?php  echo $this->Form->control('email', ['disabled' =>'disabled', 'class' => 'form-control']); ?>
                </div>

            </div>
            <div class="row">
                <div class="col-3 mt-3">
                    <?php  echo $this->Form->control('address',['class' => 'form-control']);?>
                </div>

                <div class="col-3 mt-3">
                    <?php  echo $this->Form->control('city',['class' => 'form-control']); ?>
                </div>

                <div class="col-3 mt-3">
                    <?php  echo $this->Form->control('pincode',['class' => 'form-control']); ?>
                </div>

                <div class="col-3 mt-3">
                    <?php  echo $this->Form->control('country', ['class' => 'form-control']); ?>
                </div>
            </div>

            <div class="row">
                <div class="col-3 mt-3">
                    <?php  echo $this->Form->control('payment_term', ['disabled' =>'disabled', 'class' => 'form-control']);?>
                </div>

                <div class="col-3 mt-3">
                    <?php  echo $this->Form->control('order_currency', ['disabled' =>'disabled','class' => 'form-control']); ?>
                </div>

                <div class="col-3 mt-3">
                    <?php  echo $this->Form->control('gst_no', ['class' => 'form-control']); ?>
                </div>

                <div class="col-3 mt-3">
                    <?php  echo $this->Form->control('pan_no', ['class' => 'form-control']); ?>
                </div>

                <div class="col-3 mt-3">
                    <?php  echo $this->Form->control('tan_no',['class' => 'form-control']); ?>
                </div>

                <div class="col-3 mt-3">
                    <?php  echo $this->Form->control('cin_no',['class' => 'form-control']); ?>
                </div>
            </div>

            <div class="row">
                <div class="col-3 mt-3">
                    <?php  echo $this->Form->control('contact_person',['class' => 'form-control']);?>
                </div>

                <div class="col-3 mt-3">
                    <?php  echo $this->Form->control('contact_email',['class' => 'form-control']); ?>
                </div>

                <div class="col-3 mt-3">
                    <?php  echo $this->Form->control('contact_mobile',['class' => 'form-control']); ?>
                </div>
            </div>
            </div>
					</div>
                    <div class="col-1 mt-1 pt-1">
                <?php echo $this->Form->button('Submit',array('class' => 'button button-rounded button-reveal button-large button-yellow button-light text-end w-100'));?>
            </div>
            
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
