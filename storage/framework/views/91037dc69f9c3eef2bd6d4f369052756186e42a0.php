<?php $__env->startSection('styleBFile'); ?>

<!-- Color Box -->
<link href="<?php echo e(asset('colorbox/colorbox.css')); ?>" rel="stylesheet">

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Autorización de Vacaciones</h3>
            </div>
            <?php echo Form::open(['route'=>'vacaciones.autorizar', 'method'=>'GET', 'files'=>TRUE ]); ?>

            <div>
                <input type="text" name="noEmpleado" placeholder="Numero de empleado">
            </div>
            <div>
                <input type="submit" value="Buscar" class="bt btn-primary">
            </div>
            <?php echo form::close(); ?>

        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\xampp1\htdocs\intimark_sgd\resources\views/vacaciones/form2.blade.php ENDPATH**/ ?>