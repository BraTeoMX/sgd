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
<?php $__env->startComponent('mail::button', ['url' =>  route('liberarPermiso2',$vac->folio_vac),'color' => 'primary',]); ?>
        Aceptar
    <?php if (isset($__componentOriginalb8f5c8a6ad1b73985c32a4b97acff83989288b9e)): ?>
<?php $component = $__componentOriginalb8f5c8a6ad1b73985c32a4b97acff83989288b9e; ?>
<?php unset($__componentOriginalb8f5c8a6ad1b73985c32a4b97acff83989288b9e); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?> 
</div>
<hr/>
<div>
<?php $__env->startComponent('mail::button', ['url' =>  route('denegarPermiso2',$vac->folio_vac),'color' => 'error',]); ?>
        Denegar
    <?php if (isset($__componentOriginalb8f5c8a6ad1b73985c32a4b97acff83989288b9e)): ?>
<?php $component = $__componentOriginalb8f5c8a6ad1b73985c32a4b97acff83989288b9e; ?>
<?php unset($__componentOriginalb8f5c8a6ad1b73985c32a4b97acff83989288b9e); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
    <!--<?php $__env->startComponent('mail::button', [
        'url' => url('http://127.0.0.1:8000/home'),
        'color' => 'primary',
    ]); ?>
        Ingresar
    <?php if (isset($__componentOriginalb8f5c8a6ad1b73985c32a4b97acff83989288b9e)): ?>
<?php $component = $__componentOriginalb8f5c8a6ad1b73985c32a4b97acff83989288b9e; ?>
<?php unset($__componentOriginalb8f5c8a6ad1b73985c32a4b97acff83989288b9e); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?> 

    -->


</div>
<hr/>
<?php if (isset($__componentOriginal2dab26517731ed1416679a121374450d5cff5e0d)): ?>
<?php $component = $__componentOriginal2dab26517731ed1416679a121374450d5cff5e0d; ?>
<?php unset($__componentOriginal2dab26517731ed1416679a121374450d5cff5e0d); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php /**PATH C:\xampp\htdocs\intimark\resources\views/mails/solicitudvacaciones.blade.php ENDPATH**/ ?>