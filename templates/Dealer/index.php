<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\BuyerSellerUser[]|\Cake\Collection\CollectionInterface $buyerSellerUsers
 */
?>
<div class="buyerSellerUsers index content">
    <?= $this->Html->link(__('New Buyer Seller User'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Buyer Seller Users') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('username') ?></th>
                    <th><?= $this->Paginator->sort('company_name') ?></th>
                    <th><?= $this->Paginator->sort('cities') ?></th>
                    <th><?= $this->Paginator->sort('email_id') ?></th>
                    <th><?= $this->Paginator->sort('contact') ?></th>
                    <th><?= $this->Paginator->sort('alt_contact') ?></th>
                    <th><?= $this->Paginator->sort('business_type') ?></th>
                    <th><?= $this->Paginator->sort('is_verified') ?></th>
                    <th><?= $this->Paginator->sort('status') ?></th>
                    <th><?= $this->Paginator->sort('added_date') ?></th>
                    <th><?= $this->Paginator->sort('updated_date') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($buyerSellerUsers as $buyerSellerUser): ?>
                <tr>
                    <td><?= $this->Number->format($buyerSellerUser->id) ?></td>
                    <td><?= h($buyerSellerUser->username) ?></td>
                    <td><?= h($buyerSellerUser->company_name) ?></td>
                    <td><?= h($buyerSellerUser->cities) ?></td>
                    <td><?= h($buyerSellerUser->email_id) ?></td>
                    <td><?= h($buyerSellerUser->contact) ?></td>
                    <td><?= h($buyerSellerUser->alt_contact) ?></td>
                    <td><?= h($buyerSellerUser->business_type) ?></td>
                    <td><?= $this->Number->format($buyerSellerUser->is_verified) ?></td>
                    <td><?= $this->Number->format($buyerSellerUser->status) ?></td>
                    <td><?= h($buyerSellerUser->added_date) ?></td>
                    <td><?= h($buyerSellerUser->updated_date) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $buyerSellerUser->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $buyerSellerUser->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $buyerSellerUser->id], ['confirm' => __('Are you sure you want to delete # {0}?', $buyerSellerUser->id)]) ?>
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
