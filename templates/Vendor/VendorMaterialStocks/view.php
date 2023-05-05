<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\VendorMaterialStock $vendorMaterialStock
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Vendor Material Stock'), ['action' => 'edit', $vendorMaterialStock->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Vendor Material Stock'), ['action' => 'delete', $vendorMaterialStock->id], ['confirm' => __('Are you sure you want to delete # {0}?', $vendorMaterialStock->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Vendor Material Stocks'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Vendor Material Stock'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="vendorMaterialStocks view content">
            <h3><?= h($vendorMaterialStock->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Sap Vendor Code') ?></th>
                    <td><?= h($vendorMaterialStock->sap_vendor_code) ?></td>
                </tr>
                <tr>
                    <th><?= __('Material') ?></th>
                    <td><?= h($vendorMaterialStock->material) ?></td>
                </tr>
                <tr>
                    <th><?= __('Part Code') ?></th>
                    <td><?= h($vendorMaterialStock->part_code) ?></td>
                </tr>
                <tr>
                    <th><?= __('Material Desc') ?></th>
                    <td><?= h($vendorMaterialStock->material_desc) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($vendorMaterialStock->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Current Stock') ?></th>
                    <td><?= $this->Number->format($vendorMaterialStock->current_stock) ?></td>
                </tr>
                <tr>
                    <th><?= __('Production Stock') ?></th>
                    <td><?= $this->Number->format($vendorMaterialStock->production_stock) ?></td>
                </tr>
                <tr>
                    <th><?= __('Added Date') ?></th>
                    <td><?= h($vendorMaterialStock->added_date) ?></td>
                </tr>
                <tr>
                    <th><?= __('Updated Date') ?></th>
                    <td><?= h($vendorMaterialStock->updated_date) ?></td>
                </tr>
                <tr>
                    <th><?= __('Status') ?></th>
                    <td><?= $vendorMaterialStock->status ? __('Yes') : __('No'); ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
