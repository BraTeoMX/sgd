<?php $__env->startSection('content'); ?>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3>Permisos masivos</h3>
            </div>
            <div class="card-body">

                <!--<?php if(session('success')): ?>
                    <div class="alert alert-success" role="alert">
                        <?php echo e(session('success')); ?>

                    </div>
                <?php endif; ?>-->
                <?php if($errors->any()): ?>
                    <div class="alert alert-danger">
                        <ul>
                            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li><?php echo e($error); ?></li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                    </div>
                <?php endif; ?>


                <form action="<?php echo e(route('importarmasivos')); ?>" id="form1" method="POST" enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>
                    <div class="form-group">
                        <label class="form-label" for="file">Importar archivo excel</label>
                        <input class="form-control" type="file" name="file"  id="file">
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <?php echo Form::submit("Actualizar", ["class" => "btn btn-primary mr-2", "id" => "actualizar" ]);; ?>

                            <a href="<?php echo route('home'); ?>" class="btn btn-light">Cancelar</a>
                        </div>
                    </div>

                </form>
                <?php echo BootForm::close(); ?>


            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('scriptBFile'); ?>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="sweetalert2.all.min.js"></script>

<script>

    $( "#actualizar" ).click(function() {
        // alert( "solicitud enviada con exito." );
        Swal.fire('Los pemisos masivos han sido guardados')
    });


</script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\xampp1\htdocs\intimark_sgd\resources\views/permisos/masivos.blade.php ENDPATH**/ ?>