

<?php $__env->startSection('styleBFile'); ?>
    <!-- Color Box -->
    <link href="<?php echo e(asset('colorbox/colorbox.css')); ?>" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="card">
        <div class="card-header">
            <h3>Retardos</h3>
        </div>
        <body onload="myFunction()">
           
        </body>
    </div>
    <br>
    <div class="card">

    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scriptBFile'); ?>
<script>
    function myFunction() {
        window.location.href=("http://128.150.102.131:86/delay")

    }
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\sgd\resources\views\retardos\index.blade.php ENDPATH**/ ?>