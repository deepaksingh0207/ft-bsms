<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\BuyerSellerUser $buyerSellerUser
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $buyerSellerUser->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $buyerSellerUser->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Buyer Seller Users'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="buyerSellerUsers form content">
            <?= $this->Form->create($buyerSellerUser) ?>
            <fieldset>
                <legend><?= __('Edit Buyer Seller User') ?></legend>
                <?php
                    echo $this->Form->control('username');
                    echo $this->Form->control('password');
                    echo $this->Form->control('company_name');
                    echo $this->Form->control('address');
                    echo $this->Form->control('cities');
                    echo $this->Form->control('email');
                    echo $this->Form->control('contact');
                    echo $this->Form->control('alt_contact');
                    echo $this->Form->control('business_type');
                    echo $this->Form->control('is_verified');
                    echo $this->Form->control('status');
                    echo $this->Form->control('added_date');
                    echo $this->Form->control('updated_date');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
