<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\BuyerSellerUser $buyerSellerUser
 */
?>
<?= $this->Html->css('custom.css') ?>
<style>
    .button { background-color: #004B88 !important;}
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

                <div class="col-12" id="slider">
                    <?= $this->Form->create(null, ['url' => ['controller' => 'dealer', 'action' => 'search']]) ?>
                    <div class="row ">
                        <div class="col-12">
                            <h1 class="mb-1">Find The Right
                                <span style="color: lightcoral;">Supplier</span> Around You
                            </h1>
                        </div>
                        <div class="col-12"></div>

                        <div class="col-4">
                            <select name="type" id="" class="form-control" style="width: 100%;
        height: 48px;
        padding: 0px 40px 0px 15px;
        border: 1px solid #D4E7FE;
        border-radius: 5px;
        color: #002678;
        font-weight: 500;
        outline: none;
        margin: 4px 0px 0px 0px;
        font-family: inherit;
        font-size: inherit;
        line-height: inherit;
        box-sizing: border-box;
        outline-offset: 0px;
        text-rendering: auto;
        letter-spacing: normal;
        word-spacing: normal;
        text-transform: none;
        text-indent: 0px;
        text-shadow: none;
        display: inline-block;
        text-align: start;
        appearance: auto;
        -webkit-rtl-ordering: logical;
        cursor: text;
        background-color: field;">
                                <option value="category" <?= ($type == 'category') ? 'selected' : '' ?>>Category</option>
                                <option value="seller" <?= ($type == 'seller') ? 'selected' : '' ?>>Supplier</option>
                            </select>
                        </div>
                        <div class="col-4">
                            <input type="text" class="global" value="<?= $q ?>" name="q" id="search-blk"
                                placeholder="Search product ?" style="width: 100%;
                    height: 48px;               padding: 0px 0px 0px 15px;             border: 1px solid #D4E7FE;
                    border-radius: 5px;         color: #002678;                       font-weight: 500;
                    outline: none;              margin: 4px 0px 0px 0px;                font-family: inherit;
                    font-size: inherit;         line-height: inherit;                   box-sizing: border-box;
                    outline-offset: 0px;        text-rendering: auto;                   letter-spacing: normal;
                    word-spacing: normal;       text-transform: none;                   text-indent: 0px;
                    text-shadow: none;          display: inline-block;                  text-align: start;
                    appearance: auto;           -webkit-rtl-ordering: logical;          cursor: text;
                    background-color: field;">
                        </div>
                        <div class="col-3">
                            <button label="Search"
                                class="btn btn-info button button-rounded button-reveal button-large button-dirtygreen text-end"
                                type="submit" style=margin-top:15px>
                                <i class="icon-search"></i><span>Search</span>
                            </button>
                        </div>
                    </div>
                    </form>
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
            
        </div>

    </div>



    <!-- <div class="col-9 p-0">
            <img src="<?= $this->Url->build('/') ?>img/base.png" style="float: right;width: 84%;">
        </div> -->
    </div>
</section>