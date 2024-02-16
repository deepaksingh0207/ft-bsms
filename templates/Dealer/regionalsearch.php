<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\BuyerSellerUser $buyerSellerUser
 */
?>
<style>
    .h1,
    h1 {
        font-size: 1.5rem
    }

    /* .card-body{
        padding:0rem;
    } */
    /* .table td, .table th{
        text-align:center
    } */
    .table tbody td {
        padding: 0.75rem 1.5rem !important;
    }

    .table {
        background-color: white
    }

    /* .table td, .table th{
        padding:0rem
    } */
</style>
<section id="content">
    <!-- <div class="row p-2">
        <div class="col-3 p-0">
            <div class="row">
                <img src="<?= $this->Url->build('/') ?>img/side.png" style="float: right; padding-left: 2vw;">
                <div class="col-12" style="text-align: center;">
                    <a href="<?= $this->Url->build('/') ?>dealer/addproduct/buyer">
                        <img class="login" src="<?= $this->Url->build('/') ?>img/button/1.png" style="width: 15vw;"></a>
                    <a href="<?= $this->Url->build('/') ?>dealer/addproduct/seller">
                        <img class="login" src="<?= $this->Url->build('/') ?>img/button/5.png" style="width: 15vw;"></a>
                        <a class="menu-link" href="<?= $this->Url->build('/') ?>dealer/search/">
                            <div><i class="icon-wpforms"></i>Search Suppliers</div></a>
                            <a class="menu-link" href="<?= $this->Url->build('/') ?>dealer/regionalsearch/">
                            <div><i class="icon-wpforms"></i>Regional Suppliers</div></a>
                </div>
            </div>
        </div> -->
    <div class="col-12 p-0">
        <div class="card">
            <div class="card-body">

                <div class="col-8" id="slider">

                    <div class="row ">
                        <div class="col-12">
                            <h1 class="mb-0">Regional Suplier</h1>
                        </div>
                        <div class="col-4"></div>

                    </div>
                </div>
            </div>
        </div>

        <?php if (isset($q) && strlen($q)): ?>
            <div class="col-8" id="slider">
                <p style="font-size:25px;">We have found <strong style="color:#ff9900d9;">
                        <?= $total ?>
                    </strong> no. of supplier for your product - <span style="color:#ff9900d9;">
                        <?= $q ?>
                    </span>. </p>
            </div>
        <?php endif; ?>

        <?php if ($total > 0): ?>
            <table class="table">
                <thead>
                    <tr>
                        <th>Supplier</th>
                        <th>Product</th>
                        <th>City</th>
                        <th>Contact</th>
                        <th>
                            <a href="<?= $this->Url->build('/') ?>dealer/addproduct/buyer/<?= $seller_ids ?>">
                                Send RFQ(All)
                            </a>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($data as $row): ?>
                        <tr>
                            <td>
                                <?= h($row['company_name']) ?>
                            </td>
                            <td>
                                <?= h($row['product_name']) ?>
                            </td>
                            <td>
                                <?= h($row['cities']) ?>
                            </td>
                            <td>
                                <?= h($row['contact']) ?>
                            </td>
                            <td>
                                <a href="<?= $this->Url->build('/') ?>dealer/addproduct/buyer/<?= $row['id'] ?>">
                                    Send RFQ
                                </a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php endif ?>

    </div>



    <!-- <div class="col-9 p-0">
            <img src="<?= $this->Url->build('/') ?>img/base.png" style="float: right;width: 84%;">
        </div> -->
    </div>
</section>