<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\AdminUser[]|\Cake\Collection\CollectionInterface $adminUsers
 */
?>
<?= $this->Html->css('custom.css') ?>

<div class="adminUsers index content">
    <h3 style="color:#004B88 !important"><?= __('Dashboard') ?></h3>
    <div class="table-responsive">
    <table>
            <thead>
                <tr>
                    
                    
                    <th><?= h('Buyer') ?></th>
                    <th><?= h('Total RFQ') ?></th>
                    <th><?= h('New RFQ') ?></th>
                    <th><?= h('Reached') ?></th>
                    <th><?= h('Responded') ?></th>
                    <th><?= h('Non Responded') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($countDashboard as $buyer): ?>
                <tr>
                    
                    
                    <td><?= h($buyer->company_name) ?></td>
                    <td><?= h($buyer->rfq_count) ?></td>
                    <td><?= h($buyer->new_rfq) ?></td>
                    <td><?= h($buyer->reached) ?></td>
                    <td><?= h($buyer->responded) ?></td>
                    <td>
                    <?= $this->Html->link(__($rfqNonResponded[$buyer->buyer_id]), ['action' => 'rfq-list', $buyer->buyer_id, 0]) ?>    

                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'rfq-list', $buyer->buyer_id]) ?>
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
