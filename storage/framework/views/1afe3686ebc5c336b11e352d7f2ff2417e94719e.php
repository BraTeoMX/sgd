<?php $__currentLoopData = $permisos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $per): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <?php $__env->startComponent('mail::message'); ?>
        <b>Estimado (a)  <?php echo e($per->Nom_Emp); ?>.</b>
        <div>
         
            <b></b>
            <p>! Saludos Cordiales !</p>
                            
        
    <?php if (isset($__componentOriginal2dab26517731ed1416679a121374450d5cff5e0d)): ?>
<?php $component = $__componentOriginal2dab26517731ed1416679a121374450d5cff5e0d; ?>
<?php unset($__componentOriginal2dab26517731ed1416679a121374450d5cff5e0d); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php /**PATH E:\xampp1\htdocs\intimark_sgd\resources\views/mails/permisoaprobadaSM.blade.php ENDPATH**/ ?>