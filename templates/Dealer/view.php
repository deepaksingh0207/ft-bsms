<!-- SweetAlert2 CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@10.16.6/dist/sweetalert2.min.css">

<!-- SweetAlert2 JS -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.16.6/dist/sweetalert2.min.js"></script>

<style>
    .form-control {
        margin-left: 14px
    }

    .table tbody td {
        padding: 0.75rem 1.5rem !important;
    }

    #compareModal table tr>* { display: block !important;} 
    #compareModal table tr {
        display: table-cell !important;
        vertical-align: top !important;
    }
    .sub_total { background-color: #FFF843 !important;}

    button,.btn-primary { background-color: #004B88 !important;}

    .table th, .table td { border-top: 1px solid #f4f4f4 !important;}
    .table th,h3 { color: #004B88 !important;}
    .btn-secondary {background-color: #004B88 !important;}
    ..btn-secondary:hover { background-color: #fff !important; color: #004B88 !important; border: 1px solid #004B88 !important; box-shadow: none !important;}
    .btn-secondary:hover, .btn.bg-gradient-secondary:hover { box-shadow: none !important;}
    .btn { margin-bottom: 0 !important;}
    .compare {
        background-color: #004B88 !important;
        color: #fff !important;
        border: none !important;
        border-radius: 4px;
        padding: .375rem .75rem !important;
        margin-bottom: 10px;
        position: absolute;
        left: 14%;
        z-index: 2;
    }
    #compareModal .table tbody td { padding: 0.75rem !important;}
    #compareModal .modal-dialog { max-width: 800px !important;}
    #compareModal table th, #compareModal table td,#compareModal .table tbody td{
        padding-top: .50rem !important;
        padding-bottom: .50rem !important;
    }

</style>

<?php ?>


<section id="content">
    <div class="clearfix">
        <div class="row">
            <!-- <div class="col-3">
                <img src="<?= $this->Url->build('/') ?>webroot/img/sale.jpg" alt="ftspl">
            </div> -->
            <div class="col-12">
                <div class="card mb-0">
                <div class="card-header"><h3 class="mb-0">RFQ View</h3></div>
                    <div class="card-body pt-0">
                        <div class="row">
                            <div class="pl-0">
                                <!-- <table class="table"> -->
                                <table class="mt-2 table table-bordered" id="rfqDetailsTable">
                                    <thead>
                                        <tr>
                                            <th class="w-25"><?= __('RFQ No.') ?>
                                            </th>
                                            <th>
                                                <?= __('Product Category') ?>
                                            </th>
                                            <th>
                                                <?= __('Sub Category') ?>
                                            </th>
                                            <th>
                                                <?= __('Make') ?>
                                            </th>
                                            <th>
                                                <?= __('Part Name') ?>
                                            </th>
                                            <th>
                                                <?= __('Quantity') ?>
                                            </th>
                                            <th>
                                                <?= __('UOM') ?>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>
                                                <?= h($rfqDetails->rfq_no) ?>
                                                <?php if ($userType == 'buyer'): ?>
                                                    <span class="ml-2">
                                                        <?= $this->Html->link(__('Copy'), ['action' => 'copy-preview', $rfqDetails->rfq_no], ['class' => 'btn btn-primary btn-sm']) ?>
                                                    </span>
                                                <?php endif; ?>
                                            </td>
                                            <td>
                                                <?= $rfqDetails->has('product') ? $rfqDetails->product->name : '' ?>
                                            </td>
                                            <td>
                                                <?= $rfqDetails->has('product_sub_category') ? $rfqDetails->product_sub_category->name : '' ?>
                                            </td>
                                            <td>
                                                <?= $rfqDetails->make ?>
                                            </td>
                                            <td>
                                                <?= $rfqDetails->part_name ?>
                                            </td>
                                            <td>
                                                <?= $rfqDetails->qty ?>
                                            </td>
                                            <td>
                                                <?= $rfqDetails->has('uom') ? $rfqDetails->uom->description : '' ?>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                    <!-- <tr> -->
                                        <!-- <td colspan="2" style="padding-left:0 !important; "> -->
                                            <?php if (isset($attrParams[0])): ?>
                                                <div class="col-3" style="align-self: center;">
                                                    <img src="<?= $this->Url->build('/') . $attrParams[0] ?>"
                                                        style="width:100%;" />
                                                </div>
                                            <?php endif; ?>
                                        <!-- </td>
                                    </tr> -->
                                    <!-- <tr> -->
                                        
                                        
                                    <!-- </tr> -->
                                <!-- </table> -->
                            </div>

                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12 mt-2">
                <div class="card">
                    <?php if ($userType == 'buyer'): ?>
                    <div class="card-body" id="buyer_table">
                    <button class="compare" id="compareButton" data-toggle="modal" data-target="#compareModal" disabled>Compare</button>

                            <div class="">
                                <table class="table-responsive table table-bordered" id="response_table" class="display nowrap" style="width:100%">
                                <thead>
                                    <tr>
                                        <th><input type="checkbox" id="selectAllCheckbox"></th>
                                        <th>RFQ No.</th>
                                        <th>Category</th>
                                        <th>Company</th>
                                        <th>Quantity</th>
                                        <th>Rate</th>
                                        <th>Amount</th>
                                        <th>Delivery Date</th>
                                        <th>respond Date</th>
                                        <th>Discount</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($results as $key => $val): ?>
                            
                                            <tr>
                                                <td>
                                                <input type="checkbox" name="compareCheckbox[]" value="<?= $val['unique_identifier'] ?>">
                                                </td>
                                                <td>
                                                    <?= $rfqDetails->rfq_no ?>
                                                </td>
                                                <td>
                                                    <?= $rfqDetails->has('product') ? $rfqDetails->product->name : '' ?>
                                                </td>
                            
                                                <td>
                                                    <?= $val['BuyerSellerUsers']['company_name'] ?>
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
                                                <td>
                                                    <?= $val['discount'] ?>
                                                </td>
                                            </tr>
                            
                                        <?php endforeach; ?>
                                    </tbody>
                            
                                </table>
                            </div>
                            <!-- Modal -->
                            <div class="modal fade" id="compareModal" tabindex="-1" role="dialog" aria-labelledby="compareModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="compareModalLabel">Comparison Sheet</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                        <div class="modal-body">
                                            <table class="table table-bordered">
                                                <thead>
                                                </thead>
                                                <tbody id="modalTableBody">
                            
                                                </tbody>
                                            </table>
                                            <textarea style="display:none" id="remark" name="myTextarea" rows="2" cols="90" placeholder="Add Remark"></textarea>
                                            

                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="continue_btn btn btn-secondary" disabled>Continue</button>
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        
                    </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        <?php if ($userType == 'seller'): ?>
            <div class="card">

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
                    <div class="card-header d-flex justify-content-between ">
                        <!-- <label for="fileInput"></label> -->
                        <?= $this->Form->create(null, ['url' => ['controller' => 'dealer', 'action' => 'inquiry', $rfqDetails->id], 'type' => 'file']); ?>
                        <?= $this->Form->file('fileInput', ['id' => 'fileInput', 'accept' => '.xlsx, .xls', 'class' => 'form-control-file']); ?>
                        <?= $this->Form->button('Upload Excel', ['class' => 'btn btn-primary mt-2']); ?>
                        <?= $this->Form->end(); ?>
                    </div>
                        <div class="card-body d-flex justify-content-between align-items-center">
                            <div class="col-12">
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
                                    <th>Discount</th>
                                    <td><input type="text" class="form-control" id="discount" name="discount" required /></td>
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
                </div>
            <?php endif; ?>
            </div>
        <?php endif; ?>
    </div>
</section>

<script>

    $(document).ready(function () {

        $("#response_table").DataTable({
            "responsive": false, "lengthChange": false, "autoWidth": false,
            "buttons": [{ "extend": "excel", "title": "Rfq Responded List" }, { "extend": "pdf", "title": "Rfq Responded List" }]
        }).buttons().container().appendTo('#response_table_wrapper .col-md-6:eq(0)');


    });



    $(document).on('keyup', '.check_qty', function () {
        var qty = $("#qty").val();
        var rate = $("#rate").val();

        $("#sub_total").val(qty * rate);

    });
</script>
<script>
    $(document).ready(function () {
        $('input[name="compareCheckbox[]"]').on('change', function () {
            updateCompareButton();
        });

        $('#selectAllCheckbox').on('change', function () {
            $('input[name="compareCheckbox[]"]').prop('checked', $(this).prop('checked'));
            updateCompareButton();
        });

        $('#compareButton').on('click', function () {
            updateModalContent();
        });

        function updateCompareButton() {
            var enableButton = $('input[name="compareCheckbox[]"]:checked').length > 0;
            $('#compareButton').prop('disabled', !enableButton);
        }

        function updateModalContent() {
            // Clear the existing content
            $('#modalTableBody').empty();

            // Append the header row
            $('#modalTableBody').append(`
                <tr>
                    <th>Company</th>
                    <th>Location</th>
                    <th>Qty</th>
                    <th>Offered Rate</th>
                    <th>Amt</th>
                    <th>Discount(Per Qty)</th>
                    <th class="sub_total">Sub Total-A</th>
                    <br><br>
                    <th>Packing and Forwarding</th>
                    <th>GST @ 18%</th>
                    <th>FREIGHT CHARGES</th>
                    <th>Delivery</th>
                    <th class="sub_total">Sub Total-B</th>
                    <th>Select Vendor</th>
                </tr>
            `);

            // Loop through each checked checkbox and add the corresponding columns to the modal
            $('input[name="compareCheckbox[]"]:checked').each(function () {
                var row = $(this).closest('tr');
                var company = row.find('td:eq(3)').text();
                var qty = row.find('td:eq(4)').text();
                var rate = row.find('td:eq(5)').text();
                var amt = row.find('td:eq(6)').text();
                var discount = row.find('td:eq(9)').text();
                var calculatedAmt = parseFloat(amt) - (parseFloat(discount) * parseFloat(qty));

                $('#modalTableBody').append(`
                    <tr>
                        <td>${company}</td>
                        <td>Thane</td>
                        <td>${qty}</td>
                        <td>${rate}</td>
                        <td>${amt}</td>
                        <td>${discount}</td>
                        <td class="sub_total">${calculatedAmt}</td>
                        <br><br>
                        <td>0.00</td>
                        <td>1620.00</td>
                        <td>0.00</td>
                        <td>1 Week</td>
                        <td class="sub_total">10160</td> 
                        <td><input type="checkbox">
                    </tr>
                `);
            });

            // Show the modal
            $('#compareModal').modal('show');
        }

        $('#compareModal').on('change', 'input[type="checkbox"]', function () {
        // Uncheck all other checkboxes
        $('input[type="checkbox"]').not(this).prop('checked', false);

        // Show/hide the textarea based on checkbox state
        if ($(this).prop('checked')) {
            $('#remark').show();
        } else {
            $('#remark').hide();
        }

        // Enable/disable the "Continue" button based on textarea content
        updateContinueButtonState();
    });

    // Event handler for textarea input
    $('#remark').on('input', function () {
        // Enable/disable the "Continue" button based on textarea content
        updateContinueButtonState();
    });

    // Event handler for the "Continue" button
    $('.continue_btn').on('click', function () {
        // Close the modal
        $('#compareModal').modal('hide');
        // Display a toast message
        showToast('Vendor selected by Buyer1!');
    });

    // Function to enable/disable the "Continue" button based on textarea content
    function updateContinueButtonState() {
        var isTextareaFilled = $('#remark').val().trim().length > 0;

        // Enable/disable the "Continue" button based on textarea content
        $('.continue_btn').prop('disabled', !isTextareaFilled);
    }

    // Function to display a toast message
    function showToast(message) {
        Swal.fire({
            icon: 'success',
            title: message
        }).then(() => {
            // Close the modal after displaying the toast
            $('#compareModal').modal('hide');
        });
    }



    });
</script>
