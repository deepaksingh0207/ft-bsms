<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\RfqDetail[]|\Cake\Collection\CollectionInterface $rfqDetails
 */
?>
<div class="rfqDetails index content">
    <!-- <?= $this->Html->link(__('New Rfq Detail'), ['action' => 'add'], ['class' => 'button float-right']) ?> -->
    <h3><?= __('Rfq Details') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    
                    <th><?= $this->Paginator->sort('buyer_seller_user_id', 'Buyer') ?></th>
                    <th><?= $this->Paginator->sort('rfq_no') ?></th>
                    <th><?= $this->Paginator->sort('product_id') ?></th>
                    <th><?= $this->Paginator->sort('part_name') ?></th>
                    <th><?= $this->Paginator->sort('qty') ?></th>
                    <th><?= $this->Paginator->sort('uom_code', 'UOM') ?></th>
                    <th><?= $this->Paginator->sort('remarks') ?></th>
                    <th><?= $this->Paginator->sort('make') ?></th>
                    <th><?= $this->Paginator->sort('status') ?></th>
                    <th><?= $this->Paginator->sort('added_date') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($rfqDetails as $rfqDetail): 
                    $rfqDetail->status = ($rfqDetail->status) ?  $rfqDetail->status : 0;
                    ?>
                <tr>
                    
                    <td><?= $rfqDetail->has('buyer_seller_user') ? $this->Html->link($rfqDetail->buyer_seller_user->company_name, ['controller' => 'BuyerSellerUsers', 'action' => 'view', $rfqDetail->buyer_seller_user->id]) : '' ?></td>
                    <td><?= $this->Number->format($rfqDetail->rfq_no) ?></td>
                    <td><?= $rfqDetail->has('product') ? $this->Html->link($rfqDetail->product->name, ['controller' => 'Products', 'action' => 'view', $rfqDetail->product->id]) : '' ?></td>
                    
                    <td><?= h($rfqDetail->part_name) ?></td>
                    <td><?= $this->Number->format($rfqDetail->qty) ?></td>
                    <td><?= $rfqDetail->has('uom') ? $this->Html->link($rfqDetail->uom->description, ['controller' => 'Uoms', 'action' => 'view', $rfqDetail->uom->id]) : '' ?></td>
                    <td><?= h($rfqDetail->remarks) ?></td>
                    <td><?= h($rfqDetail->make) ?></td>
                    <td><?= h(ucfirst($statusCode[$rfqDetail->status])) ?></td>
                    <td><?= h($rfqDetail->added_date) ?></td>
                    
                    <td class="actions">
                        
                        <?php if($rfqDetail->status == 1) : ?>
                            <?= $this->Html->link(__('Reject'), ['action' => 'apprej', $rfqDetail->id, 'rej']) ?>
                        <?php else : ?>
                            <?= $this->Html->link(__('Approve'), ['action' => 'apprej', $rfqDetail->id, 'app']) ?>
                        <?php endif; ?>
                        <?= $this->Html->link(__('View'), ['action' => 'view', $rfqDetail->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $rfqDetail->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $rfqDetail->id], ['confirm' => __('Are you sure you want to delete # {0}?', $rfqDetail->id)]) ?>
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
