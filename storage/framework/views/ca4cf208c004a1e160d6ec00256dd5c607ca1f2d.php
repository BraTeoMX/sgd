
<?php $__env->startSection('content'); ?>
    <style media="screen">
    div.scrollmenu {
      background-color: #fff;
      overflow: auto;
      white-space: nowrap;
    }

    div.scrollmenu a {
      display: inline-block;
      color: white;
      text-align: center;
      padding: 14px;
      text-decoration: none;
    }

    div.scrollmenu a:hover {
      background-color: #777;
    }
    </style>
    <div class="card">
        <div class="card-header bg-light">
        <h3>Accesos</h3>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-12 scrollmenu">
                <?php echo BootForm::open(['id' => 'form', 'class' => '','method'=>'POST','route' => 'acceso.index']); ?>

                    <?php if($permisos->isNotEmpty()): ?>
                        <table class="table toggle-circle tabla-foot" data-page-size="25">
                            <thead>
                                <tr>
                                    <th>Permiso</th>
                                    <?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $rol): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <th><?php echo e($rol->name); ?></th>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $permisos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $permiso): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($permiso->name); ?>

                                    </td>
                                    <?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $rol): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <td>
                                        <?php echo Form::checkbox($rol->name.'['.$permiso->name.']',$permiso->name,old('check',$rol->hasPermissionTo($permiso)) , ['id' => 'check'.$rol->id.'-'.$permiso->id, 'class' => 'i-checks','width'=> 'col-lg-2']);; ?>

                                    </td>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                            <tfoot style="display:<?php echo e((count($permisos)>25)?"show":"none"); ?>">
                              <tr>
                                <td colspan="4">
                                  <div>
                                    <ul class="pagination"> </ul>
                                  </div>
                                </td>
                              </tr>
                            </tfoot>
                        </table>
                      </div>
                </div>
                <div class="row">
                    <div class="col-md-12 text-left">
                    <button type="submit" name="enviar" class="btn btn-primary">Guardar</button>
                    <a href="<?php echo url('/home'); ?>" class="text text-danger btn-link float-middle ml-4">Cancelar</a>
                    </div>
                </div>
                <?php endif; ?>
                <?php if($permisos->isEmpty()): ?>
                    <p>No se han registrado roles o permisos </p>
                <?php endif; ?>
                <?php echo e(BootForm::close()); ?>

            </div>
        </div>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('scriptBFile'); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\sgd\resources\views\accesos\index.blade.php ENDPATH**/ ?>