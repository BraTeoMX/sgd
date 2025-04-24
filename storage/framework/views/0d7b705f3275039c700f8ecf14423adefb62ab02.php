
<?php $__env->startSection('content'); ?>
<div class="row">   
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3>Base de Datos</h3>
            </div>
            <div class="card-body">
                

                <form action="<?php echo e(route('base.store')); ?>" method="POST">
                            <?php echo csrf_field(); ?>
                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <label for="host">Host</label>
                                        <input type="text" name="host" value="<?php echo e(env('DB_HOST')); ?>" class="form-control"
                                            placeholder="Ingrese host">
                                    </div>
                                    <div class="form-group">
                                        <label for="puerto">Puerto</label>
                                        <input type="text" name="port" value="<?php echo e(env('DB_PORT')); ?>" class="form-control"
                                            placeholder="Ingrese puerto">
                                    </div>
                                    <div class="form-group">
                                        <label for="bd">Base de datos</label>
                                        <input type="text" name="bd" value="<?php echo e(env('DB_DATABASE')); ?>"
                                            class="form-control" placeholder="Ingrese nombre de su base de datos">
                                    </div>
                                    <div class="form-group">
                                        <label for="user">Usuario </label>
                                        <input type="text" name="user" value="<?php echo e(env('DB_USERNAME')); ?>"
                                            class="form-control" placeholder="Ingrese contraseña">
                                    </div>
                                    <div class="form-group">
                                        <label for="password">Contraseña</label>
                                        <input type="text" name="password" value=" <?php echo e(env('DB_PASSWORD')); ?>" class="form-control" placeholder="Ingrese contraseña">
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
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\sgd\resources\views\base\index.blade.php ENDPATH**/ ?>