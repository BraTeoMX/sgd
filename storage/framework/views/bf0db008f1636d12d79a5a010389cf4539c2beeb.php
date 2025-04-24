
<?php $__env->startComponent('mail::message'); ?>
<b>Estimado Colaborador :</b>
<p>Te informamos que existe una nueva solicitud de vacaciones :</p>
<p>&nbps&nbps&nbps&nbps&nbpsFolio : </p>
<p>&nbps&nbps&nbps&nbps&nbpsEmpleado : </p>
<p>&nbps&nbps&nbps&nbps&nbpsPeriodo : </p>
<p>Por lo que se le solicita de la manera más atenta, ingrese al Sistema para aprobar o Declinar dicha solicitud. </p>
<p>! Saludos Cordiales¡.</p>

<div>
    <?php $__env->startComponent('mail::button', [
        'url' => url('http://127.0.0.1:8000/home'),
        'color' => 'primary',
    ]); ?>
        Sistema
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

<?php /**PATH C:\xampp\htdocs\intimark\resources\views/mails/respuestasolicitudvacaciones.blade.php ENDPATH**/ ?>