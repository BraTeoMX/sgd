
<?php $__env->startComponent('mail::message'); ?>
<!--<b>Estimado (a) <?php echo e($user->name); ?>:</b>-->
<b>Estimado (a) colaborador:</b>
<p>Te recordamos que el uso del sistema es apartir del proximo 21 de marzo del 2023.</p>
<p>Para iniciar tu registro, favor de dar clic en el siguiente botón.</p>

<div>
    <?php $__env->startComponent('mail::button', [
        'url' => url(route('usuario.setpassword', $user, false)),
        'color' => 'primary',
    ]); ?>
        Ingresar
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
<?php /**PATH E:\xampp1\htdocs\intimark_sgd\resources\views/mails/registrousuario.blade.php ENDPATH**/ ?>