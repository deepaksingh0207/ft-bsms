<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\VendorTemp $vendorTemp
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Vendor Temp'), ['action' => 'edit', $vendorTemp->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Vendor Temp'), ['action' => 'delete', $vendorTemp->id], ['confirm' => __('Are you sure you want to delete # {0}?', $vendorTemp->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Vendor Temps'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Vendor Temp'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="vendorTemps view content">
            <h3><?= h($vendorTemp->name) ?></h3>
            <table>
                <tr>
                    <th><?= __('Purchasing Organization') ?></th>
                    <td><?= $vendorTemp->has('purchasing_organization') ? $this->Html->link($vendorTemp->purchasing_organization->name, ['controller' => 'PurchasingOrganizations', 'action' => 'view', $vendorTemp->purchasing_organization->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Account Group') ?></th>
                    <td><?= $vendorTemp->has('account_group') ? $this->Html->link($vendorTemp->account_group->name, ['controller' => 'AccountGroups', 'action' => 'view', $vendorTemp->account_group->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Schema Group') ?></th>
                    <td><?= $vendorTemp->has('schema_group') ? $this->Html->link($vendorTemp->schema_group->name, ['controller' => 'SchemaGroups', 'action' => 'view', $vendorTemp->schema_group->id]) : '' ?></td>
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
                    <td><?= h($vendorTemp->email_id) ?></td>
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
                    <td><?= h($vendorTemp->contact_email_id) ?></td>
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
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($vendorTemp->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Buyer Id') ?></th>
                    <td><?= $this->Number->format($vendorTemp->buyer_id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Valid Date') ?></th>
                    <td><?= h($vendorTemp->valid_date) ?></td>
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
                    <td><?= $vendorTemp->status ? __('Yes') : __('No'); ?></td>
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
