<?php $__env->startSection('content'); ?>
<div class="row">
  <div class="col-md-12">
    <div class="card">
      <div class="card-header">
        <div class="row">
          <div class="col-md-6">
            <h3>Permisos</h3>
          </div>
          <div class="col-md-6">
            <a href="<?php echo e(route('permiso.create')); ?>" class="btn btn-primary pull-right">
              Agregar
            </a>
          </div>
        </div>
      </div>
     <div class="card-body">
         <?php echo BootForm::open(['id'=>'form', 'method' => 'GET']);; ?>

         <div class="row align-items-center col-md-6">
             <?php echo BootForm::text("permiso", "Nombre del permiso:", old("quincena", optional(request())->permiso), ["width" => "col-md-5"]);; ?>

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
                  <?php $__empty_1 = true; $__currentLoopData = $permisos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $permiso): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                      <tr>
                          <td>
                              <a href="<?php echo e(route('permiso.edit', $permiso)); ?>" class="btn btn-link"><?php echo e($permiso->name); ?></a>
                          </td>
                          <td class="eliminar">
                            <?php
         if(auth()->user()->can('permiso.destroy') || auth()->user()->can('permiso.*') || auth()->user()->can('Universal.*')){
             echo e(BootForm::open(['class'=>'eliminar','method'=>'delete','url'=>route('permiso.destroy',$permiso),'onSubmit'=>'return confirm("¿Desea eliminar el registro?")']) );
             echo e(BootForm::button('<i class="tio-delete tio-lg text-danger"></i>',['type'=>'submit','class'=>'btn btn-link']));
             echo e(BootForm::close());
         }
         ?>
                          </td>
                      </tr>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                      <tr>
                          <td colspan="2">No se ha registrado este usuario</td>
                      </tr>
                  <?php endif; ?>
              </tbody>
              <tfoot style="display:<?php echo e((count($permisos)>25)?"show":"none"); ?>">
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

<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\intimark\resources\views/permisos/index.blade.php ENDPATH**/ ?>