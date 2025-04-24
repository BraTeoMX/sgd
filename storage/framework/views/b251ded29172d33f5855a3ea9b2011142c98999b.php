<?php $__env->startSection('styleBFile'); ?>
<!-- Color Box -->
<link href="<?php echo e(asset('colorbox/colorbox.css')); ?>" rel="stylesheet">
<link href="<?php echo e(asset('materialfront/assets/vendor/select2/dist/css/select2.min.css')); ?>" rel="stylesheet">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<div class="row">   
    <div class="col-12">
        <div class="card">
            <div class="card-header"> 
                <h3>Puestos</h3>
            </div>
            <div class="card-body">
                <?php echo BootForm::open(['model' => $puesto, 'store' => 'puestos.store', 'update' => 'puestos.update', 'id'=>'form']); ?>

                    <div class="row">
                        <div class="col-lg-6 col-md-6">
                            <?php echo BootForm::text('puesto', 'Puesto: ', old('puesto'), ['width'=>'col-md-6']);; ?>

                        </div>
                    </div>  
                    <div class="row">
                        <div class="col-lg-6 col-md-6">
                            <?php echo BootForm::text('id_planta', 'Planta: *', old('Id_Planta'), ['width'=>'col-md-6']);; ?>

                        </div>  
                        <div class="col-lg-6 col-md-6">
                        <?php echo BootForm::text('nivel', 'Nivel: *', old('nivel'), ['width'=>'col-md-6']);; ?>

                        </div>
                    </div> 
                    
                    <div class="row">  
                        <div class="col-md-12">                                      
                            <?php echo Form::submit("Guardar", ["class" => "btn btn-success mr-2"]);; ?>

                            <a href="<?php echo route('puestos.index'); ?>" class="btn btn-light">Cancelar</a>
                        </div>
                    </div>
                <?php echo BootForm::close(); ?>

            </div>
        </div>
    </div>
</div> 
<?php $__env->stopSection(); ?>
<?php $__env->startSection('scriptBFile'); ?>
<script type="text/javascript" src="<?php echo e(asset('colorbox/jquery.colorbox-min.js')); ?>"></script>
<script src="<?php echo e(asset('materialfront/assets/vendor/select2/dist/js/select2.full.min.js')); ?>"></script>
<script src="<?php echo e(asset('materialfront/assets/vendor/select2/dist/js/select2.js')); ?>"></script>
<script>
    var attributeValues = [];
    $(document).ready(function() {
         
             
        $('.js-select2-custom').each(function () {
            var select2 = $.HSCore.components.HSSelect2.init($(this));
        });
    });


</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\intimark\resources\views/puestos/form.blade.php ENDPATH**/ ?>