
<?php $__env->startSection('content'); ?>
<div class="row">
  <div class="col-md-12">
    <div class="card">
      <div class="card-header">
        <div class="row">
          <div class="col-md-6">
            <h3>Roles</h3>
          </div>
          <div class="col-md-6">
            <a href="<?php echo e(route('role.create')); ?>" class="btn btn-primary pull-right">
              Agregar
            </a>
          </div>
        </div>
      </div>
      <div class="card-body">
          <?php echo BootForm::open(['id'=>'form', 'method' => 'GET']);; ?>

          <div class="row align-items-center col-md-6 col-lg-6">
              <?php echo BootForm::text("rol", "Nombre del rol:", old("quincena", optional(request())->rol), ["width" => "col-md-5"]);; ?>

              <div class="col-md-2">
                  <?php echo Form::submit('Buscar', ['class' => 'btn btn-primary']);; ?>

              </div>
          </div>
          <?php echo BootForm::close(); ?>

        <div class="row">
          <div class="col-md-12">
            <table class="table toggle-circle tabla-foo" data-page-size="10">
              <thead>
                <tr>
                  <th>Nombre</th>
                  <th data-hide="phone">Eliminar</th>
                </tr>
              </thead>
              <tbody>
                <?php $__empty_1 = true; $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $rol): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <tr>
                  <td>
                    <a href="<?php echo e(route('role.edit', $rol)); ?>" class="btn btn-link"><?php echo e($rol->name); ?></a>
                  </td>
                  <td class="eliminar">
                    <?php
         if(auth()->user()->can('role.destroy') || auth()->user()->can('role.*') || auth()->user()->can('Universal.*')){
             echo e(BootForm::open(['class'=>'eliminar','method'=>'delete','url'=>route('role.destroy',$rol),'onSubmit'=>'return confirm("¿Desea eliminar el registro?")']) );
             echo e(BootForm::button('<i class="tio-delete tio-lg text-danger"></i>',['type'=>'submit','class'=>'btn btn-link']));
             echo e(BootForm::close());
         }
         ?>
                  </td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <tr>
                  <td colspan="2">
                    <p>No se han registrado roles </p>
                  </td>
                </tr>
                <?php endif; ?>
              </tbody>
              <tfoot style="display:<?php echo e((count($roles)>25)?"show":"none"); ?>">
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
  </div>
</div>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('scriptBFile'); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\sgd\resources\views\role\index.blade.php ENDPATH**/ ?>