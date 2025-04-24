

<?php $__env->startSection('styleBFile'); ?>

<!-- Color Box -->
<link href="<?php echo e(asset('colorbox/colorbox.css')); ?>" rel="stylesheet">

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<div class="row">   
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Vacaciones Autorizadas</h3>
            </div>

          <!-- <div class="row">
                <a class="m-2 col-2 btn btn-info" href="<?php echo route('vacaciones.solicitarvacaciones'); ?>" class="btn btn-info float-middle ml-4">Solicitar Vacaciones</a>
                <a class="m-2 col-2 btn btn-success" href="<?php echo url('/vacaciones'); ?>" class="btn btn-info float-middle ml-4">Solicitudes De Vacaciones</a>
            </div> -->            

            <div class="card-body">

                <?php echo BootForm::open(['id'=>'form', 'method' => 'GET']);; ?>

                <div class="form-group">   
                    <div class="col-6 input-group">
                        <label class="text-dark" style="line-height: 2;"> No. de Empleado :&nbsp;</label>
                        <input type="search" class="form-control col-8" id="no_empleado" name="no_empleado">
                        <span class="col-2">
                            <?php echo Form::submit('Buscar', ['class' => 'btn btn-light']);; ?>                            
                        </span>
                    </div>                    
                </div> 
                <?php echo BootForm::close(); ?>

                 
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <th>Folio</th>
                            <th>Fecha</th>
                            <th>Inicio Vacaciones</th>
                            <th>Fin Vacaciones</th>
                            <th>No. Empleado</th>
                            <th>Nombre</th>
                            <th>Puesto</th>
                            <th>Departamento</th>
                            <th></th>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $vacaciones; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $vacacion): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($vacacion->folio_vac); ?></td>
                                    <td><?php echo e($vacacion->fecha_solicitud); ?></td>
                                    <td><?php echo e($vacacion->fech_ini_vac); ?></td>
                                    <td><?php echo e($vacacion->fech_fin_vac); ?></td>
                                    <td><?php echo e($vacacion->fk_no_empleado); ?></td>
                                    <td><?php echo e($vacacion->Nom_Emp.' '.$vacacion->Ap_Pat.' '.$vacacion->Ap_Mat); ?></td>
                                    <td><?php echo e($vacacion->Puesto); ?></td>
                                    <td><?php echo e($vacacion->Departamento); ?></td>
                                    <td>
                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </div>


            </div>
        </div>
    </div>
</div> 

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\sgd\resources\views\vacaciones\vacaciones_liberadas.blade.php ENDPATH**/ ?>