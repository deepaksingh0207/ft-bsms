<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\BuyerSellerUser $buyerSellerUser
 */
?>

<style>
  /* .table td,
  .table th {
    text-align: start
  } */

  /* .products-list>.item {
    padding: 1px; 
  } */

  .table tbody td {
    padding: 0.25rem 1.5rem !important;
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

  /* .card-header {
    padding: 0.25rem.0rem;
    margin-left: 10px;
    margin-top: 5px
  } */

  .product-title {
    color: black;
  }



  .badge-warning {
    color: black;
    background-Color: lightgrey
  }

  /* .main-footer {
    padding: 0rem;
    margin-top: 25px
  } */

  /* .mt-4,
  .my-4 {
    margin-top: 0.5rem !important
  } */



  .card-title {
    /* font-size: 0.9rem; */
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
    padding-top: .85rem !important;
    padding-bottom: .25rem !important;
  }

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

  <div class="row mt-3">

    <div class="col-sm-12 col-lg-3">
      <div class="card">
        <div class="card-header">
          <h1 class="card-title">RFQ</h1>
        </div>
        <!-- /.card-header -->
        <div class="card-body p-0">
          <ul class="products-list product-list-in-card p-2">

            <li class="item pt-1">
              <div class="product-img mr-2">
                <img src="<?= $this->Url->build('/') ?>img/abf.png" alt="Product Image"
                  style="width: 2vw;height: auto;">
              </div>
              <div class="product-info" style="font-size: smaller;">
                <a href="javascript:void(0)" class="product-title">Total RFQ
                  <span class="badge badge-warning float-right">
                    <?= $totalRfq ?>
                  </span></a>
              </div>
            </li>
            <li class="item pt-1">
              <div class="product-img mr-2">
                <img src="<?= $this->Url->build('/') ?>img/abf.png" alt="Product Image"
                  style="width: 2vw;height: auto;">
              </div>
              <div class="product-info" style="font-size: smaller;">
                <a href="javascript:void(0)" class="product-title">RFQ Responded
                  <span class="badge badge-warning float-right">
                    <?= $rfqResponded ?>
                  </span></a>
              </div>
            </li>

          </ul>
        </div>
      </div>

    </div>

    <div class="col-sm-12 col-lg-3">
      <div class="card">
        <div class="card-header">
          <h1 class="card-title">RFQ Values Category Wise</h1>


        </div>
        <!-- /.card-header -->
        <div class="card-body p-0">
          <ul class="products-list product-list-in-card pl-2 pr-2">

            <?php
            $totalValues = 0.0;
            foreach ($rfqValuesByCategory as $cat => $values):
              $totalValues = $totalValues + $values;
              ?>
              <li class="item">
                <div class="product-img mr-2">
                  <img src="<?= $this->Url->build('/') ?>img/abf.png" alt="Product Image"
                    style="width: 2vw;height: auto;">
                </div>
                <div class="product-info" style="font-size: smaller;">
                  <a href="javascript:void(0)" class="product-title">
                    <?= $cat ?>
                    <span class="badge badge-warning float-right">
                      <?= $values ?>
                    </span>
                  </a>
                </div>
              </li>
            <?php endforeach; ?>
            <li class="item">
              <div class="product-img mr-2">
                <img src="<?= $this->Url->build('/') ?>img/abf.png" alt="Product Image"
                  style="width: 2vw;height: auto;">
              </div>
              <div class="product-info" style="font-size: smaller;">
                <a href="javascript:void(0)" class="product-title">Total Value
                  <span class="badge badge-warning float-right">
                    <?= $totalValues ?>
                  </span></a>
              </div>
            </li>
          </ul>
        </div>
      </div>

    </div>

  </div>
  </div>
  <div class="row m-1">
    <div class="col-sm-12 col-lg-6">
      <div class="card card-default">
        <div class="card-header">
          <h3 class="card-title">RFQs Category wise</h3>


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

  </div>

  <div class="col-lg-12">
    <div class="card">
      <div class="card-header">
        <h4>RFQ List</h4>
      </div>
      <div class="card-body">
        <table class="table">
          <thead>
            <tr>

              <th>
                <?= h('Image') ?>
              </th>
              <th>
                <?= h('Rfq No.') ?>
              </th>
              <th>
                <?= h('Category') ?>
              </th>
              <th>
                <?= h('Part Name') ?>
              </th>
              <th>
                <?= h('Make') ?>
              </th>
              <th>
                <?= h('UOM') ?>
              </th>
              <th>
                <?= h('Remark') ?>
              </th>

              <th class="actions">
                <?= __('Actions') ?>
              </th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($rfqDetails as $key => $val): ?>
              <?php $attrParams = json_decode($val->attribute_data, true); ?>
              <tr>

                <td><img src="<?= $this->Url->build('/') . $val['image'] ?>" width="25px" style=""></td>
                <td>
                  <?= $val['rfq_no'] ?>
                </td>
                <td>
                  <?= $val['product']->name ?>
                </td>
                <td>
                  <?= $val['part_name'] ?>
                </td>
                <td>
                  <?= $val['make'] ?>
                </td>
                <td>
                  <?= $val['uom']->description ?>
                </td>
                <td>
                  <?= $val['remarks'] ?>
                </td>



                <td class="actions">
                  <a href="<?= $this->Url->build('/') ?>dealer/view/<?= $val['id'] ?>"
                    class="btn btn-info w-100 pale">View</a>
                </td>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
  </div>

</section>

<?php
$cat = array();
$catCount = array();
$color = array();
foreach ($countByProducts as $catI => $count) {
  array_push($cat, $catI);
  array_push($catCount, $count);
  array_push($color, "#" . random_color());
}

function random_color_part()
{
  return str_pad(dechex(mt_rand(0, 255)), 2, '0', STR_PAD_LEFT);
}

function random_color()
{
  return random_color_part() . random_color_part() . random_color_part();
}


$cat = implode("','", $cat);
$catCount = implode(',', $catCount);
$color = implode("','", $color);

//print_r($cat); exit;
?>
<script src="<?= $this->Url->build('/') ?>js/chart.js"></script>
<script>

  showDoughnutChart();

  function showDoughnutChart() {

    var name = ['<?= $cat ?>'];
    var count = [<?= $catCount ?>];
    var bgColor = ['<?= $color ?>'];


    var chartdata = {
      labels: name,
      datasets: [
        {
          label: 'RFQ',
          backgroundColor: bgColor,
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
  }


</script>