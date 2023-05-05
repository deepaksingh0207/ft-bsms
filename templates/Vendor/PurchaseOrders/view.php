<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\PoHeader $poHeader
 */
?>
<link rel="stylesheet"
  href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
<div class="card">
  <div class="card-header">
    <h3 style="color: navy;"><b>
        <?= h($poHeader->po_no) ?>
      </b></h3>
  </div>
  <div class="card-body">
    <table class="table" style="border-left: .5px solid lightgray;border-right: .5px solid lightgray;border-bottom: .5px solid lightgray;">
      <tr style="background-color: #d3d3d36e;">
        <th>
          <?= __('Vendor Code') ?>
        </th>
        <th>
          <?= __('Po No') ?>
        </th>
        <th>
          <?= __('Document Type') ?>
        </th>
        <th>
          <?= __('Created By') ?>
        </th>
        <th>
          <?= __('Pay Terms') ?>
        </th>
        <th>
          <?= __('Currency') ?>
        </th>
        <!-- <th><?= __('Release Status') ?></th> -->
        <th>
          <?= __('Exchange Rate') ?>
        </th>
        <th>
          <?= __('Created On') ?>
        </th>
        <th>
          <?= __('Added Date') ?>
        </th>
      </tr>
      <tr>
        <td>
          <?= h($poHeader->sap_vendor_code) ?>
        </td>
        <td>
          <?= h($poHeader->po_no) ?>
        </td>
        <td>
          <?= h($poHeader->document_type) ?>
        </td>
        <td>
          <?= h($poHeader->created_by) ?>
        </td>
        <td>
          <?= h($poHeader->pay_terms) ?>
        </td>
        <td>
          <?= h($poHeader->currency) ?>
        </td>
        <!-- <td><?= h($poHeader->release_status) ?></td> -->
        <td>
          <?= $this->Number->format($poHeader->exchange_rate) ?>
        </td>
        <td>
          <?= h($poHeader->created_on) ?>
        </td>
        <td>
          <?= h($poHeader->added_date) ?>
        </td>
      </tr>
    </table>
  </div>
</div>

<div class="card">
  <div class="card-header">
    <h3 style="color: navy;"><b>
        <?= __('PO Item List') ?>
      </b></h3>
  </div>
  <div class="card-body">
    <?php if (!empty($poHeader->po_footers)) : ?>
    <div class="table-responsive">
      <table class="table table-hover" id="example1" style="border-left: .5px solid lightgray;border-right: .5px solid lightgray;border-bottom: .5px solid lightgray;">
        <thead>
          <tr style="background-color: #d3d3d36e;">
            <th>&nbsp;</th>
            <th>
              <?= __('Item') ?>
            </th>
            <th>
              <?= __('Material') ?>
            </th>
            <th>
              <?= __('Short Text') ?>
            </th>
            <th>
              <?= __('Po Qty') ?>
            </th>
            <th>
              <?= __('Grn Qty') ?>
            </th>
            <th>
              <?= __('Pending Qty') ?>
            </th>
            <th>
              <?= __('Order Unit') ?>
            </th>
            <th>
              <?= __('Net Price') ?>
            </th>
            <th>
              <?= __('Price Unit') ?>
            </th>
            <th>
              <?= __('Net Value') ?>
            </th>
            <th>
              <?= __('Gross Value') ?>
            </th>
            <th>
              <?= __('Supplier Part Code') ?>
            </th>
            <th>
              <?= __('Stock') ?>
            </th>
            <th class="actions">
              <?= __('Actions') ?>
            </th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($poHeader->po_footers as $poFooters) : ?>
          <tr>
            <td data-id="<?=$poFooters->id?>" class="details-control">
              <span class="material-symbols-outlined flu" data-alt="+" style="cursor: pointer;">
                add
              </span>
            </td>
            <td>
              <?= h($poFooters->item) ?>
            </td>
            <td>
              <?= h($poFooters->material) ?>
            </td>
            <td>
              <?= h($poFooters->short_text) ?>
            </td>
            <td>
              <?= h($poFooters->po_qty) ?>
            </td>
            <td>
              <?= h($poFooters->grn_qty) ?>
            </td>
            <td>
              <?= h($poFooters->pending_qty) ?>
            </td>
            <td>
              <?= h($poFooters->order_unit) ?>
            </td>
            <td>
              <?= h($poFooters->net_price) ?>
            </td>
            <td>
              <?= h($poFooters->price_unit) ?>
            </td>
            <td>
              <?= h($poFooters->net_value) ?>
            </td>
            <td>
              <?= h($poFooters->gross_value) ?>
            </td>
            <td>
              <?= h($poFooters->part_code) ?>
            </td>
            <td>
              <?= h($poFooters->stock) ?>
            </td>

            <td class="actions">
            <?= $this->Html->link(__('View'), "#", ['class' => 'dispatch_item btn btn-default mb-0', 'data-toggle'=> "modal", 'data-target' => "#item_$poFooters->item" ,'header-id']) ?>
            <?= $this->Html->link(__('Stock'), "#", ['class' => 'stock_item btn btn-default mb-0', 'data-toggle'=> "modal", 'data-target' => "#updateStockModal" ,'header-id' => $poHeader->id, 'footer-id' => $poFooters->id, 'part-code' => $poFooters->part_code,]) ?>
                            <!-- <?= $this->Html->link(__('Dispatch'), "#", ['class' => 'dispatch_item', 'data-toggle'=> "modal", 'data-target' => "#exampleModal" ,'header-id' => $poHeader->id, 'footer-id' => $poFooters->id]) ?> -->
            </td>
          </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>
    <?php endif; ?>
  </div>
