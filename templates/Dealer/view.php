<style>
    .form-control {
        margin-left: 14px
    }

    .table tbody td {
        padding: 0.75rem 1.5rem !important;
    }
</style>

<?php ?>


<section id="content">
    <div class="container clearfix">
        <div class="row">
            <!-- <div class="col-3">
                <img src="<?= $this->Url->build('/') ?>webroot/img/sale.jpg" alt="ftspl">
            </div> -->
            <div class="col-12 pl-0">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-15">
                                <table class="table">
                                    <tr>
                                        <th>
                                            <?= __('RFQ No.') ?>
                                        </th>
                                        <td>
                                            <?= h($rfqDetails->rfq_no) ?>
                                            <?php if ($userType == 'buyer'): ?>
                                                <span style="margin-left:20px;">
                                                    <?= $this->Html->link(__('Copy'), ['action' => 'copy-preview', $rfqDetails->rfq_no]) ?>
                                                    <span>
                                                    <?php endif; ?>
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
                                            <?= __('Sub Category') ?>
                                        </th>
                                        <td>
                                            <?= $rfqDetails->has('product_sub_category') ? $rfqDetails->product_sub_category->name : '' ?>
                                        </td>
                                    </tr>

                                    <tr>
                                        <th>
                                            <?= __('Make') ?>
                                        </th>
                                        <td>
                                            <?= $rfqDetails->make ?>
                                        </td>
                                    </tr>

                                    <tr>
                                        <th>
                                            <?= __('Part Name') ?>
                                        </th>
                                        <td>
                                            <?= $rfqDetails->part_name ?>
                                        </td>
                                    </tr>

                                    <tr>
                                        <th>
                                            <?= __('Quantity') ?>
                                        </th>
                                        <td>
                                            <?= $rfqDetails->qty ?>
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
                                    <tr>
                                        <td colspan="2">
                                            <?php if (isset($attrParams[0])): ?>
                                                <div class="col-3" style="align-self: center;">
                                                    <img src="<?= $this->Url->build('/') . $attrParams[0] ?>"
                                                        style="width:100%;" />
                                                </div>
                                            <?php endif; ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <?php if ($userType == 'buyer'): ?>
                                            <table class="table" id="response_table" class="display nowrap"
                                                style="width:100%">
                                                <thead>
                                                    <tr>
                                                        <th>RFQ No.</th>
                                                        <th>Category</th>
                                                        <th>Company</th>
                                                        <th>Quantity</th>
                                                        <th>Rate</th>
                                                        <th>Amount</th>
                                                        <th>Delivery Date</th>
                                                        <th>respond Date</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php foreach ($results as $key => $val): ?>

                                                        <tr>
                                                            <td>
                                                                <?= $rfqDetails->rfq_no ?>
                                                            </td>
                                                            <td>
                                                                <?= $rfqDetails->has('product') ? $rfqDetails->product->name : '' ?>
                                                            </td>

                                                            <td>
                                                                <?= $val['buyer_seller_user']->company_name ?>
                                                            </td>
                                                            <td>
                                                                <?= $val['qty'] ?>
                                                            </td>
                                                            <td>
                                                                <?= $val['rate'] ?>
                                                            </td>
                                                            <td>
                                                                <?= $val['sub_total'] ?>
                                                            </td>
                                                            <td>
                                                                <?= $val['delivery_date'] ?>
                                                            </td>
                                                            <td>
                                                                <?= $val['created_date'] ?>
                                                            </td>
                                                        </tr>

                                                    <?php endforeach; ?>
                                                </tbody>

                                            </table>
                                        <?php endif; ?>
                                    </tr>
                                </table>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php if ($userType == 'seller'): ?>

            <?php if ($rfq_inquiry): ?>

                <table class="table">
                    <tr>
                        <th>Quantity</th>
                        <th>Rate</th>
                        <th>Total Amount</th>
                        <th>Delivery Date</th>
                        <th>respond Date</th>
                    </tr>

                    <tr>
                        <td>
                            <?= $rfq_inquiry->qty ?>
                        </td>
                        <td>
                            <?= $rfq_inquiry->rate ?>
                        </td>
                        <td>
                            <?= $rfq_inquiry->sub_total ?>
                        </td>
                        <td>
                            <?= $rfq_inquiry->delivery_date ?>
                        </td>
                        <td>
                            <?= $rfq_inquiry->created_date ?>
                        </td>
                    </tr>

                </table>

            <?php else: ?>
                <div class="col-5 pl-0">
                    <div class="card">
                        <div class="card-body">
                            <?= $this->Form->create(null, ['url' => ['controller' => 'dealer', 'action' => 'inquiry', $rfqDetails->id]]); ?>
                            <table>
                                <tr>
                                    <th>Quantity</th>
                                    <td><input type="text" class="form-control check_qty" id="qty" name="qty" required /></td>
                                </tr>
                                <tr>
                                    <th>Rate</th>
                                    <td><input type="text" class="form-control check_qty" id="rate" name="rate" required /></td>
                                </tr>
                                <tr>
                                    <th>Total Value</th>
                                    <td><input type="text" class="form-control" name="sub_total" id="sub_total" value="0"
                                            readonly required /></td>
                                </tr>
                                <tr>
                                    <th>Delivery Date</th>
                                    <td><input type="date" class="form-control" name="delivery_date" required /></td>
                                </tr>
                                <tr>

                                    <td colspan="2">
                                        <?= $this->Form->button(__('Save'), ['label' => 'Save', 'class' => 'mt-3 btn btn-danger w-100']); ?>
                                    </td>
                                </tr>
                            </table>
                            <?= $this->Form->end() ?>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
        <?php endif; ?>
    </div>
</section>

<script>

    $(document).ready(function () {

        $("#response_table").DataTable({
            "responsive": true, "lengthChange": false, "autoWidth": false,
            "buttons": [{ "extend": "excel", "title": "Rfq Responded List" }, { "extend": "pdf", "title": "Rfq Responded List" }]
        }).buttons().container().appendTo('#response_table_wrapper .col-md-6:eq(0)');


    });



    $(document).on('keyup', '.check_qty', function () {
        var qty = $("#qty").val();
        var rate = $("#rate").val();

        $("#sub_total").val(qty * rate);

    });
</script>