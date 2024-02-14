<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\BuyerSellerUser $buyerSellerUser
 */
?>

<style>
  /* .table td,
  .table th {
    text-align: center
  } */

  /* .products-list>.item {
    padding: 1px;
  } */

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


  .table tbody td {
    padding: 0.75rem 1.5rem !important;
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
    padding: 0rem
  }
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
                            <div><i class="icon-wpforms"></i>earch Suppliers</div></a>
                            <a class="menu-link" href="<?= $this->Url->build('/') ?>dealer/regionalsearch/">
                            <div><i class="icon-wpforms"></i>Regional Suppliers</div></a>
                </div>
            </div>
        </div> -->
  <div class="row mt-4">
    <!-- <div class="col-sm-12 col-lg-3">
    <div class="card mb-2" style="border-radius:1rem;">

      <div class="card-header p-3 pt-2">
        <div
          class="icon icon-lg icon-shape bg-gradient-dark shadow-dark shadow text-center border-radius-xl mt-n4 position-absolute">
          <i class="material-icons opacity-10">shopping_cart</i>
        </div>
        <div class="text-end pt-1">
          <h1 class="text-sm mb-0 text-capitalize"><b>Purchase Orders</b></h1>
          <h4 class="mb-0">
            1          </h4>
        </div>
      </div>

      <hr class="dark horizontal my-0">
      <div class="card-footer p-3">
        <button type="button" class="button">
          <a href="/buyer/purchase-orders" style="color:white;">More Info!</a>
        </button>

      </div>
    </div>
  </div> -->

    <div class="col-sm-12 col-lg-3">
      <div class="card">
        <div class="card-header">
          <h1 class="card-title">RFQs</h1>


        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <ul class="products-list product-list-in-card pl-2 pr-2">
            <?php foreach ($rfqTotals as $status => $count): ?>
              <li class="item">
                <div class="product-img mr-2">
                  <img src="<?= $this->Url->build('/') ?>img/abf.png" alt="Product Image"
                    style="width: 2vw;height: auto;">
                </div>
                <div class="product-info" style="font-size: smaller;">
                  <a href="javascript:void(0)" class="product-title">
                    <?= ucfirst($status) ?>
                    <span class="badge badge-warning float-right">
                      <?= $count ?>
                    </span>
                  </a>
                </div>
              </li>
            <?php endforeach; ?>
          </ul>
        </div>
      </div>

    </div>


    <div class="col-sm-12 col-lg-3">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Supplier</h3>


        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <ul class="products-list product-list-in-card pl-2 pr-2">
            <?php foreach ($supplierCount as $status => $count): ?>
              <li class="item">
                <div class="product-img mr-2">
                  <img src="<?= $this->Url->build('/') ?>/img/edi.png" alt="Product Image" class=""
                    style="width: 2vw;height: auto;">
                </div>
                <div class="product-info" style="font-size: smaller;">
                  <a href="javascript:void(0)" class="product-title">
                    <?= $status ?>
                    <span class="badge badge-warning float-right">
                      <?= $count ?>
                    </span>
                  </a>
                  <span class="product-description">

                  </span>
                </div>
              </li>
            <?php endforeach ?>
            <!-- /.item -->
          </ul>
        </div>
        <!-- /.card-body -->

        <!-- /.card-footer -->
      </div>
      <!-- <div class="card mb-2" style="border-radius:1rem;">

      <div class="card-header p-3 pt-2">
        <div
          class="icon icon-lg icon-shape bg-gradient-dark shadow-dark shadow text-center border-radius-xl mt-n4 position-absolute">
          <i class="material-icons opacity-10">shopping_cart</i>
        </div>
        <div class="text-end pt-1">
          <h1 class="text-sm mb-0 text-capitalize"><b>Purchase Orders</b></h1>
          <h4 class="mb-0">
            1          </h4>
        </div> -->
    </div>


  </div>
  </div>
  <div class="row mx-1">
    <div class="col-sm-12 col-lg-6">
      <div class="card card-default">
        <div class="card-header">
          <h3 class="card-title">RFQs</h3>


        </div>
        <div class="card-body">
          <div class="chartjs-size-monitor">
            <div class="chartjs-size-monitor-expand">
              <div class=""></div>
            </div>
            <div class="chartjs-size-monitor-shrink">
              <div class=""></div>
            </div>
          </div>
          <canvas id="donutChart"
            style="min-height: 200px; height: 150px; max-height: 200px; max-width: 100%; display: block; width: 487px;"
            width="487" height="200" class="chartjs-render-monitor"></canvas>
        </div>
        <!-- /.card-body -->
      </div>
    </div>

    <div class="col-sm-12 col-lg-6">

      <div class="card card-dafault">
        <div class="card-header">
          <h3 class="card-title">Responded RFQs</h3>


        </div>
        <div class="card-body">
          <div class="chart">
            <div class="chartjs-size-monitor">
              <div class="chartjs-size-monitor-expand">
                <div class=""></div>
              </div>
              <div class="chartjs-size-monitor-shrink">
                <div class=""></div>
              </div>
            </div>
            <canvas id="barChart"
              style="min-height: 200px; height: 250px; max-height: 200px; max-width: 100%; display: block; width: 200;"
              width="200" height="200" class="chartjs-render-monitor"></canvas>
          </div>
        </div>
        <!-- /.card-body -->
      </div>
    </div>


    <div class="col-12 p-0">
      <div class="card">
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
                  <?= h('Date Raised') ?>
                </th>
                <th>
                  <?= h('Supplier Reached') ?>
                </th>
                <th>
                  <?= h('Suppliers Responded') ?>
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
                    <?= h($rfqDetail->added_date) ?>
                  </td>
                  <td>
                    <?= $rfqDetail->RfqInquiries['reach'] ? h($rfqDetail->RfqInquiries['reach']) : 0 ?>
                  </td>
                  <td>
                    <?= $rfqDetail->RfqInquiries['respond'] ? h($rfqDetail->RfqInquiries['respond']) : 0 ?>
                  </td>



                  <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $rfqDetail->id]) ?>
                  </td>
                </tr>
              <?php endforeach; ?>
            </tbody>
          </table>
          <!-- <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <!-- <p><?= $this->Paginator->counter(__('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')) ?></p> -->
        </div>
        <br>
        <?php if (count($rfqsummary) > 0): ?>
          <table class="table">
            <thead>
              <tr>
                <th>RFQ No.</th>
                <th>Seller</th>
                <th>Min. Rate</th>
                <th>Respond Date</th>


              </tr>
            </thead>
            <tbody>
              <?php foreach ($rfqsummary as $rfq): ?>
                <tr>
                  <td>
                    <?= h($rfq['rfq_no']) ?>
                  </td>
                  <td>
                    <?= h($rfq['company_name']) ?>
                  </td>
                  <td>
                    <?= h($rfq['rate']) ?>
                  </td>
                  <td>
                    <?= h($rfq['created_date']) ?>
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

