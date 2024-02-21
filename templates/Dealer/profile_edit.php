<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h1 class="mb-0">Profile</h1>
            </div>
            <div class="card-body">
                <div class="col-3 mt-3">
                    <?= $this->Form->control('user_type', [
                        'type' => 'select',
                        'options' => $option,
                        'empty' => 'Select',
                        'id' => 'product',
                        'label' => 'User Type',
                        'class' => 'form-control',
                    ]) ?>
                </div>
                <div class="col-3 mt-3">
                    <?= $this->Form->control('username', [
                        'label' => 'Username',
                        'type' => 'text',
                        'class' => 'form-control',
                    ]) ?>
                </div>
                <div class="col-3 mt-3">
                    <?= $this->Form->control('company_name', [
                        'label' => 'Company',
                        'type' => 'text',
                        'class' => 'form-control',
                    ]) ?>
                </div>
                <div class="col-3 mt-3">
                    <?= $this->Form->control('address', [
                        'label' => 'text',
                        'type' => 'text',
                        'class' => 'form-control',
                    ]) ?>
                </div>
                <div class="col-3 mt-3">
                    <?= $this->Form->control('cities', [
                        'label' => 'Cities',
                        'type' => 'text',
                        'class' => 'form-control',
                    ]) ?>
                </div>
                <div class="col-3 mt-3">
                    <?= $this->Form->control('email', [
                        'label' => 'Email',
                        'type' => 'email',
                        'class' => 'form-control',
                    ]) ?>
                </div>
                <div class="col-3 mt-3">
                    <?= $this->Form->control('contact', [
                        'label' => 'Contact',
                        'type' => 'number',
                        'class' => 'form-control',
                    ]) ?>
                </div>
                <div class="col-3 mt-3">
                    <?= $this->Form->control('alt_contact', [
                        'label' => 'Alt. Contact',
                        'type' => 'number',
                        'class' => 'form-control',
                    ]) ?>
                </div>
                <div class="col-3 mt-3">
                    <?= $this->Form->control('business_type', [
                        'label' => 'Business',
                        'type' => 'text',
                        'class' => 'form-control',
                    ]) ?>
                </div>
                <div class="col-3 mt-3">
                    <?= $this->Form->control('product_deals', [
                        'type' => 'select',
                        'options' => $products,
                        'empty' => 'Select',
                        'id' => 'product',
                        'label' => 'Product Deals',
                        'class' => 'form-control',
                    ]) ?>
                </div>
                <div class="col-3 mt-3">
                    <?= $this->Form->control('TIN', [
                        'label' => 'TIN',
                        'type' => 'text',
                        'class' => 'form-control',
                    ]) ?>
                </div>
                <div class="col-3 mt-3">
                    <?= $this->Form->control('GST', [
                        'label' => 'GST',
                        'type' => 'text',
                        'class' => 'form-control',
                    ]) ?>
                </div>
                <div class="col-3 mt-4 pt-4">
                    <?= $this->Form->button(__('Submit'), [
                        'label' => 'Submit',
                        'class' => 'submit_btn btn btn-info',
                    ]); ?>
                </div>
            </div>
        </div>
    </div>
</div>