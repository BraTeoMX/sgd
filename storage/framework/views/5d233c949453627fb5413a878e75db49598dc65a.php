<?php $__currentLoopData = $permisos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $per): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <?php $__env->startComponent('mail::message'); ?>
        <b>Estimado (a)  <?php echo e($per->Nom_Emp); ?>.</b>
        <div>
            <p>El presente correo es para informarte que tu solicitud de permiso con folio <b><?php echo e($per->folio_per); ?></b>, fue <b>APROBADA</b>.
            <p>Disfruta de tu permiso correspondiente al periodo <b><?php echo e($per->fech_ini_per); ?></b> al <b><?php echo e($per->fech_fin_per); ?></b>.</p>
            <b></b>
            <p>! Saludos Cordiales !</p>
                            
        
    <?php if (isset($__componentOriginal2dab26517731ed1416679a121374450d5cff5e0d)): ?>
<?php $component = $__componentOriginal2dab26517731ed1416679a121374450d5cff5e0d; ?>
<?php unset($__componentOriginal2dab26517731ed1416679a121374450d5cff5e0d); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php /**PATH E:\xampp1\htdocs\intimark_sgd\resources\views/mails/permisoaprobada.blade.php ENDPATH**/ ?>