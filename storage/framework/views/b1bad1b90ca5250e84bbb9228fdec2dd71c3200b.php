<div class="card">
    <div class="card-header">
        <h4>Materiales</h4>
    </div>

    <div class="card-body">
        <table class="table" id="products_table">
            <thead>
            <tr>
                <th>Material</th>
                <th>Peso</th>
                <th></th>
            </tr>
            </thead>
            <tbody>
            <?php $__currentLoopData = $orderProducts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $orderProduct): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td>
                        <?php echo BootForm::select("orderProducts[".$index."][material_id]", false, $allMateriales, old("orderProducts[".$index."][material_id]"), ["wire:model"=>"orderProducts.".$index.".material_id", "required"=>true]);; ?>

                    </td>
                    <td>
                        <?php echo BootForm::text("orderProducts[".$index."][Intimark_peso_neto]", false, old("orderProducts[".$index."][Intimark_peso_neto]"), ["wire:model" => "orderProducts.".$index.".Intimark_peso_neto", "required"=>true]);; ?>

                    </td>
                    <td>
                        <a href="#" wire:click.prevent="removeProduct(<?php echo e($index); ?>)"><i class="tio-delete"></i></a>
                    </td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
        <div class="row">
            <div class="col-md-12">
                <button class="btn btn-sm btn-light"
                    wire:click.prevent="addProduct"><i class="tio-add"></i> Agregar material</button>
            </div>
        </div>
    </div>
</div>
<?php /**PATH C:\xampp\htdocs\sgd\resources\views\livewire\materialsalida.blade.php ENDPATH**/ ?>