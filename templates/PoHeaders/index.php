<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\PoHeader[]|\Cake\Collection\CollectionInterface $poHeaders
 */
?>
<div class="poHeaders index content">
    <?= $this->Html->link(__('New Po Header'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Po Headers') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('sap_vendor_code') ?></th>
                    <th><?= $this->Paginator->sort('po_no') ?></th>
                    <th><?= $this->Paginator->sort('document_type') ?></th>
                    <th><?= $this->Paginator->sort('created_on') ?></th>
                    <th><?= $this->Paginator->sort('created_by') ?></th>
                    <th><?= $this->Paginator->sort('pay_terms') ?></th>
                    <th><?= $this->Paginator->sort('currency') ?></th>
                    <th><?= $this->Paginator->sort('exchange_rate') ?></th>
                    <th><?= $this->Paginator->sort('release_status') ?></th>
                    <th><?= $this->Paginator->sort('added_date') ?></th>
                    <th><?= $this->Paginator->sort('updated_date') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($poHeaders as $poHeader): ?>
                <tr>
                    <td><?= $this->Number->format($poHeader->id) ?></td>
                    <td><?= h($poHeader->sap_vendor_code) ?></td>
                    <td><?= h($poHeader->po_no) ?></td>
                    <td><?= h($poHeader->document_type) ?></td>
                    <td><?= h($poHeader->created_on) ?></td>
                    <td><?= h($poHeader->created_by) ?></td>
                    <td><?= h($poHeader->pay_terms) ?></td>
                    <td><?= h($poHeader->currency) ?></td>
                    <td><?= $this->Number->format($poHeader->exchange_rate) ?></td>
                    <td><?= h($poHeader->release_status) ?></td>
                    <td><?= h($poHeader->added_date) ?></td>
                    <td><?= h($poHeader->updated_date) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $poHeader->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $poHeader->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $poHeader->id], ['confirm' => __('Are you sure you want to delete # {0}?', $poHeader->id)]) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(__('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')) ?></p>
    </div>
</div>
