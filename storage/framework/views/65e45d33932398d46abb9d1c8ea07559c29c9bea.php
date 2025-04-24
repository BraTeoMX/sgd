
<?php $__env->startSection('content'); ?>
<div class="row">   
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3>Permisos por Roles</h3>
            </div>
            <div class="card-body">
                <div class="row"> 
                    <div class="col-12">
                        <table class="table" data-page-size="50" >
                        <thead style="display:<?php echo e(($roles->count()) ? 'show' : 'none'); ?>">
                            <tr>
                                <th data-sortable="true">Rol</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php $__empty_1 = true; $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $rol): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <tr>
                            <td>
                                <a href="<?php echo e(route('acceso.show', $rol)); ?>">
                                <?php echo e($rol->name); ?> 
                                </a>
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
<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\sgd\resources\views\accesos\index_roles.blade.php ENDPATH**/ ?>