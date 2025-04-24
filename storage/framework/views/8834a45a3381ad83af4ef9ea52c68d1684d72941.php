<?php $__env->startSection('styleBFile'); ?>
    <!-- Color Box -->
    <link href="<?php echo e(asset('colorbox/colorbox.css')); ?>" rel="stylesheet">
<?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>

    <div class="card">
        <div class="card-header">
            <h3>Seguridad - Permisos</h3>
        </div>
        <div class="card-body">
            <?php echo Form::open(['route' => 'formatopermisos.permisoempleado', 'method' => 'POST', 'files' => true]); ?>


            <div class="row">
                <div class="col-lg-3 col-md-3">
                    <?php echo BootForm::text('no_empleado', 'No. de Empleado ', null, ['id' => 'no_empleado']); ?>


                </div>

            </div>
            <br>
            <div class="row" style="display" id='id_enviar'>
                <div class="col center">
                    <button type="submit" name="solicitar" id='solicitar' value="Solicitar permisos"
                        class="btn btn-primary">Buscar empleado</button>
                    <a href="<?php echo route('home'); ?>" class="btn btn-light">Cancelar</a>

                </div>
            </div>

            <?php echo form::close(); ?>

        </div>
        <div class="row">
            <div class="col-12">
                <table class="table" data-page-size="50">
                    <?php if(isset($permiso)): ?>
                        <thead style="">
                            <tr>
                                <th data-sortable="true">Folio</th>
                                <th data-sortable="true">No. Empleado</th>
                                <th data-sortable="true">Nombre Empleado</th>
                                <th data-sortable="true">Fecha Permiso</th>

                                <th data-sortable="true">Hora Entrada</th>

                                <th data-sortable="true">Hora Salida</th>

                                <th data-sortable="true"></th>
                                <th data-sortable="true"></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__empty_1 = true; $__currentLoopData = $permiso; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $per): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                <?php if($per->status == 'APLICADO' ): ?>
                                    <tr>
                                        <td>
                                            <?php echo e($per->folio_per); ?>

                                            <?php echo BootForm::hidden('status', $per->status); ?>

                                        </td>
                                        <td>
                                            <?php echo e($per->fk_no_empleado); ?>

                                        </td>
                                        <td>
                                            <?php echo e($nombre); ?>

                                        </td>

                                        <td>
                                            <?php echo e($per->fech_ini_per); ?>

                                        </td>

                                        <?php if($per->modo_per == 1 || $per->modo_per == 3): ?>
                                            <td>
                                                <?php echo e($per->fech_ini_hor); ?>

                                            </td>
                                        <?php else: ?>
                                            <td>

                                            </td>
                                        <?php endif; ?>
                                        <?php if($per->modo_per == 2 || $per->modo_per == 3): ?>
                                            <td>
                                                <?php echo e($per->fech_fin_hor); ?>

                                            </td>
                                        <?php else: ?>
                                            <td>

                                            </td>
                                        <?php endif; ?>
                                        <?php if(($per->modo_per == 1 && $per->entrada_permiso!=1) || $per->modo_per == 3): ?>
                                           <td>
                                                <a class="btn btn-info" id="ini_hor" nam="ini_hor"
                                                    href="<?php echo e(route('formatopermisos.revisarpermiso', $per->folio_per)); ?>">
                                                    Entrada
                                                </a>
                                            </td>
                                        <?php else: ?>
                                            <?php if($per->modo_per == 1 && $per->entrada_permiso==1): ?>
                                                <tr>
                                                    <td colspan="7" style="color: red; background: black;">El permiso ya no se encuentra activo por registro previo <?php echo e($per->fech_fin_hor); ?>,
                                                        favor de Verificar</td>
                                                </tr>
                                            <?php endif; ?>
                                        <?php endif; ?>
                                        <?php if(($per->modo_per == 2 && $per->salida_permiso!=1) || $per->modo_per == 3 ): ?>
                                            <td>
                                                <a class="btn btn-danger " id="ini_hor" nam="ini_hor"
                                                    href="<?php echo e(route('formatopermisos.revisarEntrada', $per->folio_per)); ?>">
                                                    Salida
                                                </a>
                                            </td>
                                        <?php else: ?>
                                            <?php if($per->modo_per == 2 && $per->salida_permiso==1): ?>
                                                <tr>
                                                    <td colspan="7" style="color: red; background: black;">El permiso ya no se encuentra activo por registro previo <?php echo e($per->fech_ini_hor); ?>,
                                                        favor de Verificar</td>
                                                </tr>
                                            <?php endif; ?>
                                        <?php endif; ?>
                                    </tr>
                                <?php else: ?>
                                    <?php if($per->status != 'APLICADO' ): ?>
                                    <tr>
                                        <td colspan="7" style="color: green; background: black;">El permiso no se encuentra
                                            Liberado, favor de Verificar</td>
                                    </tr>
                                    <?php endif; ?>
                                <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                <tr>
                                    <td colspan="7" style="color: red; background: black;">No existe un permiso Registrado,
                                        favor de Verificar</td>
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
                    <?php endif; ?>
                </table>

            </div>
        </div>

    </div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('scriptBFile'); ?>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="sweetalert2.all.min.js"></script>

    <script>
        document.getElementById("no_empleado").focus();

        /* $( "#ini_hor" ).click(function() {
             Swal.fire('Registrado')
         });*/
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\xampp1\htdocs\intimark_sgd\resources\views/formatoPermisos/seguridad.blade.php ENDPATH**/ ?>