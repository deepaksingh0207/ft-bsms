<?php ?>
<section id="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-5">
                <div class="card">
                    <div class="card-body">
                        <table class="table">
                            <tr>
                                <th>
                                    <?= __('RFQ No.') ?>
                                </th>
                                <td>
                                    <?= h($rfqDetails->rfq_no) ?>
                                    <span style="margin-left:20px;">
                                        <span>
                                </td>
                            </tr>

                            <tr>
                                <th>
                                    <?= __('Product Category') ?>
                                </th>
                                <td>
                                    <?= $rfqDetails->has('product') ? $rfqDetails->product->name : '' ?>
                                </td>
                            </tr>

                            <tr>
                                <th>
                                    <?= __('Make') ?>
                                </th>
                                <td>
                                    <?= $rfqDetails->make?>
                                </td>
                            </tr>

                            <tr>
                                <th>
                                    <?= __('Part Name') ?>
                                </th>
                                <td>
                                    <?= $rfqDetails->part_name?>
                                </td>
                            </tr>

                            <tr>
                                <th>
                                    <?= __('Quantity') ?>
                                </th>
                                <td>
                                    <?= $rfqDetails->qty?>
                                </td>
                            </tr>

                            <tr>
                                <th>
                                    <?= __('UOM') ?>
                                </th>
                                <td>
                                    <?= $rfqDetails->has('uom') ? $rfqDetails->uom->description : '' ?>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
            <?php if($isResponded == 'no') : ?>
            <div class="col-8">
                <div class="card">
                    <div class="card-body">
                        
                        <div class="row">
                            <div class="col-12">
                                <?= $this->Form->create(null, ['url' => ['controller' => 'rfq-inquiries','action' => 'inquiry',$rfqDetails->id]]); ?>
                                <div class="row">
                                    <div class="col-4">
                                        <?php echo $this->Form->control('qty', array( 'label'=> 'Quantity','type' => 'number', 'class' => 'form-control rounded-0','div' => 'form-group', 'required' => 'required')); ?>
                                    </div>
                                    <div class="col-4">
                                        <?php echo $this->Form->control('rate', array('maxlength' => '3','type' => 'number', 'class' => 'form-control rounded-0','div' => 'form-group', 'required' => 'required')); ?>
                                    </div>
                                    <div class="col-4">
                                        <?php echo $this->Form->control('delivery_date', array('type' => 'date', 'class' => 'form-control rounded-0','div' => 'form-group', 'required' => 'required')); ?>
                                    </div>
                                </div>
                                <?= $this->Form->button(__('Save'), [
                                            'label' => 'Save',
                                            'class' => 'mt-3 mb-0 btn btn-danger float-right',
                                        ]); ?>
                                <?= $this->Form->end() ?>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
            <?php endif; ?>
        </div>
</section>