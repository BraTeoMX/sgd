
<?php $__env->startSection('content'); ?>
<div class="card">
  <div class="card-header">
    <h3>Responsables</h3>
  </div>
  <div class="card-body">
        <?php echo BootForm::open(['model' => $responsables, 'store' => 'responsables.store', 'update' => 'responsables.update','id'=>'form']); ?>

        <div class="form-group">
          <select class='form-control' aria-label="Default select example" name="name" id="name">
              <?php $__empty_1 = true; $__currentLoopData = $puestos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $puesto): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <option value=<?php echo e($puesto->id); ?>><?php echo e($puesto->Puesto); ?></option>
                
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
              <?php endif; ?>
           </select>
        </div>
        
        <div class="row">
          <div class="col-md-12 text-left">
            <button type="submit" name="enviar" class="btn btn-primary">Guardar</button>
            <a href="<?php echo route('responsables.index'); ?>" class="text-danger text-right col-md-2">Cancelar</a>
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

<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\sgd\resources\views\responsables\form.blade.php ENDPATH**/ ?>