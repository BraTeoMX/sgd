<?php $__currentLoopData = $incapacidad; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $per): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <?php $__env->startComponent('mail::message'); ?>
        <b>Estimado (a) colaborador (a).</b>
        <div>
            <p>El presente correo es para informarte que el colaborador numero <b><?php echo e($per->fk_empleado); ?></b> tiene una
                incapacidad de <b><?php echo e($per->dias); ?></b> dias, iniciando en dia <b><?php echo e($per->fecha_inicio); ?></b>
            <p>! Saludos Cordiales !</p>
        </div>
    <?php if (isset($__componentOriginal2dab26517731ed1416679a121374450d5cff5e0d)): ?>
<?php $component = $__componentOriginal2dab26517731ed1416679a121374450d5cff5e0d; ?>
<?php unset($__componentOriginal2dab26517731ed1416679a121374450d5cff5e0d); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php break; ?>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php /**PATH C:\xampp\htdocs\sgd\resources\views\mails\incapacidadregistrada.blade.php ENDPATH**/ ?>