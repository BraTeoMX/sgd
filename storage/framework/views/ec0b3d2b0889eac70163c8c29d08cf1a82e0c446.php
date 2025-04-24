
<?php $__env->startSection('content'); ?>
<div class="row">   
    <div class="col-12">
        <div class="card">
            <div class="card-header"> 
                <h3>Calendario</h3>  
                <?php if(auth()->user()->hasPermissionTo("calendario.create")): ?>
                <a href="<?php echo e(route('calendario.create')); ?> " class="btn btn-primary float-right">
                    Agregar
                </a>
                <?php endif; ?>
            </div>
            <div class="card-body">
                <?php echo BootForm::open(['id'=>'form', 'method' => 'GET']);; ?>

                <div class="form-group">   
                    <div class="col-8 input-group">
                        <label class="text-dark" style="line-height: 2;"> Fecha de reservacion :&nbsp;</label>
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
                        <thead style="display:<?php echo e(($fechas->count()) ? 'show' : 'none'); ?>">
                            <tr>
                                <th data-sortable="true">Clave</th>
                                <th data-sortable="true">fecha</th>
                                <th data-sortable="true">Modulo</th>
                                <th data-sortable="true">Tipo</th>
                                <th data-sortable="true">Tipo de Nómina</th>
                                <th data-sortable="true">Detalle</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__empty_1 = true; $__currentLoopData = $fechas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $fech): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                            <tr>
                                <td>
                                    <a href=" <?php echo e(route('calendario.edit', $fech->id)); ?> ">
                                        <?php echo e($fech->id); ?>

                                    </a>
                                </td>
                                <td>
                                    <?php echo e($fech->fecha_calendario); ?>

                                </td>
                                <td>
                                    <?php if($fech->id_modulo == 1): ?>
                                        <?php echo e('VACACIONES'); ?>    
                                    <?php else: ?>
                                        <?php echo e('PERMISOS'); ?>                    
                                    <?php endif; ?>
                                </td>
                                <td>
                                    <?php if($fech->tipo == 1): ?>
                                        <?php echo e('NO LABORABLE'); ?>

                                    <?php else: ?>
                                        <?php if($fech->tipo == 2): ?>    
                                            <?php echo e('RESERVADO'); ?>

                                        <?php else: ?>
                                            <?php echo e('BLOQUEADO'); ?>

                                        <?php endif; ?>        
                                    <?php endif; ?>
                                </td>
                                <td>
                                    <?php if($fech->tipo_nomina == 1): ?>
                                        <?php echo e('SEMANAL'); ?>

                                    <?php else: ?>
                                        <?php if($fech->tipo_nomina == 2): ?>    
                                            <?php echo e('QUINCENAL'); ?>

                                        <?php else: ?>
                                            <?php echo e('TODAS'); ?>

                                        <?php endif; ?>        
                                    <?php endif; ?>
                                </td>
                                <td>
                                    <?php echo e($fech->detalle); ?>

                                </td>
                                <?php if(auth()->user()->hasPermissionTo("calendario.destroy")): ?>
                                    <td class="float-center">
                                        <?php echo Form::model($fech, ['method' => 'delete', 'route' => ['calendario.destroy',$fech->id] ]); ?>

                                        <a class="text-danger eliminar" style="cursor: pointer" onclick="">
                                            <i class="tio-delete tio-lg text-danger"></i>
                                        </a>
                                        <?php echo Form::close(); ?>

                                    </td> 
                                <?php endif; ?>
                            </tr>
                                
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                
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
<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\sgd\resources\views\calendario\index.blade.php ENDPATH**/ ?>