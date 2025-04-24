<?php


    $ipaddress= \Request::ip();


echo "The user's IP address is - ".$ipaddress;
?>
<?php $__currentLoopData = $permisos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $per): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<?php $__env->startComponent('mail::message'); ?>
<b>Estimado Colaborador:</b>
<p>Te informamos que existe una nueva solicitud de permiso:</p>
<p>Folio : </p> <b><?php echo e($per->folio_per); ?></b>
<p>Tipo de Permiso : </p> <b><?php echo e($per->permiso); ?></b>
<p>Solicitante : </p><b><?php echo e($per->Nom_Emp.' '.$per->Ap_Pat.' '.$per->Ap_Mat); ?></b>
<p>Periodo : </p><b><?php echo e($per->fech_ini_per.' al '.$per->fech_fin_per); ?> </b>
<p>Solicitamos de la manera más atenta, su apoyo para aprobar o denegar dicha solicitud.</p>
    <p>! Saludos cordiales ¡</p>

<div>
<?php $__env->startComponent('mail::button', ['url' =>  url('https://padbee.cloudjinx.com/hooks/1/timeoff?id='.$per->folio_per.'&action=APLICADO'),'color' => 'primary',]); ?>
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
<?php $__env->startComponent('mail::button', ['url' =>  url('https://padbee.cloudjinx.com/hooks/1/timeoff?id='.$per->folio_per.'&action=DENEGADO'),'color' => 'error',]); ?>
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
<?php /**PATH E:\xampp1\htdocs\intimark_sgd\resources\views/mails/solicitudpermisos.blade.php ENDPATH**/ ?>