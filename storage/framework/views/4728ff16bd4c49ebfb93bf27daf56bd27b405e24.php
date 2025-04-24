
<?php $__env->startSection('content'); ?>
<div class="row">   
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3>Actualizar saldo de vacaciones</h3>
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

                <form action="<?php echo e(route('saldovacaciones.store')); ?>" method="POST" enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>
                    <div class="form-group">
                        <label class="form-label" for="file">Importar archivo excel</label>
                        <input class="form-control" type="file" name="file"  id="file">
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <?php echo Form::submit("Actualizar", ["class" => "btn btn-primary mr-2"]);; ?>

                            <a href="<?php echo route('saldovacaciones.index'); ?>" class="btn btn-light">Cancelar</a>
                        </div>
                    </div>
                </form>
                <?php echo BootForm::close(); ?>

                <div class="row"> 
                    <div class="col-12">
                        <table class="table" data-page-size="50" >
                        <thead style="display:<?php echo e(($bitacora->count()) ? 'show' : 'none'); ?>">
                            <tr>
                                <th data-sortable="true">Fecha</th>
                                <th data-sortable="true">Archivo</th>
                                <th data-sortable="true">Total registros</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__empty_1 = true; $__currentLoopData = $bitacora; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $bit): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                
                            <tr>
                                <td>
                                    <?php echo e($bit->fecha); ?>

                                </td>
                                <td>
                                    <?php echo e($bit->archivo); ?>

                                </td>
                                <td>
                                    <?php echo e($bit->no_registros); ?>

                                </td>
                            </tr>

                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                
                            <?php endif; ?>
                        
                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="7">
                                <div>
                                    <?php echo e($bitacora->links()); ?>

                                </div>
                                </td>
                            </tr>
                        </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> 
<?php $__env->stopSection(); ?>
<?php $__env->startSection('scriptBFile'); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\xampp1\htdocs\intimark_sgd\resources\views/saldovacaciones/index.blade.php ENDPATH**/ ?>