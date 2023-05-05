<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\DeliveryDetail[]|\Cake\Collection\CollectionInterface $deliveryDetails
 */
?>
<div class="deliveryDetails index content card">
    <div class="card-header">
        <h3 style="color: navy;">
            <b>
                <?= __('DELIVERY DETAIL') ?>
            </b>
        </h3>
    </div>
    <div class="card-body">
        <table class="table table-hover" id="example1" style="border-left: .5px solid lightgray;border-right: .5px solid lightgray; border-bottom: .5px solid lightgray;">
            <thead>
                <tr style="background-color: #d3d3d36e;">
                    <th>Purchase Order</th>
                    <th>Item</th>
                    <th>Challan No.</th>
                    <th>Qty</th>
                    <th>Ewaybill No.</th>
                    <th>E-invoice No</th>
                    <th>Status</th>
                    <th>Added Date</th>
                    <th>Updated Date</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($deliveryDetails as $deliveryDetail): ?>
                <tr>
                    <td>
                        <?= $deliveryDetail->has('po_header') ? $deliveryDetail->po_header->po_no : '' ?>
                    </td>
                    <td>
                        <?= $deliveryDetail->has('po_footer') ? $deliveryDetail->po_footer->item : '' ?>
                    </td>
                    <td>
                        <?= h($deliveryDetail->challan_no) ?>
                    </td>
                    <td>
                        <?= $this->Number->format($deliveryDetail->qty) ?>
                    </td>
                    <td>
                        <?= h($deliveryDetail->eway_bill_no) ?>
                    </td>
                    <td>
                        <?= h($deliveryDetail->einvoice_no) ?>
                    </td>
                    <td><span class="badge bg-warning">
                            <?= h($deliveryDetail->status ? '' : 'Intransit') ?>
                        </span></td>
                    <td>
                        <?= h($deliveryDetail->added_date) ?>
                    </td>
                    <td>
                        <?= h($deliveryDetail->updated_date) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

</div>

<script>
    $(document).ready(function () {
        var table = $("#example1").DataTable({
            "paging": true,
            "responsive": false, "lengthChange": false, "autoWidth": false, "searching": true,
        });
    });

</script>