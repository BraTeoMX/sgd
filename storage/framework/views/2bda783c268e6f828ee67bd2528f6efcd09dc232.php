<?php $__env->startSection('content'); ?>
<div class="row">   
    <div class="col-12">
        <div class="card">
            <div class="card-header"> 
                <h3>Puestos</h3>  
                <?php if(auth()->user()->hasPermissionTo("puestos.create")): ?>
                <a href="<?php echo e(route('puestos.create')); ?> " class="btn btn-primary float-right">
                    Agregar
                </a>
                <?php endif; ?>
            </div>
            <div class="card-body">
                <?php echo BootForm::open(['id'=>'form', 'method' => 'GET']);; ?>

                <div class="form-group">   
                    <div class="col-8 input-group">
                        <label class="text-dark" style="line-height: 2;"> Puesto :&nbsp;</label>
                        <input type="search" class="form-control col-8" id="puesto" name="puesto">
                        <span class="col-2">
                        <?php echo Form::submit('Buscar', ['class' => 'btn btn-light']);; ?>                            
                        </span>
                    </div>                    
                </div> 
                <?php echo BootForm::close(); ?>

                <div class="row"> 
                    <div class="col-12">
                        <table class="table" data-page-size="50" >
                        <thead style="display:<?php echo e(($puestos->count()) ? 'show' : 'none'); ?>">
                            <tr>
                                <th data-sortable="true">Puesto</th>
                                <th data-sortable="true">Planta</th>
                                <th data-sortable="true">Nivel</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php $__empty_1 = true; $__currentLoopData = $puestos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $puesto): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <tr>
                            <td>
                                <a href="<?php echo e(route('puestos.edit', $puesto->id)); ?>">
                                <?php echo e($puesto->Puesto); ?> 
                                </a>
                            </td>
                            <td>
                                <?php echo e($puesto->Id_Planta); ?>

                              </td>
                            <td>
                                    <?php echo e($puesto->Nivel); ?>                                
                            </td>
                            <?php if(auth()->user()->hasPermissionTo("puestos.destroy")): ?>
                            <td class="float-center">
                                <?php echo Form::model($puesto, ['method' => 'delete', 'route' => ['puestos.destroy',$puesto->id] ]); ?>

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
<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\xampp1\htdocs\intimark_sia\resources\views/Puestos/index.blade.php ENDPATH**/ ?>