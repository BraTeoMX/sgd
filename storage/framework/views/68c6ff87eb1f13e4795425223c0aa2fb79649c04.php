
 
<?php $__env->startComponent('mail::message'); ?>
<?php $__currentLoopData = $vacaciones; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $vac): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

    <?php if($vac->status=='APLICADO'): ?>
        Estimado (a) <?php echo e($vac->Nom_Emp); ?>:

        Bienvenido al Sistema Integral de Administración Intimark,  por medio del presente te informamos que tu solicitud de Vacaciones con número de folio <?php echo e($vac->folio_vac); ?>

        fue  APROBADA satisfactoriamente por lo que te deseamos que disfrutes tus vacaciones correspondientes al periodo del día <?php echo e($vac->fech_ini_vac); ?> al día <?php echo e($vac->fech_fin_vac); ?> .

        Saludos !! .
    <?php else: ?>
        <?php if($vac->status=='DECLINADO'): ?>
            Estimado (a) <?php echo e($vac->Nom_Emp); ?>:

            Bienvenido al Sistema Integral de Administración Intimark,  por medio del presente te informamos que tu solicitud de Vacaciones con número de folio <?php echo e($vac->folio_vac); ?>

            correspondientes al periodo del día <?php echo e($vac->fech_ini_vac); ?> al día <?php echo e($vac->fech_fin_vac); ?> fue  DECLINADA para mayor información consultarlo con el jefe inmediato

            Saludos !! .
        <?php else: ?>
            <?php if($vac->status=='CANCELADO'): ?>
                Estimado (a) <?php echo e($vac->Nom_Emp); ?>:

                Bienvenido al Sistema Integral de Administración Intimark,  por medio del presente te informamos que tu solicitud de Vacaciones con número de folio <?php echo e($vac->folio_vac); ?>

                correspondientes al periodo del día <?php echo e($vac->fech_ini_vac); ?> al día <?php echo e($vac->fech_fin_vac); ?> fue  CANCELADA por no recibir respuesta por parte del jefe inmediato,
                te pedimos que ingreses una nueva solicitud para solicitar las vacaciones nuevamente.

                Saludos !! .
            <?php else: ?>
                <?php if($vac->status=='ACTIVO'): ?>
                    Bienvenido al Sistema Integral de Administración Intimark,  por medio del presente le informamos que existe una nueva solicitud de vacaciones con número de folio <?php echo e($vac->folio_vac); ?>

                    correspondiente a <?php echo e($vac->Nom_Emp.' '.$vac->Ap_Pat.' '.$vac->Ap_Mat); ?> para disfrutar del periodo del día <?php echo e($vac->fech_ini_vac); ?> al día <?php echo e($vac->fech_fin_vac); ?>,
                    por lo que solicitamos de la manera más atenta, ingrese al sistema, con la finalidad de aprobar o declinar dicha solicitud.

                    Saludos !! .

                <?php endif; ?>    
            <?php endif; ?>    
        <?php endif; ?>
    <?php endif; ?>    
 <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


<hr/>
<?php if (isset($__componentOriginal2dab26517731ed1416679a121374450d5cff5e0d)): ?>
<?php $component = $__componentOriginal2dab26517731ed1416679a121374450d5cff5e0d; ?>
<?php unset($__componentOriginal2dab26517731ed1416679a121374450d5cff5e0d); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php /**PATH C:\xampp\htdocs\sgd\resources\views\mails\respuestasolicitudvacaciones.blade.php ENDPATH**/ ?>