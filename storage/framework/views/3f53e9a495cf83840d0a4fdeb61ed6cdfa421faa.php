
<?php $__env->startSection('content'); ?>
<div class="row">   
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3>Correos</h3>
            </div>
            <div class="card-body">
                

                <form action="<?php echo e(route('correo.store')); ?>" method="POST" >
                <?php echo csrf_field(); ?>
                <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                   
                                    <div class="form-group">
                                        <label for="puerto">Correo del Usuario </label>
                                        <input type="text" name="user" value="<?php echo e(env('MAIL_USERNAME')); ?>" class="form-control" placeholder="Ingrese correo">
                                    </div>
                                    <div class="form-group">
                                        <label for="puerto">Contraseña </label>
                                        <input type="text" name="password" value="<?php echo e(env('MAIL_PASSWORD')); ?>" class="form-control" placeholder="Ingrese contraseña">
                                    </div>
                                    <div class="form-group">
                                        <label for="host">Host de correo electronico</label>
                                        <input type="text" name="host" value="<?php echo e(env('MAIL_HOST')); ?>" class="form-control" placeholder="Ingrese host">
                                    </div>
                                    <div class="form-group">
                                        <label for="puerto">Puerto de correo electronico</label>
                                       <input type="text" name="port" value="<?php echo e(env('MAIL_PORT')); ?>" class="form-control" placeholder="Ingrese puerto">
                                    </div>
                                    <div class="form-group">
                                        <label for="encryption">Encriptacion </label>
                                        <?php echo Form::select('encryption', array('tls','ssl'),env('MAIL_ENCRYPTION'),['class' => 'form-control']);; ?>

                                    </div>
                                    <br>
                                    <button type="submit" class="btn btn-primary">Guardar</button>
                                </div>
                </form>
                <?php echo BootForm::close(); ?>

            </div>
        </div>
    </div>
</div> 
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scriptBFile'); ?>
<script>

</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\sgd\resources\views\correo\index.blade.php ENDPATH**/ ?>