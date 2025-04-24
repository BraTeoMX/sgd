

<?php $__env->startSection('styleBFile'); ?>

<!-- Color Box -->
<link href="<?php echo e(asset('colorbox/colorbox.css')); ?>" rel="stylesheet">

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <?php
        $i=0;
    ?>
    <?php $__empty_1 = true; $__currentLoopData = $vacaciones; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $vacacion): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
        <h2>Liberar vacaciones de: <?php echo $vacacion->No_Empleado; ?> </h2>
        <?php
            $i++;
        ?>
        <div class="row">    
            <div class="col-md-2">                                
                <?php echo BootForm::text('nombre', 'Folio: *', $vacacion->folio_vac, ['width'=>'col-md-6','readonly']);; ?>

            </div>
            <div class="col-md-2">                                
                <?php echo BootForm::text('turno', 'Fecha: *', $vacacion->fecha_solicitud, ['width'=>'col-md-3','readonly']);; ?>

            </div>
            <div class="col-md-2">                                
                <?php echo BootForm::text('area', 'Inicio Vacaciones : *', $vacacion->fech_ini_vac, ['width'=>'col-md-3','readonly']);; ?>

            </div>
            <div class="col-md-2">                                
                <?php echo BootForm::text('frecuencia', 'Fin Vacaciones: *', $vacacion->fech_fin_vac, ['width'=>'col-md-3','readonly']);; ?>

            </div>
            <div class="col-md-4">                                
                <?php echo BootForm::text('dias_disponibles', 'Nombre: *', $vacacion->fk_no_empleado.' '.$vacacion->Ap_Pat.' '.$vacacion->Ap_Mat, ['width'=>'col-md-3','readonly']);; ?>

            </div>
            <div class="col-md-2">                                
                <?php echo BootForm::text('dias_disponibles', 'Puesto: *', $vacacion->Puesto, ['width'=>'col-md-3','readonly']);; ?>

            </div>
            <div class="col-md-2">                                
                <?php echo BootForm::text('dias_disponibles', 'Departamento: *', $vacacion->Departamento, ['width'=>'col-md-3','readonly']);; ?>

            </div>
        </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
    <?php endif; ?>
    <div class="raw">
        <div class="col center">
            <a class="btn btn-success" href="<?php echo route('vacaciones.liberarPermiso',$vacacion->folio_vac); ?>">LIBERAR VACACIONES</a>
        </div>        
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\sgd\resources\views\vacaciones\liberar.blade.php ENDPATH**/ ?>