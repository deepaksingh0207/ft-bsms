<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\BuyerSellerUser $buyerSellerUser
 */
?>
<style>
    .table tbody td { padding: 0.25rem 1.5rem !important;}

    .table td, .table th { border-top: 1px solid #f4f4f4 !important;}

  .table tbody tr:hover {
    background-color: #f4f4f4 !important;
  }

  .table tbody tr {
  transition: background-color .5s ease !important;
}

  .card-header h3,.card-header h4,.card-header h5,.card-header h6, .card-header h1, .card-header h2 { color: #004B88 !important;}

  .table thead th { color: #004B88 !important;}

  .btn-info { background-color: #004B88 !important;}

  .actions a { color: #fff !important; background-color: #004B88 !important; padding: 5px 14px !important; border-radius: 4px !important; font-size: .85rem !important; text-transform: uppercase;}
</style>
<section id="content">
    <div>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <div class="col-6"><h4 class="mb-0">RFQ List - Pending</h4></div>
                    <div class="col-6">
                    <?= $this->Form->create() ?>
                        <div class="row justify-content-end" id="RFQ0">
                            <div class="col-6 float-right">
                                <?= $this->Form->control('product_id', array('type' => 'select', 'options' => $products, 'empty' => 'Select', 'class' => 'form-control product', 'label' => false)); ?>
                            </div>
                            <div class="col-2 float-right">
                                <button class="btn btn-info mb-0" type="submit">Search</button>
                            </div>
                        </div>
                    
                    
                        <?= $this->Form->end() ?>
                    </div>
                </div>
                <div class="card-body">
                <?php if(count($rfqDetails)) : ?>
                  <table class="table">
                      <thead>
                          <tr>
                              
                              <th><?= h('Image') ?></th>
                              <th><?= h('Rfq No.') ?></th>
                              <th><?= h('Category') ?></th>
                              <th><?= h('Part Name') ?></th>
                              <th><?= h('Make') ?></th>
                              <th><?= h('UOM') ?></th>
                              <th><?= h('Remark') ?></th>

                              <th class="actions"><?= __('Actions') ?></th>
                          </tr>
                      </thead>
                      <tbody>
                      <?php foreach($rfqDetails as $key => $val) : ?>
                      <?php $attrParams = json_decode($val->attribute_data, true); ?>
                          <tr>
                              
                              <td><img src="<?= $this->Url->build('/') . $val['image']?>" width="25px" style=""></td>
                              <td><?=$val['rfq_no']?></td>
                              <td><?=$val['product']->name?></td>
                              <td><?=$val['part_name']?></td>
                              <td><?=$val['make']?></td>
                              <td><?=$val['uom']->description?></td>
                              <td><?=$val['remarks']?></td>

                              
                              
                              <td class="actions">
                                <a href="<?= $this->Url->build('/') ?>dealer/view/<?=$val['id']?>" class="btn btn-info w-100 pale">View</a>
                              </td>
                          </tr>
                          <?php endforeach; ?>
                      </tbody>
                  </table>
        </div>
        <?php else: ?>
        <h6>No pending RFQ data </h6>
        <?php endif;?>
                </div>
            </div>
        </div>
            

    </div>


    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                        <h4 class="mb-0">RFQ List - Responded</h4>
                </div>
                <div class="card-body">
                <table class="table">
                      <thead>
                          <tr>
                              
                              <th><?= h('Image') ?></th>
                              <th><?= h('Rfq No.') ?></th>
                              <th><?= h('Category') ?></th>
                              <th><?= h('Part Name') ?></th>
                              <th><?= h('Make') ?></th>
                              <th><?= h('UOM') ?></th>
                              <th><?= h('Remark') ?></th>

                              <th class="actions"><?= __('Actions') ?></th>
                          </tr>
                      </thead>
                      <tbody>
                      <?php foreach($rfqRespondedDetails as $key => $val) : ?>
                      <?php $attrParams = json_decode($val->attribute_data, true); ?>
                          <tr>
                              
                              <td><img src="<?= $this->Url->build('/') . $val['image']?>" width="25px" style=""></td>
                              <td><?=$val['rfq_no']?></td>
                              <td><?=$val['product']->name?></td>
                              <td><?=$val['part_name']?></td>
                              <td><?=$val['make']?></td>
                              <td><?=$val['uom']->description?></td>
                              <td><?=$val['remarks']?></td>

                              
                              
                              <td class="actions">
                                <a href="<?= $this->Url->build('/') ?>dealer/view/<?=$val['id']?>" class="btn btn-info w-100 pale">View</a>
                              </td>
                          </tr>
                          <?php endforeach; ?>
                      </tbody>
                  </table>
                </div>
            </div>
        </div>
        </div>
    </div>

    
       
    </div>
</section>