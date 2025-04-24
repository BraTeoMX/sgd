<?php $__currentLoopData = $vacaciones; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $vac): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<?php $__env->startComponent('mail::message'); ?>
<b>Estimado Colaborador:</b>
<p>Te informamos que existe una nueva solicitud de vacaciones:</p>
<p>Folio : </p> <b><?php echo e($vac->folio_vac); ?></b>
<p>Solicitante : </p><b><?php echo e($vac->Nom_Emp.' '.$vac->Ap_Pat.' '.$vac->Ap_Mat); ?></b>
<p>Periodo : </p><b><?php echo e($vac->fech_ini_vac.' al '.$vac->fech_fin_vac); ?> </b>
<p>Solicitamos de la manera más atenta, ingrese al sistema para aprobar o denegar dicha solicitud.</p>
    <p>! Saludos cordiales ¡</p>

<div>
       <?php $__env->startComponent('mail::button', ['url' =>  url('https://padbee.cloudjinx.com/hooks/1/timeoff?id='.$vac->folio_vac.'&action=APLICADO'),'color' => 'primary',]); ?>
                Aceptar
            <?php if (isset($__componentOriginalb8f5c8a6ad1b73985c32a4b97acff83989288b9e)): ?>
<?php $component = $__componentOriginalb8f5c8a6ad1b73985c32a4b97acff83989288b9e; ?>
<?php unset($__componentOriginalb8f5c8a6ad1b73985c32a4b97acff83989288b9e); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>

</div>
<hr/>
<br>
<div>
        <?php $__env->startComponent('mail::button', ['url' =>  url('https://padbee.cloudjinx.com/hooks/1/timeoff?id='.$vac->folio_vac.'&action=DENEGADO'),'color' => 'error',]); ?>
                Denegar
            <?php if (isset($__componentOriginalb8f5c8a6ad1b73985c32a4b97acff83989288b9e)): ?>
<?php $component = $__componentOriginalb8f5c8a6ad1b73985c32a4b97acff83989288b9e; ?>
<?php unset($__componentOriginalb8f5c8a6ad1b73985c32a4b97acff83989288b9e); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>




</div>
<hr/>
<?php if (isset($__componentOriginal2dab26517731ed1416679a121374450d5cff5e0d)): ?>
<?php $component = $__componentOriginal2dab26517731ed1416679a121374450d5cff5e0d; ?>
<?php unset($__componentOriginal2dab26517731ed1416679a121374450d5cff5e0d); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <script>
            var msg = '<?php echo e(Session::get('alert')); ?>';
            var exist = '<?php echo e(Session::has('alert')); ?>';
            if(exist){
              alert(msg);
            }
          </script>
<?php /**PATH C:\xampp\htdocs\sgd\resources\views\mails\solicitudvacacionesVP.blade.php ENDPATH**/ ?>