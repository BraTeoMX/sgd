<?php $__env->startSection('content'); ?>
<div class="row">   
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3>Materiales</h3>
            </div>
            <div class="card-body">
                <?php echo BootForm::open(['model' => $material, 'store' => 'material.store', 'update' => 'material.update', 'id'=>'form']); ?>

                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <?php echo BootForm::text('sku', 'SKU: ', old('sku'), ['width'=>'col-md-6','maxlength'=>'50']);; ?>

                    </div>
                </div>
                <div class="form-group">
                <?php echo BootForm::text('material', 'Descripción: *', old('material'), ['width'=>'col-md-6']);; ?>

                </div>
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <?php echo BootForm::select('tipo_material_id','Tipo: *' , $material->arregloTipoMaterial, old('tipo_material_id'),['width'=>'col-md-6']); ?>

                    </div>
                    <div class="col-lg-6 col-md-6">
                        <?php echo BootForm::select('unidad_medida_id','Unidad medida: *' , $material->arregloUnidadMedida, old('unidad_medida_id'),['width'=>'col-md-6']); ?>

                    </div>
                </div>
                <div class="form-group">
                <?php echo BootForm::text('clave', 'Clave: *', old('clave'), ['width'=>'col-md-6']);; ?>

                </div>
                <div class="row">                  
                    <div class="col-lg-2 col-md-2"><?php echo Bootform::checkboxElement('segregacion',' Segregación','1',old('segregacion'),false); ?></div>
                    <div class="col-lg-2 col-md-2"><?php echo Bootform::checkboxElement('destruccion',' Destrucción','1',old('destruccion'),false); ?></div>
                    <div class="col-lg-2 col-md-2"><?php echo Bootform::checkboxElement('venta',' Venta','1',old('venta'),false); ?></div>
                    <div class="col-lg-3 col-md-3"><?php echo Bootform::checkboxElement('disposicion_final',' Disposición final','1',old('disposicion_final'),false); ?></div>
                    <div class="col-lg-2 col-md-2"><?php echo Bootform::checkboxElement('merma',' Merma','1',old('merma'),false); ?></div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <?php echo Form::submit("Guardar", ["class" => "btn btn-primary mr-2"]);; ?>

                        <a href="<?php echo route('material.index'); ?>" class="btn btn-light">Cancelar</a>
                    </div>
                </div>
                <?php echo BootForm::close(); ?>

            </div>
        </div>
    </div>
</div> 
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\intimark\resources\views/materiales/form.blade.php ENDPATH**/ ?>