<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\BuyerSellerUser[]|\Cake\Collection\CollectionInterface $buyerSellerUsers
 */
?>
<div class="buyerSellerUsers index content">
    <h3><?= $buyerSellerUser->company_name ?></h3>
    <div class="table-responsive">
    <table class="table">
            <thead>
                <tr>
                    
                    <th><?= h('Rfq No.') ?></th>
                    <th><?= h('Category') ?></th>
                    <th><?= h('Part') ?></th>
                    <th><?= h('Qty.') ?></th>
                    <th><?= h('UOM') ?></th>
                    <th><?= h('Status') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($rfqList as $rfq):?>
                <tr>
                    
                    <td><?= str_pad($rfq->rfq_no, 5, 0, STR_PAD_LEFT) ?></td>
                    <td><?= $rfq->has('product') ? h($rfq->product->name) : '' ?></td>
                    <td><?= h($rfq->part_name) ?></td>
                    <td><?= $rfq->qty ?></td>
                    <td><?= $rfq->has('uom') ? h($rfq->uom->description) : '' ?></td>
                    <td><?= h(ucfirst($statusCode[$rfq->status])) ?></td>
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