</div>

<?php foreach ($poHeader->po_footers as $poFooters) :
    $actualQty = $poFooters->po_qty;
    $totalQty = 0;
    ?>
<!-- delivery modal -->
<div class="modal fade" id="item_<?= h($poFooters->item) ?>" tabindex="-1" role="dialog"
  aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl" role="document">

    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Delivery Details :
          <?= h($poHeader->po_no .' - '. $poFooters->item) ?>
        </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <table class="table table-hover" id="example1">
          <thead>
            <tr>
              <th>
                <?= __('Item') ?>
              </th>
              <th>
                <?= __('Short Text') ?>
              </th>
              <th>
                <?= __('Challan No.') ?>
              </th>
              <th>
                <?= __('Qty') ?>
              </th>
              <th>
                <?= __('Eway Bill No.') ?>
              </th>
              <th>
                <?= __('Einvoice No') ?>
              </th>
              <th class="actions">
                <?= __('Actions') ?>
              </th>
            </tr>
          </thead>

          <tbody>
            <?php foreach ($poFooters->delivery_details as $delivery) :
                        $totalQty = $totalQty + $delivery->qty;
                        ?>
            <tr>
              <td>
                <?= h($poFooters->item) ?>
              </td>
              <td>
                <?= h($poFooters->short_text) ?>
              </td>
              <td>
                <?= h($delivery->challan_no) ?>
              </td>
              <td>
                <?= h($delivery->qty) ?>
              </td>
              <td>
                <?= h($delivery->eway_bill_no) ?>
              </td>
              <td>
                <?= h($delivery->einvoice_no) ?>
              </td>
              <td class="actions">
                <!-- <?= $this->Html->link(__('View'), ['controller' => 'PoFooters', 'action' => 'view', $poFooters->id]) ?> -->
              </td>
            </tr>
            <?php endforeach; ?>
          </tbody>
        </table>

        <div>Actual Qty :
          <?php echo $actualQty ?> <br />Delivered Qty :
          <?php echo $totalQty ?>
        </div>

      </div>
    </div>
  </div>
</div>
<?php endforeach; ?>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
  aria-hidden="true">
  <div class="modal-dialog" role="document">

    <div class="modal-content">

      <?= $this->Form->create(null, ['id' => 'quickForm',  'url' => ['controller' => 'purchase-orders', 'action' => 'adddelivery']]) ?>
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Delivery Details</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <?php
                    echo $this->Form->control('po_header_id', ['id' => 'po_header_id', 'type' => 'hidden', 'class' => 'form-control rounded-0','div' => 'form-group']);  
                    echo $this->Form->control('po_footer_id', ['id' => 'po_footer_id', 'type' => 'hidden', 'class' => 'form-control rounded-0','div' => 'form-group']);  
                    echo $this->Form->control('challan_no', ['class' => 'form-control rounded-0','div' => 'form-group']);  
                    echo $this->Form->control('qty', ['class' => 'form-control rounded-0','div' => 'form-group']);
                    echo $this->Form->control('eway_bill_no', ['class' => 'form-control rounded-0','div' => 'form-group']);
                    echo $this->Form->control('einvoice_no', ['class' => 'form-control rounded-0','div' => 'form-group']);
                ?>


        <div class="custom-file form-group rounded-0" style="margin-top:20px;">
          <input type="file" name="challan_document" class="custom-file-input" id="customFile">
          <label class="custom-file-label" for="customFile">Choose file</label>
        </div>

      </div>
      <div id="error_msg"></div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Submit</button>
      </div>
      </form>
    </div>
  </div>
</div>

<!-- Modal stock -->
<div class="modal fade" id="updateStockModal" tabindex="-1" role="dialog" aria-labelledby="updateStockModalLabel"
  aria-hidden="true">
  <div class="modal-dialog" role="document">

    <div class="modal-content">

      <?= $this->Form->create(null, ['id' => 'stockForm',  'url' => ['controller' => 'po-footers', 'action' => 'edit']]) ?>
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Update Stock</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <?php
            echo $this->Form->control('po_header_id', ['id' => 'po_header_stock_id', 'type' => 'hidden', 'class' => 'form-control rounded-0','div' => 'form-group']);  
            echo $this->Form->control('po_footer_id', ['id' => 'po_footer_stock_id', 'type' => 'hidden', 'class' => 'form-control rounded-0','div' => 'form-group']);  
            echo $this->Form->control('part_code', ['id' => 'part_code', 'class' => 'form-control rounded-0','div' => 'form-group']);  
            echo $this->Form->control('stock', ['type' => 'number','class' => 'form-control rounded-0','div' => 'form-group']);
        ?>
      </div>
      <div id="error_msg"></div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Submit</button>
      </div>
      </form>
    </div>
  </div>
