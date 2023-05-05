<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\VendorTemp $vendorTemp
 */


 switch($vendorTemp->status) {
    case 0 : $status = 'Sent to Vendor'; break;
    case 1 : $status = 'Pending for approval'; break;
    case 2 : $status = 'approved'; break;
}

?>


<div class="row">
    <div class="column-responsive column-80">
        <div class="vendorTemps view content">
            <h3><?= h($vendorTemp->name) ?></h3>
            <table>
                <tr>
                    <th><?= __('Purchasing Organization') ?></th>
                    <td><?= $vendorTemp->has('purchasing_organization') ? $vendorTemp->purchasing_organization->name : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Account Group') ?></th>
                    <td><?= $vendorTemp->has('account_group') ? $vendorTemp->account_group->name : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Schema Group') ?></th>
                    <td><?= $vendorTemp->has('schema_group') ? $vendorTemp->schema_group->name : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Name') ?></th>
                    <td><?= h($vendorTemp->name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Address') ?></th>
                    <td><?= h($vendorTemp->address) ?></td>
                </tr>
                <tr>
                    <th><?= __('City') ?></th>
                    <td><?= h($vendorTemp->city) ?></td>
                </tr>
                <tr>
                    <th><?= __('Pincode') ?></th>
                    <td><?= h($vendorTemp->pincode) ?></td>
                </tr>
                <tr>
                    <th><?= __('Mobile') ?></th>
                    <td><?= h($vendorTemp->mobile) ?></td>
                </tr>
                <tr>
                    <th><?= __('Email Id') ?></th>
                    <td><?= h($vendorTemp->email) ?></td>
                </tr>
                <tr>
                    <th><?= __('Country') ?></th>
                    <td><?= h($vendorTemp->country) ?></td>
                </tr>
                <tr>
                    <th><?= __('Order Currency') ?></th>
                    <td><?= h($vendorTemp->order_currency) ?></td>
                </tr>
                <tr>
                    <th><?= __('Gst No') ?></th>
                    <td><?= h($vendorTemp->gst_no) ?></td>
                </tr>
                <tr>
                    <th><?= __('Pan No') ?></th>
                    <td><?= h($vendorTemp->pan_no) ?></td>
                </tr>
                <tr>
                    <th><?= __('Contact Person') ?></th>
                    <td><?= h($vendorTemp->contact_person) ?></td>
                </tr>
                <tr>
                    <th><?= __('Contact Email Id') ?></th>
                    <td><?= h($vendorTemp->contact_email) ?></td>
                </tr>
                <tr>
                    <th><?= __('Contact Mobile') ?></th>
                    <td><?= h($vendorTemp->contact_mobile) ?></td>
                </tr>
                <tr>
                    <th><?= __('Cin No') ?></th>
                    <td><?= h($vendorTemp->cin_no) ?></td>
                </tr>
                <tr>
                    <th><?= __('Tan No') ?></th>
                    <td><?= h($vendorTemp->tan_no) ?></td>
                </tr>
                <tr>
                    <th><?= __('Added Date') ?></th>
                    <td><?= h($vendorTemp->added_date) ?></td>
                </tr>
                <tr>
                    <th><?= __('Updated Date') ?></th>
                    <td><?= h($vendorTemp->updated_date) ?></td>
                </tr>
                <tr>
                    <th><?= __('Status') ?></th>
                    <td><?= $status ?></td>
                </tr>
            </table>
            <div class="text">
                <strong><?= __('Payment Term') ?></strong>
                <blockquote>
                    <?= $this->Text->autoParagraph(h($vendorTemp->payment_term)); ?>
                </blockquote>
            </div>
        </div>
    </div>
</div>
