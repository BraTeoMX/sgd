<?php $__env->startSection('content'); ?>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header"> 
                <h3>Convenios</h3>  
                <?php if(auth()->user()->hasPermissionTo("convenio.create")): ?>
                <a href="<?php echo e(route('convenio.create')); ?> " class="btn btn-primary float-right">
                    Agregar
                </a>
                <?php endif; ?>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-12">
                        <table class="table table-hover table-fixed" data-page-size="50" >
                        <thead style="display:<?php echo e(($convenios->count()) ? 'show' : 'none'); ?>">
                            <tr>
                                <th >Cliente</th>
                                <th >Vigencia contrato</th>
                                <th >Contacto</th>
                                <th >&nbsp;</th>
                                <th >&nbsp;</th>
                             </tr>
                        </thead>
                        <tbody>
                        <?php $__empty_1 = true; $__currentLoopData = $convenios; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $convenio): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <tr class="items-aligns-center">
                            <td>
                                <a href="<?php echo e(route('convenio.edit', $convenio)); ?>" class="btn btn-link">
                                    <?php echo e(optional($convenio->catCliente)->nombre_comercial); ?>

                                </a>
                            </td>
                            <td>
                                <?php echo e(filled($convenio->inicio_contrato) ? optional($convenio->inicio_contrato)->format('d/m/Y').' al '.optional($convenio->fin_contrato)->format('d/m/Y') : ''); ?>

                            </td>
                            <td>
                                <?php echo e($convenio->contacto); ?>

                            </td>
                            <td>
                                <a href="<?php echo e(route('conveniodetalle.index', $convenio)); ?> " class="btn btn-soft-secondary col-lg-12 col-md-12" >
                                    Recuperables
                                </a>
                                <hr>
                                <a href="<?php echo e(route('conveniodetalleservicio.index', $convenio)); ?> " class="btn btn-soft-secondary col-lg-12 col-md-12" >
                                    Servicios
                                </a>
                               <hr>
                                <a href="<?php echo e(route('conveniodetallesegregacion.index', $convenio)); ?> " class="btn btn-soft-secondary col-lg-12 col-md-12" >
                                    Segregables
                                </a>
                                <hr>
                                <a href="<?php echo e(route('conveniodetalledestruccion.index', $convenio)); ?> " class="btn btn-soft-secondary col-lg-12 col-md-12" >
                                    Destrucciones
                                </a>
                            </td>
                            <td>
                            <?php if(auth()->user()->hasPermissionTo("convenio.destroy")): ?>
                                <?php echo Form::model($convenio, ['method' => 'delete', 'route' => ['convenio.destroy',$convenio] ]); ?>

                                    <a class="text-danger eliminar" style="font-weight: 450; cursor: pointer">
                                        <i class="tio-delete tio-lg text-danger"></i>
                                    </a>
                                <?php echo Form::close(); ?>

                                <?php endif; ?>
                            </td>
                        </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                            <tr>
                                <td colspan="6">No se ha registrado información en este apartado</td>
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

<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\intimark\resources\views/convenios/index.blade.php ENDPATH**/ ?>