</div>


<script>
  $(document).ready(function () {
    var Toast = Swal.mixin({
      toast: true,
      position: 'top-end',
      showConfirmButton: false,
      timer: 3000
    });

    var table = $("#example1").DataTable({
      "paging": true,
      "responsive": false, "lengthChange": false, "autoWidth": false, "searching": true,
    });

    $(".dispatch_item").click(function () {
      $("#po_header_id").val($(this).attr('header-id'));
      $("#po_footer_id").val($(this).attr('footer-id'));
    });

    $(".stock_item").click(function () {
      $("#po_header_stock_id").val($(this).attr('header-id'));
      $("#po_footer_stock_id").val($(this).attr('footer-id'));
      $("#part_code").val($(this).attr('part-code'));
    });

    $('#exampleModal').on('hidden.bs.modal', function (e) {
      $('#exampleModal form')[0].reset();
    });

    $('#quickForm').validate({
      rules: {
        challan_no: { required: true },
        qty: { required: true, number: true },
        eway_bill_no: { required: true, },
        einvoice_no: { required: true, },
      },
      messages: {
        challan_no: { required: "Please enter a email address", },
        qty: { required: "Please provide a password", number: "Please enter number only" },
        eway_bill_no: { required: "Please enter a email address", },
        einvoice_no: { required: "Please enter a email address", },
      },
      errorElement: 'span',
      errorPlacement: function (error, element) {
        error.addClass('invalid-feedback');
        element.closest('.form-group').append(error);
      },
      highlight: function (element, errorClass, validClass) { $(element).addClass('is-invalid'); },
      unhighlight: function (element, errorClass, validClass) { $(element).removeClass('is-invalid'); },
      submitHandler: function () {
        var formdatas = new FormData($('#quickForm')[0]);
        $.ajax({
          type: "POST",
          url: "<?php echo \Cake\Routing\Router::url(array('controller' => '/purchase-orders', 'action' => 'adddelivery')); ?> ",
          data: $("#quickForm").serialize(),
          dataType: 'json',
          success: function (response) {
            console.log(response);
            if (response.status == 'success') {
              $('#exampleModal').modal('toggle');
              Toast.fire({
                icon: 'success',
                title: response.message
              });
              location.reload(true);
            } else {
              Toast.fire({ icon: 'error', title: response.message });
            }

          }
        });
        return false;
      }
    });
    $('.row').attr('style','width:110vw;');
    $('#stockForm').validate({
      rules: {
        part_code: { required: true },
        stock: { required: true, number: true },
      },
      messages: {
        part_code: { required: "Please enter part code ", },
        stock: { required: "Please provide a stock", number: "Please enter number only" },
      },
      errorElement: 'span',
      errorPlacement: function (error, element) {
        error.addClass('invalid-feedback');
        element.closest('.form-group').append(error);
      },
      highlight: function (element, errorClass, validClass) { $(element).addClass('is-invalid'); },
      unhighlight: function (element, errorClass, validClass) { $(element).removeClass('is-invalid'); },
      submitHandler: function () {
        var formdatas = new FormData($('#stockForm')[0]);
        $.ajax({
          type: "POST",
          url: "<?php echo \Cake\Routing\Router::url(array( 'controller' => '/po-footers', 'action' => 'update')); ?> /" + $("#po_footer_stock_id").val(),
          data: $("#stockForm").serialize(),
          dataType: 'json',
          success: function (response) {
            console.log(response);
            if (response.status == 'success') {
              $('#updateStockModal').modal('toggle');
              Toast.fire({
                icon: 'success',
                title: response.message
              });
            } else {
              Toast.fire({
                icon: 'error',
                title: response.message
              });
            }

          }
        });
        return false;
      }
    });

    $(document).on("click", ".flu", function () {
      if ($(this).data('alt') == '+') {
        $(this).data('alt', '-');
        $(this).empty();
        $(this).append('Remove');
      } else {
        $(this).data('alt', '+');
        $(this).empty();
        $(this).append('add');
      }
    });

    $('#example1 tbody').on('click', 'td.details-control', function () {
      var tr = $(this).closest('tr');
      var row = table.row(tr);

      if (row.child.isShown()) {
        row.child.hide();
        tr.removeClass('shown');
      }
      else {
        row.child(format($(this).attr('data-id'))).show();
        tr.addClass('shown');
      }
    });


    function format(rowData) {
      var div = $('<div/>')
        .addClass('loading')
        .text('Loading...');

      $.ajax({
        type: "GET",
        //url: '../getDeliveryDetails/' + rowData,
        url: "<?php echo \Cake\Routing\Router::url(array('controller' => '/purchase-orders', 'action' => 'get-schedules')); ?> /" + rowData,
        dataType: 'json',
        success: function (response) {
          if (response.status == 'success') {
            div
              .html(response.html)
              .removeClass('loading');
          } else {
            div
              .html(response.message)
              .removeClass('loading');
          }
        }
      });
      return div;
    }
  });


</script>