<script src="<?= $this->Url->build('/') ?>js/chart.js"></script>
<script>

  showDoughnutChart();
  showBarChart();

  function showDoughnutChart() {
    {
      $.get("../api/api/get-chart-data",
        function (data) {
          data = JSON.parse(data);
          var name = [];
          var count = [];
          var bgColor = [];


          for (var i in data) {
            console.log(data[i].bgcolor)
            name.push(data[i].label);
            count.push(data[i].total);
            bgColor.push(data[i].bgcolor);
          }

          var chartdata = {
            labels: name,
            datasets: [
              {
                label: 'RFQ',
                backgroundColor: ['#f56954', '#00a65a', '#f39c12',],
                data: count
              }
            ]
          };

          var graphTarget = $('#donutChart')
          var donutOptions = {
            maintainAspectRatio: false,
            responsive: true,
          }

          var graph = new Chart(graphTarget, {
            type: 'doughnut',
            data: chartdata,
            options: donutOptions
          });
        });
    }
  }


  function showBarChart() {
    {
      $.get("../api/api/get-rfq-respond",
        function (data) {
          console.log(data);
          data = JSON.parse(data);
          var rfq = [];
          var reach = [];
          var respond = [];


          rfq = data.label;
          reach = data.reach;
          respond = data.respond;

          var areaChartData = {
            labels: rfq,
            datasets: [
              {
                label: 'Reach',
                backgroundColor: 'rgba(60,141,188,0.9)',
                borderColor: 'rgba(60,141,188,0.8)',
                pointRadius: false,
                pointColor: '#3b8bba',
                pointStrokeColor: 'rgba(60,141,188,1)',
                pointHighlightFill: '#fff',
                pointHighlightStroke: 'rgba(60,141,188,1)',
                data: reach
              },
              {
                label: 'Responded',
                backgroundColor: 'rgba(210, 214, 222, 1)',
                borderColor: 'rgba(210, 214, 222, 1)',
                pointRadius: false,
                pointColor: 'rgba(210, 214, 222, 1)',
                pointStrokeColor: '#c1c7d1',
                pointHighlightFill: '#fff',
                pointHighlightStroke: 'rgba(220,220,220,1)',
                data: respond
              },
            ]
          }

          var barChartCanvas = $('#barChart');
          var barChartOptions = {
            responsive: true,
            maintainAspectRatio: false,
            datasetFill: false
          }

          var graph = new Chart(barChartCanvas, {
            type: 'bar',
            data: areaChartData,
            options: barChartOptions
          });
        });
    }
  }


</script>