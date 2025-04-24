<?php $__env->startSection('content'); ?>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3>Especiales</h3>
                <a href="<?php echo e(route('logisticaespecial.create')); ?> " class="btn btn-primary float-right">
                    Agregar
                </a>
            </div>
            <div class="card-body">
                <?php echo BootForm::open(['id'=>'form', 'method' => 'GET']);; ?>

                <div class="form-group">
                    <div class="row">
                        <div class="col-6 input-group">
                            <label class="text-dark" style="line-height: 2;"> Folio Intimark :&nbsp;</label>
                            <input type="search" class="form-control col-8" id="folio_Intimark" name="folio_Intimark">
                        </div>
                        <div class="col-2">
                            <?php echo Form::submit('Buscar', ['class' => 'btn btn-light']);; ?>

                        </div>
                    </div>
                </div>
                <?php echo BootForm::close(); ?>

                <div class="row">
                    <div class="col-12">
                        <table class="table" data-page-size="50" >
                        <thead style="display:<?php echo e(($logisticasespeciales->count()) ? 'show' : 'none'); ?>">
                            <tr>
                                <th>Folio</th>
                                <th >Fecha</th>
                                <th>Cliente</th>
                                <th>Chofer</th>
                                <?php if(auth()->user()->roles()->first()->name == 'Administrador' || auth()->user()->roles()->first()->name == 'Logistica de Planta'): ?>
                                    <th>Eliminar</th>
                                <?php endif; ?>
                            </tr>
                        </thead>
                        <tbody>
                        <?php $__empty_1 = true; $__currentLoopData = $logisticasespeciales; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $logisticaespecial): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <tr>
                            <td>
                                <a href="<?php echo e(route('logisticaespecial.edit', $logisticaespecial)); ?>">
                                <?php echo e($logisticaespecial->folio_Intimark); ?>

                                </a>
                            </td>
                            <td>
                                <?php echo e($logisticaespecial->fecha->format('d/m/Y')); ?>

                            </td>
                            <td>
                                <?php echo e(optional(optional($logisticaespecial->convenio)->catCliente)->nombre_comercial); ?>

                            </td>
                            <td>
                                <?php echo e($logisticaespecial->catChofer->nombre); ?>

                            </td>
                            <?php if(auth()->user()->roles()->first()->name == 'Administrador' || auth()->user()->roles()->first()->name == 'Logistica de Planta'): ?>
                                <td><?php
         if(auth()->user()->can('logisticaespecial.destroy') || auth()->user()->can('logisticaespecial.*') || auth()->user()->can('Universal.*')){
             echo e(BootForm::open(['class'=>'eliminar','method'=>'delete','url'=>route('logisticaespecial.destroy', $logisticaespecial),'onSubmit'=>'return confirm("¿Desea eliminar el registro?")']) );
             echo e(BootForm::button('<i class="tio-delete tio-lg text-danger"></i>',['type'=>'submit','class'=>'btn btn-link']));
             echo e(BootForm::close());
         }
         ?></td>
                            <?php endif; ?>
                        </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                            <tr>
                                <td colspan="5">No se ha registrado información en este apartado</td>
                            </tr>
                        <?php endif; ?>
                        </tbody>
                        <tfoot>
                        <tr>
                            <td colspan="5">
                            <div>
                                <ul class="pagination"></ul>
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

<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\intimark\resources\views/logisticasespeciales/index.blade.php ENDPATH**/ ?>