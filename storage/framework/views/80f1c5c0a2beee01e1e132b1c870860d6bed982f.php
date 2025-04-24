<?php $__env->startSection('content'); ?>
<div class="row">   
    <div class="col-12">
        <div class="card">
            <div class="card-header">  
                <h3>Sucursales</h3>  
                <a href="<?php echo e(route('sucursal.create')); ?> " class="btn btn-primary float-right">
                    Agregar
                </a>
            </div>
            <div class="card-body">
                <?php echo BootForm::open(['id'=>'form', 'method' => 'GET']);; ?>

                <div class="form-group">   
                    <div class="col-6 input-group">
                        <label class="text-dark" style="line-height: 2;"> Sucursal :&nbsp;</label>
                        <input type="search" class="form-control col-8" id="sucursal" name="sucursal">
                        <span class="col-2">
                        <?php echo Form::submit('Buscar', ['class' => 'btn btn-light']);; ?>                            
                        </span>
                    </div>                    
                </div> 
                <?php echo BootForm::close(); ?>

                <div class="row"> 
                    <div class="col-12">
                        <table class="table" data-page-size="50" >
                        <thead style="display:<?php echo e(($sucursales->count()) ? 'show' : 'none'); ?>">
                            <tr>
                                <th data-sortable="true">Sucursal</th>
                                <th data-sortable="true">Estado</th>
                                <th data-sortable="true">Teléfono(s)</th>
                                <th data-hide="phone">Eliminar</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php $__empty_1 = true; $__currentLoopData = $sucursales; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sucursal): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <tr>
                            <td>
                                <a href="<?php echo e(route('sucursal.edit', $sucursal)); ?>">
                                <?php echo e($sucursal->clave .' '.$sucursal->sucursal); ?> 
                                </a>
                            </td>
                            <td>
                                <?php echo e($sucursal->catEstado->estado); ?> 
                            </td>
                            <td>
                                <?php echo e($sucursal->telefono_principal); ?> 
                            </td>
                            <td class="float-center">
                                <?php echo Form::model($sucursal, ['method' => 'delete', 'route' => ['sucursal.destroy',$sucursal] ]); ?>

                                <a class="text-danger eliminar" style="cursor: pointer" onclick="">
                                    <i class="tio-delete tio-lg text-danger"></i>
                                </a>
                                <?php echo Form::close(); ?>

                            </td>                            
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                            <tr>
                                <td colspan="4">No se ha registrado información en este apartado</td>
                            </tr>
                        <?php endif; ?>
                        </tbody>
                        <tfoot>
                        <tr>
                            <td colspan="6">
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
<script>
        $(document).ready(function() {
            $('.eliminar').on('click', function(event) {
                event.preventDefault();
                var respuesta = confirm('¿Desea eliminar el registro?');
                if (respuesta) {
                    $(this).closest('form').submit();
                } else {
                    return false;
                }
            });
        });
    </script>
    <?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\intimark\resources\views/sucursales/index.blade.php ENDPATH**/ ?>