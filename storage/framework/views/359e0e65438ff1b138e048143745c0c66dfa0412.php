<?php $__env->startSection('styleBFile'); ?>
    <!-- Color Box -->
    <link href="<?php echo e(asset('colorbox/colorbox.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('materialfront/assets/vendor/select2/dist/css/select2.min.css')); ?>" rel="stylesheet">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="card">
        <div class="card-header">
            <h3>Registro de usuario</h3>
        </div>
        <div class="card-body">
            <?php echo BootForm::open(['model' => $usuario, 'store' => 'usuario.store', 'update' => 'usuario.update', 'id'=>'form']); ?>

            <div class="row">
                <div class="col-lg-6 col-md-6">
                    <?php echo BootForm::text('name', 'Nombre:', old('name'), ['maxlength'=>'200']); ?>

                </div>
                <div class="col-lg-6 col-md-6">
                <?php echo BootForm::text('no_empleado', 'Número de Empleado:', old('no_empleado'), ['maxlength'=>'50']); ?>

                </div>
            </div>
            <div class="row">
                <div class="col-lg-6 col-md-6">
                    <?php echo BootForm::email("email", "Correo electrónico:", old("email"), ['maxlength'=>'200']);; ?>

                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <?php echo BootForm::text('puesto', 'Puesto:', old('puesto'), ['maxlength'=>'200']); ?>

                </div>
            </div>
            <?php
                $values = ($usuario->exists) ? $usuario->roles->pluck('name')->toArray() : [];
                $values = (filled($values)) ? $values : [];
            ?>
           <div class="row">
                <div class="col-md-12">
                    <?php echo BootForm::checkboxes('rol[]', 'Rol(es): *', $roles, old('rol', $values),false, ["class"=>'i-checks']); ?>

                </div>
            </div>
                    
            <?php if($usuario->exists): ?>
                <div class="row">
                    <div class="col-md-12">
                        <?php echo BootForm::label("inactivo", "Desactivar cuenta:");; ?>

                        <?php echo BootForm::checkboxElement("inactivo", false, 'X', old('inactivo'), false, ["class"=>'i-checks']);; ?>

                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <?php echo BootForm::label("fecha_ultimo_acceso", "Fecha de último acceso:");; ?>

                        <?php echo e(optional($usuario->fecha_ultimo_acceso)->format('d/m/Y')); ?>

                    </div>
                    <div class="col-lg-6 col-md-6">
                        <?php echo BootForm::label("fecha_ultima_notificacion", "Fecha de envio de correo electrónico:");; ?>

                        <?php echo e(optional($usuario->fecha_ultima_notificacion)->format('d/m/Y')); ?>

                    </div>
                </div>
            <?php endif; ?>
                
            <div class="row">
                <div class="col-md-12 text-left">
                    <button type="submit" name="enviar" value="usuario" class="btn btn-primary">Guardar</button>
                    <a href="<?php echo route('usuario.index'); ?>" class="btn btn-light">Cancelar</a>
                </div>
            </div>
            <?php echo BootForm::close(); ?>

        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('scriptBFile'); ?>
<script src="<?php echo e(asset('vendor/jsvalidation/js/jsvalidation.js')); ?>"></script>
<script type="text/javascript" src="<?php echo e(asset('colorbox/jquery.colorbox-min.js')); ?>"></script>
<script src="<?php echo e(asset('materialfront/assets/vendor/select2/dist/js/select2.full.min.js')); ?>"></script>
<script src="<?php echo e(asset('materialfront/assets/vendor/select2/dist/js/select2.js')); ?>"></script>
<script>
  $(document).ready(function() {
    //$.validator.setDefaults({ ignore: ":hidden:not(.chosen-select)" })
    $('.js-select2-custom').each(function () {
            var select2 = $.HSCore.components.HSSelect2.init($(this));
        });
  });
</script>
<?php echo $validator; ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\xampp1\htdocs\intimark_sgd\resources\views/usuarios/form.blade.php ENDPATH**/ ?>