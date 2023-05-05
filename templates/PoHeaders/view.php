<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\PoHeader $poHeader
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Po Header'), ['action' => 'edit', $poHeader->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Po Header'), ['action' => 'delete', $poHeader->id], ['confirm' => __('Are you sure you want to delete # {0}?', $poHeader->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Po Headers'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Po Header'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="poHeaders view content">
            <h3><?= h($poHeader->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Sap Vendor Code') ?></th>
                    <td><?= h($poHeader->sap_vendor_code) ?></td>
                </tr>
                <tr>
                    <th><?= __('Po No') ?></th>
                    <td><?= h($poHeader->po_no) ?></td>
                </tr>
                <tr>
                    <th><?= __('Document Type') ?></th>
                    <td><?= h($poHeader->document_type) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created By') ?></th>
                    <td><?= h($poHeader->created_by) ?></td>
                </tr>
                <tr>
                    <th><?= __('Pay Terms') ?></th>
                    <td><?= h($poHeader->pay_terms) ?></td>
                </tr>
                <tr>
                    <th><?= __('Currency') ?></th>
                    <td><?= h($poHeader->currency) ?></td>
                </tr>
                <tr>
                    <th><?= __('Release Status') ?></th>
                    <td><?= h($poHeader->release_status) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($poHeader->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Exchange Rate') ?></th>
                    <td><?= $this->Number->format($poHeader->exchange_rate) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created On') ?></th>
                    <td><?= h($poHeader->created_on) ?></td>
                </tr>
                <tr>
                    <th><?= __('Added Date') ?></th>
                    <td><?= h($poHeader->added_date) ?></td>
                </tr>
                <tr>
                    <th><?= __('Updated Date') ?></th>
                    <td><?= h($poHeader->updated_date) ?></td>
                </tr>
            </table>
            <div class="related">
                <h4><?= __('Related Po Footers') ?></h4>
                <?php if (!empty($poHeader->po_footers)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Po Header Id') ?></th>
                            <th><?= __('Item') ?></th>
                            <th><?= __('Deleted Indication') ?></th>
                            <th><?= __('Material') ?></th>
                            <th><?= __('Short Text') ?></th>
                            <th><?= __('Po Qty') ?></th>
                            <th><?= __('Grn Qty') ?></th>
                            <th><?= __('Pending Qty') ?></th>
                            <th><?= __('Order Unit') ?></th>
                            <th><?= __('Net Price') ?></th>
                            <th><?= __('Price Unit') ?></th>
                            <th><?= __('Net Value') ?></th>
                            <th><?= __('Gross Value') ?></th>
                            <th><?= __('Added Date') ?></th>
                            <th><?= __('Updated Date') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($poHeader->po_footers as $poFooters) : ?>
                        <tr>
                            <td><?= h($poFooters->id) ?></td>
                            <td><?= h($poFooters->po_header_id) ?></td>
                            <td><?= h($poFooters->item) ?></td>
                            <td><?= h($poFooters->deleted_indication) ?></td>
                            <td><?= h($poFooters->material) ?></td>
                            <td><?= h($poFooters->short_text) ?></td>
                            <td><?= h($poFooters->po_qty) ?></td>
                            <td><?= h($poFooters->grn_qty) ?></td>
                            <td><?= h($poFooters->pending_qty) ?></td>
                            <td><?= h($poFooters->order_unit) ?></td>
                            <td><?= h($poFooters->net_price) ?></td>
                            <td><?= h($poFooters->price_unit) ?></td>
                            <td><?= h($poFooters->net_value) ?></td>
                            <td><?= h($poFooters->gross_value) ?></td>
                            <td><?= h($poFooters->added_date) ?></td>
                            <td><?= h($poFooters->updated_date) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'PoFooters', 'action' => 'view', $poFooters->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'PoFooters', 'action' => 'edit', $poFooters->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'PoFooters', 'action' => 'delete', $poFooters->id], ['confirm' => __('Are you sure you want to delete # {0}?', $poFooters->id)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
