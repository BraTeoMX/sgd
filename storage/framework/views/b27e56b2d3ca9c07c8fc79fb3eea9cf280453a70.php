<?php $__currentLoopData = $permisos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $per): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <?php $__env->startComponent('mail::message'); ?>
        <b>Estimado Colaborador (a).</b>
        <div>
            <p>El presente correo es para informar que existe una solicitud de permiso por parte del Servicio Medico con folio <b><?php echo e($per->folio_per); ?></b>, de <b><?php echo e($per->Nom_Emp.' '.$per->Ap_Pat.' '.$per->Ap_Mat); ?></b>
            por el motivo de: <b><?php echo e($per->obs); ?></b> de fecha <b><?php echo e($per->fech_ini_per); ?></b> al <b><?php echo e($per->fech_fin_per); ?></b>.</p>
            <b></b>
            <p>Agradecemos darle seguimiento</p>
            <p>! Saludos Cordiales !</p>
                            
        
    <?php if (isset($__componentOriginal2dab26517731ed1416679a121374450d5cff5e0d)): ?>
<?php $component = $__componentOriginal2dab26517731ed1416679a121374450d5cff5e0d; ?>
<?php unset($__componentOriginal2dab26517731ed1416679a121374450d5cff5e0d); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php /**PATH C:\xampp\htdocs\sgd\resources\views\mails\permisoaprobadaSM.blade.php ENDPATH**/ ?>