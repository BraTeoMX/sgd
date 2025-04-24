<?php $__currentLoopData = $vacaciones; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $vac): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <?php $__env->startComponent('mail::message'); ?>
        <b>Estimado (a)  <?php echo e($vac->Nom_Emp); ?>.</b>
        <div>
            <p>El presente correo es para informarte que tu solicitud de vacaciones con folio <b><?php echo e($vac->folio_vac); ?></b>, fue <b>APROBADA</b>.
            <p>Disfruta de tus vacaciones correspondientes al periodo <b><?php echo e($vac->fech_ini_vac); ?></b> al <b><?php echo e($vac->fech_fin_vac); ?></b>.</p>
            <b></b>
            <p>! Saludos Cordiales !</p>


    <?php if (isset($__componentOriginal2dab26517731ed1416679a121374450d5cff5e0d)): ?>
<?php $component = $__componentOriginal2dab26517731ed1416679a121374450d5cff5e0d; ?>
<?php unset($__componentOriginal2dab26517731ed1416679a121374450d5cff5e0d); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php /**PATH C:\xampp\htdocs\sgd\resources\views\mails\solicitudaprobada.blade.php ENDPATH**/ ?>