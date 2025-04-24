
<?php $__env->startSection('content'); ?>
<div class="row">   
    <div class="col-12">
        <div class="card">
            <div class="card-header"> 
                <h3>Parametros</h3>  
                <?php if(auth()->user()->hasPermissionTo("parametros.create")): ?>
                <a href="<?php echo e(route('parametros.create')); ?> " class="btn btn-primary float-right">
                    Agregar
                </a>
                <?php endif; ?>
            </div>
            <div class="card-body">
                <?php echo BootForm::open(['id'=>'form', 'method' => 'GET']);; ?>

                <div class="form-group">   
                    <div class="col-8 input-group">
                        <label class="text-dark" style="line-height: 2;"> Parametro :&nbsp;</label>
                        <input type="search" class="form-control col-8" id="parametros" name="parametros">
                        <span class="col-2">
                        <?php echo Form::submit('Buscar', ['class' => 'btn btn-light']);; ?>                            
                        </span>
                    </div>                    
                </div> 
                <?php echo BootForm::close(); ?>

                <div class="row"> 
                    <div class="col-12">
                        <table class="table" data-page-size="50" >
                        <thead style="display:<?php echo e(($parametros->count()) ? 'show' : 'none'); ?>">
                            <tr>
                                <th data-sortable="true">Clave</th>
                                <th data-sortable="true">Nombre</th>
                                <th data-sortable="true">Descripcion</th>
                                <th data-sortable="true">Modulo</th>
                                <th data-sortable="true">Valor</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php $__empty_1 = true; $__currentLoopData = $parametros; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $parametro): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <tr>
                        <td>
                                <?php echo e($parametro->clave); ?>

                              </td>
                            <td>
                                <a href="<?php echo e(route('parametros.edit', $parametro->id)); ?>">
                                <?php echo e($parametro->parametro); ?> 
                                </a>
                            </td>
                            <td>
                                <?php echo e($parametro->descripcion); ?>

                              </td>
                              <td>
                                <?php echo e($parametro->modulo); ?>

                              </td>
                            <td>
                                <?php echo e($parametro->valor); ?>

                              </td>
                           
                            <?php if(auth()->user()->hasPermissionTo("parametros.destroy")): ?>
                            <td class="float-center">
                                <?php echo Form::model($parametro, ['method' => 'delete', 'route' => ['parametros.destroy',$parametro->id] ]); ?>

                                <a class="text-danger eliminar" style="cursor: pointer" onclick="">
                                    <i class="tio-delete tio-lg text-danger"></i>
                                </a>
                                <?php echo Form::close(); ?>

                            </td> 
                            <?php endif; ?>                           
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                            <tr>
                                <td colspan="7">No se ha registrado información</td>
                            </tr>
                        <?php endif; ?>
                        </tbody>
                        <tfoot>
                        <tr>
                            <td colspan="7">
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
<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\xampp1\htdocs\intimark_sgd\resources\views/parametros/index.blade.php ENDPATH**/ ?>