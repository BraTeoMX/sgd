
<?php $__env->startSection('content'); ?>
<div class="card">
  <div class="card-header">
    <h3>Registro de rol</h3>
  </div>
  <div class="card-body">
        <?php echo BootForm::open(['model' => $rol, 'store' => 'role.store', 'update' => 'role.update','id'=>'form']); ?>

        <div class="form-group">
          <?php echo BootForm::text("name", "Nombre del rol:", old("name",$rol->name), ["class" => "form-control",'width'=>'col-lg-2 col-md-4','placeholder','maxlength' => '30']);; ?>

        </div>
        <div class="row">
          <div class="col-md-12 text-left">
            <button type="submit" name="enviar" class="btn btn-primary">Guardar</button>
            <a href="<?php echo route('role.index'); ?>" class="text-danger text-right col-md-2">Cancelar</a>
          </div>
        </div>
        <?php echo BootForm::close(); ?>

  </div>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('scriptBFile'); ?>
  <script src="<?php echo e(asset('js/locales/es.js')); ?>"></script>
  <script type="text/javascript" src="<?php echo e(asset('vendor/jsvalidation/js/jsvalidation.js')); ?>"></script>
<?php echo $validator; ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\sgd\resources\views\role\form.blade.php ENDPATH**/ ?>