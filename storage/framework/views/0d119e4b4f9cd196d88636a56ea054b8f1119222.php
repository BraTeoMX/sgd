
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
                <h3>Calendario</h3>
            </div>
            <div class="card-body">
                <?php echo BootForm::open(['model' => $calendario, 'store' => 'calendario.store', 'update' => 'calendario.update', 'id'=>'form']); ?>

                    
                    <div class="row">
                        <?php if(isset($calendario->id)): ?>
                        <div class="col-lg-6 col-md-6">
                            <?php echo BootForm::text('id', 'ID: ', old('parametro'), ['width'=>'col-md-6','readonly']);; ?>

                        </div>
                        <?php else: ?>
                            
                        <?php endif; ?>
                    </div>
                    <div class="row">
                        <div class="col-lg-12 col-md-6">
                            <?php echo BootForm::text('detalle', 'Descripcion: *', old('descripcion'), ['width'=>'col-md-6']);; ?>

                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6 col-md-6">
                            <?php echo BootForm::date('fecha_calendario', 'Fecha: *', old('descripcion'), ['width'=>'col-md-6']);; ?>

                        </div>  
                   
                        <div class="col-lg-6 col-md-6">
                            <p>Modulo</p>
                            <select class='form-control' aria-label="Default select example" name="modulo" id="modulo">
                                <option value= 0 ><?php echo e('--SELECCIONE--'); ?></option>
                                <option value= 1 ><?php echo e('Vacaciones'); ?></option>
                                <option value= 2 ><?php echo e('Permisos'); ?></option>
                            </select>
                            <br>
                        </div>
                    </div>
                    <div class="row"> 
                        <div class="col-lg-6 col-md-6">
                            <p>Tipo de Nómina</p>
                            <select class='form-control' aria-label="Default select example" name="tipo_nomina" id="tipo_nomina">
                                <option value= 0 ><?php echo e('--SELECCIONE--'); ?></option>
                                <option value= 1 ><?php echo e('Semanal'); ?></option>
                                <option value= 2 ><?php echo e('Quincenal'); ?></option>
                                <option value= 3 ><?php echo e('Todas'); ?></option>
                            </select>
                            <br>
                        </div>
                        <div class="col-lg-6 col-md-6">
                            <p>Tipo de Día</p>
                            <select class='form-control' aria-label="Default select example" name="tipo" id="tipo">
                                <option value= 0 ><?php echo e('--SELECCIONE--'); ?></option>
                                <option value= 1 ><?php echo e('No Laborable'); ?></option>
                                <option value= 2 ><?php echo e('Reservado'); ?></option>
                                <option value= 3 ><?php echo e('Bloqueado'); ?></option>
                            </select>
                            <br>
                        </div>
                    </div>         
                                    
                    <div class="row">  
                        <div class="col-lg-12 col-md-6">                                      
                            <?php echo Form::submit("Guardar", ["class" => "btn btn-success mr-2"]);; ?>

                            <a href="<?php echo route('calendario.index'); ?>" class="btn btn-light">Cancelar</a>
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
<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\sgd\resources\views\calendario\form.blade.php ENDPATH**/ ?>