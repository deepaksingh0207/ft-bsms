<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\BuyerSellerUser $buyerSellerUser
 */
?>
<section id="content">
    <div>

    <div class="row my-3">
            <div class="col-12">
            <?= $this->Form->create() ?>
            <div class="row" id="RFQ0">
                <div class="col-4">
                    <?= $this->Form->control('product_id', array('type' => 'select','options' => $products,'empty' => 'Select',  'class' => 'form-control product', 'label' => false )); ?>
                </div>
                <div class="col-4">
                    <button type="submit">Search</button>
                </div>
            </div>
            
            
            <?= $this->Form->end() ?>
            </div>
    </div>

    <div class="row my-3">
            <div class="col-12">
                <h2>RFQ List - Pending</h2>
            </div>
            <?php if(count($rfqDetails)) : ?>
            <div class="col-12 p-0">
              <div class="card">
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
               </div>
             </div>
        </div>
        <?php else: ?>
        <h6>No pending RFQ data </h6>
        <?php endif;?>

    </div>


    <div class="row my-3">
            <div class="col-12">
                <h2>RFQ List - Responded</h2>
            </div>
            <div class="col-12 p-0">
              <div class="card">
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