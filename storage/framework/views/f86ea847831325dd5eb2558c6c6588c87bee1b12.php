
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
        <h3>Matriz de Autorizacion</h3>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-12 scrollmenu">
                <?php echo BootForm::open(['id' => 'form', 'class' => '','method'=>'POST','route' => 'autorizacion.index']); ?>

                    <?php if($responsables->isNotEmpty()): ?>
                        <table class="table toggle-circle tabla-foot" data-page-size="25">
                            <thead>
                                <tr>
                                    <th>Responsables</th>
                                    <?php $__currentLoopData = $incidencias; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $incidencia): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <th><?php echo e($incidencia->name); ?></th>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $responsables; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $responsable): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($responsable->Puesto); ?>

                                    </td>
                                    <?php $__currentLoopData = $incidencias; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $incidencia): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <td>
                                    <?php echo Form::checkbox($responsable->Puesto.'['.$incidencia->name.']',$incidencia->name,old('check','') , ['id' => 'check'.$responsable->id_puesto.'-'.$incidencia->id, 'class' => 'i-checks','width'=> 'col-lg-2']);; ?>

                                    </td>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                            <tfoot style="display:<?php echo e((count($responsables)>25)?"show":"none"); ?>">
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
                <?php if($incidencias->isEmpty()): ?>
                    <p>No se han registrado incidencias o responsables </p>
                <?php endif; ?>
                <?php echo e(BootForm::close()); ?>

            </div>
        </div>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('scriptBFile'); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\sgd\resources\views\matrizautorizacion\index.blade.php ENDPATH**/ ?>