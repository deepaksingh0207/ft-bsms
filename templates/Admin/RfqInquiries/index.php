<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\RfqInquiry[]|\Cake\Collection\CollectionInterface $rfqInquiries
 */
?>
<div class="rfqInquiries index content">
    <?= $this->Html->link(__('New Rfq Inquiry'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Rfq Inquiries') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('rfq_id') ?></th>
                    <th><?= $this->Paginator->sort('seller_id') ?></th>
                    <th><?= $this->Paginator->sort('qty') ?></th>
                    <th><?= $this->Paginator->sort('rate') ?></th>
                    <th><?= $this->Paginator->sort('delivery_date') ?></th>
                    <th><?= $this->Paginator->sort('inquiry_data') ?></th>
                    <th><?= $this->Paginator->sort('inquiry') ?></th>
                    <th><?= $this->Paginator->sort('created_date') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($rfqInquiries as $rfqInquiry): ?>
                <tr>
                    <td><?= $this->Number->format($rfqInquiry->id) ?></td>
                    <td><?= $this->Number->format($rfqInquiry->rfq_id) ?></td>
                    <td><?= $rfqInquiry->has('buyer_seller_user') ? $this->Html->link($rfqInquiry->buyer_seller_user->id, ['controller' => 'BuyerSellerUsers', 'action' => 'view', $rfqInquiry->buyer_seller_user->id]) : '' ?></td>
                    <td><?= $rfqInquiry->qty === null ? '' : $this->Number->format($rfqInquiry->qty) ?></td>
                    <td><?= $rfqInquiry->rate === null ? '' : $this->Number->format($rfqInquiry->rate) ?></td>
                    <td><?= h($rfqInquiry->delivery_date) ?></td>
                    <td><?= h($rfqInquiry->inquiry_data) ?></td>
                    <td><?= h($rfqInquiry->inquiry) ?></td>
                    <td><?= h($rfqInquiry->created_date) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $rfqInquiry->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $rfqInquiry->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $rfqInquiry->id], ['confirm' => __('Are you sure you want to delete # {0}?', $rfqInquiry->id)]) ?>
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
