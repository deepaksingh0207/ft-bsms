<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\VendorMaterialStock[]|\Cake\Collection\CollectionInterface $vendorMaterialStocks
 */
?>
<div class="vendorMaterialStocks index content card">

    <div class="vendorMaterialStocks form content col-5">
        <?= $this->Form->create(null, ['url' => ['action' => 'upload'],'type' => 'file']) ?>
            <fieldset>
                <legend><?= __('Upload Stocks') ?></legend>

                <div class="form-group">
                    <div class="input-group">
                      <div class="custom-file">
                      <?php echo $this->Form->control('Upload Stocks', ['label' => false, 'accept'=>".xls,.xlsx", 'type' => 'file', 'class' => 'custom-file-input', 'id' => 'exampleInputFile']); ?>
                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                      </div>
                      <?= $this->Form->button(__('Upload'), ['class' => 'btn btn-info']) ?>
                    </div>
                  </div>
            </fieldset>
            <?= $this->Form->end() ?>
        </div>

    <div class="card-header">
        <h3 class="card-title">Material Stock List</h3>
        
    </div>

    <div class="card-body">
        <div class="table-responsive">
        <table class="table table-hover" id="example1">
            <thead>
                <tr>
                    <th><?= h('Part Code') ?></th>
                    <th><?= h('Part Description') ?></th>
                    <th><?= h('Current Stock') ?></th>
                    <th><?= h('In-Production Stock') ?></th>
                    <th><?= h('Added Date') ?></th>
                    <th><?= h('Updated Date') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($vendorMaterialStocks as $vendorMaterialStock): ?>
                <tr>
                    <td><?= h($vendorMaterialStock->part_code) ?></td>
                    <td><?= h($vendorMaterialStock->material_desc) ?></td>
                    <td><?= $this->Number->format($vendorMaterialStock->current_stock) ?></td>
                    <td><?= $this->Number->format($vendorMaterialStock->production_stock) ?></td>
                    <td><?= h($vendorMaterialStock->added_date) ?></td>
                    <td><?= h($vendorMaterialStock->updated_date) ?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
                </div>
</div>


<script>
    $(document).ready(function() { 
        $("#example1").DataTable({
            "paging": true,
            "responsive": true, "lengthChange": false, "autoWidth": false, "searching" :true,
            "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
     });
</script>
