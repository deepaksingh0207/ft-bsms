<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\BuyerSellerUser $buyerSellerUser
 */
?>

<style>
  /* .table td, .table th{
        text-align:center
    
      }
      .products-list>.item {
    padding: 1px; 
  } */

  .table tbody td {
    padding: 0.75rem 1.5rem !important;
  }

  .products-list .product-info {
    margin-left: 20px;
    font-size: x-small;
    margin-top: 5px
  }

  .user-panel .image {
    margin-right: 10px;
  }

  .products-list .product-img {
    float: clear;
  }

  .products-list .product-img .cust-img {
    width: 20px;
    height: 20px;
  }

  .product-description {

    font-size: 7px;
  }

  .card-header {
    padding: 0rem.0rem;
    margin-left: 10px;
    margin-top: 5px
  }

  .product-title {
    color: black;
  }



  .badge-warning {
    color: black;
    background-Color: lightgrey
  }

  .main-footer {
    padding: 0rem;
    margin-top: 25px
  }

  .mt-4,
  .my-4 {
    margin-top: 0.5rem !important
  }



  .card-title {
    font-size: 0.9rem;
    font-family: system-ui;
  }

  .card-body {
    padding: 0.25rem
  }

  .badge-warning {
    background-Color: white;
    font-size: 12px;
  }

  .products-list .product-title {
    font-weight: 400;

  }

  /* .table> :not(caption)>*>* {
    padding: 0rem
  } */

  .card .card-header {
    padding: .7rem
  }

  .table thead{ margin-top: none !important;}

  .table td, .table th { border-top: 1px solid #f4f4f4 !important;}

  .table tbody tr:hover {
    background-color: #f4f4f4 !important;
  }

  .table tbody tr {
  transition: background-color .5s ease !important;
}

  .card-header h3,.card-header h4,.card-header h5,.card-header h6, .card-header h1, .card-header h2 { color: #004B88 !important;}

  .table thead th { color: #004B88 !important;}

  .actions a { color: #fff !important; background-color: #004B88 !important; padding: 5px 14px !important; border-radius: 4px !important; font-size: .85rem !important; text-transform: uppercase;}
</style>
<section id="content">


  <div class="row mx-1">

    <div class="col-12 p-0">
      <div class="card">
        <div class="card-header"><h4 class="mb-0">RFQ List</h4></div>
        <div class="card-body">

          <table class="table">
            <thead>
              <tr>

                <th>
                  <?= h('Rfq No.') ?>
                </th>
                <th>
                  <?= h('Category') ?>
                </th>
                <th>
                  <?= h('Part') ?>
                </th>
                <th>
                  <?= h('Make') ?>
                </th>
                <th>
                  <?= h('Qty') ?>
                </th>
                <th>
                  <?= h('Created On') ?>
                </th>
                <th class="actions">
                  <?= __('Actions') ?>
                </th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($rfqDetails as $rfqDetail): ?>
                <tr>

                  <td>
                    <?= str_pad($rfqDetail->rfq_no, 5, 0, STR_PAD_LEFT) ?>
                  </td>
                  <td>
                    <?= $rfqDetail->has('product') ? h($rfqDetail->product->name) : '' ?>
                  </td>
                  <td>
                    <?= h($rfqDetail->part_name) ?>
                  </td>
                  <td>
                    <?= h($rfqDetail->make) ?>
                  </td>
                  <td>
                    <?= h($rfqDetail->qty) ?>
                  </td>
                  <td>
                    <?= h($rfqDetail->added_date) ?>
                  </td>

                  <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $rfqDetail->id]) ?>
                  </td>
                </tr>
              <?php endforeach; ?>
            </tbody>
          </table>
          <div class="paginator d-flex justify-content-between mt-2">
            <ul class="pagination pl-3">
              <?= $this->Paginator->first('<< ' . __('first')) ?> &nbsp;&nbsp;
              <?= $this->Paginator->prev('< ' . __('previous')) ?>&nbsp;&nbsp;
              <?= $this->Paginator->numbers() ?>&nbsp;&nbsp;
              <?= $this->Paginator->next(__('next') . ' >') ?>&nbsp;&nbsp;
              <?= $this->Paginator->last(__('last') . ' >>') ?>&nbsp;&nbsp;
            </ul>
            <p class="pr-3">
              <?= $this->Paginator->counter(__('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')) ?>
            </p>

          </div>


        </div>
      </div>
    </div>

    <!-- <div class="col-9 p-0">
            <img src="<?= $this->Url->build('/') ?>img/base.png" style="float: right;width: 84%;">
        </div> -->
  </div>
</section>