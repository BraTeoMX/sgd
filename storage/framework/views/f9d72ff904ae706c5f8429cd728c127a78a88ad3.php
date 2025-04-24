
<?php $__env->startSection('content'); ?>
<div class="row">
  <div class="col-md-12">
    <div class="card">
      <div class="card-header">
        <div class="row">
          <div class="col-md-7">
            <h3>incidencias</h3>
          </div>
          <div class="col-md-5">
            <a href="<?php echo e(route('incidencia.create')); ?>" class="btn btn-primary pull-right">
              Agregar
            </a>
          </div>
        </div>
      </div>
     <div class="card-body">
         <?php echo BootForm::open(['id'=>'form', 'method' => 'GET']);; ?>

         <div class="row align-items-center col-md-6">
             <?php echo BootForm::text("incidencia", "Nombre del incidencia:", old("quincena", optional(request())->incidencia), ["width" => "col-md-5"]);; ?>

             <div class="col-md-2">
                 <?php echo Form::submit('Buscar', ['class' => 'btn btn-primary']);; ?>

             </div>
         </div>
         <?php echo BootForm::close(); ?>

            <table class="table toggle-circle tabla-foo" data-page-size="25">
              <thead>
                <tr>
                  <th>Nombre</th>
                  <th data-hide="phone">Eliminar</th>
                </tr>
              </thead>
              <tbody>
                  <?php $__empty_1 = true; $__currentLoopData = $incidencias; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $incidencia): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                      <tr>
                          <td>
                              <a href="<?php echo e(route('incidencia.edit', $incidencia)); ?>" class="btn btn-link"><?php echo e($incidencia->name); ?></a>
                          </td>
                          <td class="eliminar">
                            <?php
         if(auth()->user()->can('incidencia.destroy') || auth()->user()->can('incidencia.*') || auth()->user()->can('Universal.*')){
             echo e(BootForm::open(['class'=>'eliminar','method'=>'delete','url'=>route('incidencia.destroy',$incidencia),'onSubmit'=>'return confirm("¿Desea eliminar el registro?")']) );
             echo e(BootForm::button('<i class="tio-delete tio-lg text-danger"></i>',['type'=>'submit','class'=>'btn btn-link']));
             echo e(BootForm::close());
         }
         ?>
                          </td>
                      </tr>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                      <tr>
                          <td colspan="2">No se ha registrado infformacion</td>
                      </tr>
                  <?php endif; ?>
              </tbody>
              <tfoot style="display:<?php echo e((count($incidencias)>25)?"show":"none"); ?>">
                <tr>
                  <td colspan="2">
                    <div>
                      <ul class="pagination"> </ul>
                    </div>
                  </td>
                </tr>
              </tfoot>
            </table>
        </div>
      </div>
    </div>
  </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('scriptBFile'); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\intimark\resources\views/incidencias/index.blade.php ENDPATH**/ ?>