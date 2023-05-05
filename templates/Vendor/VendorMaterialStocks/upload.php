<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\VendorMaterialStock $vendorMaterialStock
 */
?>
<div class="row">
    <div class="column-responsive column-80">
        <div class="vendorMaterialStocks form content">
            <?= $this->Form->create(['url' => ['action' => 'upload'],'type' => 'file']) ?>
            <fieldset>
                <legend><?= __('Upload Stocks') ?></legend>

                <div class="form-group">
                    <div class="input-group">
                      <div class="custom-file">
                      <?php
                    echo $this->Form->control('Upload Stocks', ['label' => false, 'type' => 'file', 'class' => 'custom-file-input', 'id' => 'exampleInputFile']);
                ?>
                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                      </div>
                      <div class="input-group-append">
                        <span class="input-group-text">Upload</span>
                      </div>
                    </div>
                  </div>
            </fieldset>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
