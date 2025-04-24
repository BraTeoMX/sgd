<?php $__env->startSection('styleBFile'); ?>

<!-- Color Box -->
<link href="<?php echo e(asset('colorbox/colorbox.css')); ?>" rel="stylesheet">

<?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>

    <div class="card">
        <div class="card-header">
            <h3>Saldo de Vacaciones</h3>
        </div>
        <div class="card-body">
            <?php echo Form::open(['route'=>'vacaciones.saldoempleado', 'method'=>'POST', 'files'=>TRUE ]); ?>


            <div class="row">
                <div class="col-lg-3 col-md-3">
                    <?php echo BootForm::text('no_empleado', 'No. de Empleado ' , null , ['id'=> 'no_empleado'] );; ?>


                </div>

            </div>
                <br>
                <div class="row" style="display" id ='id_enviar'>
                    <div class="col center">
                        <button type="submit" name="solicitar" id='solicitar' value="Solicitar saldo" class="btn btn-primary">Buscar empleado</button>
                        <a href="<?php echo route('home'); ?>" class="btn btn-light">Cancelar</a>

                    </div>
                </div>

            <?php echo form::close(); ?>

        </div>
        <div class="row">
            <div class="col-12">
                <table class="table" data-page-size="50" >
                    <?php if(isset($saldo)): ?>


                        <thead style="">
                            <tr>
                                <th data-sortable="true">No. Empleado</th>
                                <th data-sortable="true">Nombre </th>
                                <th data-sortable="true">Fecha Ingreso</th>
                                <th data-sortable="true">Saldo disponible</th>
                                <th data-sortable="true">Eventualidades</th>
                                <th data-sortable="true">Periodos</th>

                            </tr>
                        </thead>
                        <tbody>
                        <?php $__empty_1 = true; $__currentLoopData = $saldo; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $saldos): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                <tr>
                                    <td>
                                        <?php echo e($saldos->No_Empleado); ?>

                                    </td>
                                    <td>
                                        <?php echo e($saldos->Ap_Pat.' '.$saldos->Ap_Mat.' '.$saldos->Nom_Emp); ?>

                                    </td>
                                    <td>
                                        <?php echo e($saldos->Fecha_In); ?>

                                        <?php
                                            $fecha_inicial = date("Y").'-'.substr($saldos->Fecha_In,5,5) ;
                                        ?>
                                    </td>
                                    <td>
                                        <?php echo e($saldos->Dias_Dispo); ?>

                                    </td>
                                    <?php
                                        $eventualidad=0;
                                        $periodo=0;
                                    ?>
                                    <?php $__currentLoopData = $vacaciones; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $vac): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                        <?php if($fecha_inicial <= $vac->fech_ini_vac): ?>
                                            <?php
                                                $eventualidad = $eventualidad+$vac->eventualidades;
                                                $periodo = $periodo+$vac->periodos;
                                            ?>
                                        <?php endif; ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <td>
                                        <?php echo e($eventualidad."/3"); ?>

                                    </td>
                                    <td>
                                        <?php echo e($periodo."/4"); ?>

                                    </td>
                                </tr>

                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                            <tr>
                                <td colspan="7" style="color: red; background: black;">No existe Empleado, favor de Verificar</td>
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



    <script>

        document.getElementById("no_empleado").focus();


    </script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\xampp1\htdocs\intimark_sgd\resources\views/vacaciones/saldo.blade.php ENDPATH**/ ?>