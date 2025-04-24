
<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-12">
            <div class="card">
              <div class="card-header">
                    <h3>Archivos Adjuntos</h3>
                    <a href="<?php echo e(route('upload.create')); ?>" class="btn btn-primary float-right">
                      Agregar Archivo
                    </a>
              </div>
              <div class="card-body">
                <?php echo BootForm::open(['id'=>'form', 'method' => 'GET']);; ?>

                <div class="row align-items-center">
                    <div class="col-md-4">
                        <?php echo BootForm::text('folio_cliente', 'Folio:', old('folio_Intimark', optional(request())->folio_Intimark), ['maxlength' => '50']);; ?>

                    </div>
                    <div class="col-md-3">
                        <?php echo Form::submit('Buscar', ['class' => 'btn btn-light']);; ?>

                    </div>
                </div>
                <?php echo BootForm::close(); ?>

               <div class="row">
                  <div class="col-md-12">
                      <div class="table-responsive">
                          <table class="table toggle-circle">
                              <thead style="display:<?php echo e((count($entradas)) ? "show" : "none"); ?>">
                                  <tr>
                                      <th>Descripcion</th>
                                      <th>Eliminar</th>
                                  </tr>
                              </thead>
                              <tbody>
                                  <?php $__empty_1 = true; $__currentLoopData = $entradas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $entrada): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                      <tr>
                                          <td>
                                              <a class="btn-link" ">
                                                  <?php echo e($entrada->descripcion); ?>

                                              </a>
                                          </td>
                                          <!-- storage/app/public/storage/public/1603952004.jpeg -->
                                          <?php
                                            $url = (!empty($entrada->nombre_archivo)) ? asset("storage/public/$entrada->nombre_archivo") : "#";
                                                $archivo = '<div id="divarchivo" >'
                                                .'<a id="nombre_archivo-link" href="'.$url.'" target="_blank">Ver Archivo</a>'
                                                .'</div>';
                                            ?>
                                          <td>
                                          <?php echo $archivo; ?>

                                          </td>

                                      </tr>
                                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                      <tr>
                                          <td colspan="3">No se ha registrado información en este apartado</td>
                                      </tr>
                                  <?php endif; ?>
                              </tbody>
                          </table>
                      </div>
                  </div>
                </div>
              </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('scriptBFile'); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\sgd\resources\views\upload\index.blade.php ENDPATH**/ ?>