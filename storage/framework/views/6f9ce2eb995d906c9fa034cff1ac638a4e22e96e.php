<?php $__env->startSection('content'); ?>
<div class="card">
  <div class="card-header">
        <h3>Usuarios</h3>
        <a href="<?php echo e(route('usuario.create')); ?>" class="btn btn-primary pull-right">
          Agregar
        </a>
  </div>
  <div class="card-body">
    <?php echo BootForm::open(['id'=>'form', 'method' => 'GET']);; ?>

    <div class="row align-items-center">
        <div class="col-md-3">
            <?php echo BootForm::text('name', 'Nombre:', old('name', optional(request())->name), ['maxlength' => '50']);; ?>

        </div>
        <div class="col-md-3">
            <?php echo BootForm::text('email', 'Correo electrónico:', old('email', optional(request())->email), ['maxlength' => '50',]);; ?>

        </div>
        <div class="col-md-3">
            <?php echo BootForm::select('estatus','Estatus:' , ['Todas'=>'Todas', 'Activas'=>'Activas', 'Inactivas'=>'Inactivas'],
            old('inactivo', (request()->inactivo!="")?request()->inactivo:'Todas'),['width'=>'col-md-6']); ?>

        </div>
        <div class="col-md-3">
            <?php echo Form::submit('Buscar', ['class' => 'btn btn-primary']);; ?>

        </div>
    </div>
    <?php echo BootForm::close(); ?>

   <div class="row">
      <div class="col-md-12">
          <div class="table-responsive">
              <table class="table toggle-circle">
                  <thead style="display:<?php echo e((count($usuarios)) ? "show" : "none"); ?>">
                      <tr>
                          <th>Nombre</th>
                          <th>Rol</th>
                          <th>Correo electrónico</th>
                          <th>Estatus</th>
                          <th data-hide="phone">Último acceso</th>
                          <th data-hide="phone">Reenvio Email</th>
                      </tr>
                  </thead>
                  <tbody>
                      <?php $__empty_1 = true; $__currentLoopData = $usuarios; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $usuario): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                          <tr>
                              <td>
                                  <?php echo ($usuario->inactivo == 'X') ? '<i class="legend-indicator bg-danger"></i>' : '<i class=" legend-indicator bg-success"></i>'; ?>

                                  <a href="<?php echo e(route('usuario.edit', $usuario)); ?>" title="Editar" class="btn-link">
                                      <?php echo e($usuario->name); ?>

                                  </a>
                              </td>
                              <td><?php echo e(implode(", ",$usuario->getRoleNames()->toArray())); ?></td>
                              <td><?php echo e($usuario->email); ?></td>
                              <td><?php echo e(($usuario->inactivo=='X')?'Inactivo':'Activo'); ?></td>
                              <td>
                                  <?php echo optional($usuario->fecha_ultimo_acceso)->format('d/m/Y'). '<br>' . optional($usuario->fecha_ultimo_acceso)->format('H:i:s'); ?>

                              </td>
                              <td class="text-center">
                                  <a href="<?php echo e(route('usuario.notificacion', $usuario)); ?>" class="btn btn-link">
                                      <i class="tio-email"></i>
                                  </a><br>
                                  <small><?php echo e(optional($usuario->fecha_ultima_notificacion)->format('d/m/Y')); ?></small>
                              </td>
                          </tr>
                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                          <tr>
                              <td colspan="4">No se ha registrado este usuario</td>
                          </tr>
                      <?php endif; ?>
                  </tbody>
              </table>
          </div>
      </div>
    </div>
  </div>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('scriptBFile'); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\xampp1\htdocs\intimark_sia\resources\views/usuarios/index.blade.php ENDPATH**/ ?>