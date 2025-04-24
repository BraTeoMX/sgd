
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
        <h3>Matriz de Permisos</h3>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-12 scrollmenu">
                <?php echo BootForm::open(['id' => 'form', 'class' => '','method'=>'POST','route' => 'autorizacion.index']); ?>

                    <?php if($permisos->isNotEmpty()): ?>
                        <table class="table toggle-circle tabla-foot" data-page-size="25">
                            <thead>
                                <tr>
                                    <th>Permisos</th>
                                    <?php $__currentLoopData = $valorpermisos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $valor): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <th><?php echo e($valor->valorpermiso); ?></th>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $permisos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $permiso): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($permiso->permiso); ?>

                                    </td>
                                    <?php $__currentLoopData = $valorpermisos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $valor): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <td>
                                      <?php
                                        $valores = $valor->cve_valorpermiso;
                                      ?>

                                      <?php if($permiso->$valores==1): ?>
                                          <?php echo Form::checkbox($permiso->id_permiso.'['.$valor->cve_valorpermiso.']',1,old('check','1') , ['id' => 'check'.$permiso->id_permiso.'-'.$valor->id_valorpermiso, 'class' => 'i-checks','width'=> 'col-lg-2']);; ?>

                                      <?php else: ?>
                                      <?php echo Form::checkbox($permiso->id_permiso.'['.$valor->cve_valorpermiso.']',1,old('check','') , ['id' => 'check'.$permiso->id_permiso.'-'.$valor->id_valorpermiso, 'class' => 'i-checks','width'=> 'col-lg-2']);; ?>

                                      <?php endif; ?>    
                                    </td>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                            <tfoot style="display:<?php echo e((count($permisos)>50)?"show":"none"); ?>">
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
                <?php if($valorpermisos->isEmpty()): ?>
                    <p>No se han registrado permisos </p>
                <?php endif; ?>
                <?php echo e(BootForm::close()); ?>

            </div>
        </div>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('scriptBFile'); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\xampp1\htdocs\intimark_sgd\resources\views/autorizacion/index.blade.php ENDPATH**/ ?>