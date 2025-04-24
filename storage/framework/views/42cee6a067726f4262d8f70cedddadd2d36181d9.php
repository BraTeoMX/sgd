
<?php $__env->startSection('styleBFile'); ?>

<!-- Color Box -->
<link href="<?php echo e(asset('colorbox/colorbox.css')); ?>" rel="stylesheet">

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>

<div class="card">

    <div class="card-header">
        <h3 class="card-title">Solicitud de Vacaciones</h3>
    </div>

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

        
        <div class="row">
            <div class="col-md-12">
                <div class="table-responsive">
                    <table class="table toggle-circle">

                        <thead>
                            <th>Folio</th>
                            <th>Fecha de solicitud</th>
                            <th>Fecha autorización</th>
                            <th>Inicio Vacaciones</th>
                            <th>Fin Vacaciones</th>
                            <th>No. Empleado</th>
                            <th>Modulo</th>
                            <th>Nombre</th>
                            <th>Puesto</th>
                            <th>Departamento</th>
                            <th>Estatus</th>
                            <th></th>
                        </thead>
                        <tbody>
                            <?php
                                $i=1;
                            ?>
                            <?php $__currentLoopData = $vacaciones; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $vac): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
                                <?php if($vac->Departamento == 'PRODUCCION' and  $vac->status=='APLICADO'): ?>
                                    <?php    
                                        $i++;
                                    ?>
                                <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                            <?php $__currentLoopData = $vacaciones; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $vacacion): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                
                                    <?php if(auth()->user()->hasRole('Jefe Administrativo')  ): ?>
                                    
                                        <?php if($vacacion->Departamento != 'PRODUCCION' ): ?>
                                            <tr>
                                                <td><?php echo e($vacacion->folio_vac); ?></td>
                                                <td><?php echo e($vacacion->fecha_solicitud); ?></td>
                                                <td><?php echo e($vacacion->fecha_aprobacion); ?></td>
                                                <td><?php echo e($vacacion->fech_ini_vac); ?></td>
                                                <td><?php echo e($vacacion->fech_fin_vac); ?></td>
                                                <td><?php echo e($vacacion->fk_no_empleado); ?></td>
                                                <td></td>
                                                <td><?php echo e($vacacion->Nom_Emp.' '.$vacacion->Ap_Pat.' '.$vacacion->Ap_Mat); ?></td>
                                                <td><?php echo e($vacacion->Puesto); ?></td>
                                                <td><?php echo e($vacacion->Departamento); ?></td>

                                                <?php if($vacacion->status=='ACTIVO'): ?>

                                                    <td><a class="btn btn-info" href="<?php echo route('liberarPermiso',$vacacion->folio_vac); ?> ">Liberar</a></td>
                                                    
                                                    <td class="float-center">
                                                        <?php echo Form::model($vacaciones, ['method' => 'update', 'route' => ['vacaciones.update',$vacacion->folio_vac] ]); ?>

                                                        <a class="text-danger denegar" style="cursor: pointer" onclick="">
                                                            <i class="btn btn-danger ">Denegar</i>
                                                        </a>
                                                        <?php echo Form::close(); ?>

                                                    </td>
                                                <?php else: ?>
                                                    <td><?php echo e($vacacion->status); ?></td>
                                                <?php endif; ?>
                                                
                                            </tr>
                                        <?php else: ?>
                                            <tr>
                                                <td><?php echo e($vacacion->folio_vac); ?></td>
                                                <td><?php echo e($vacacion->fecha_solicitud); ?></td>
                                                <td><?php echo e($vacacion->fecha_aprobacion); ?></td>
                                                <td><?php echo e($vacacion->fech_ini_vac); ?></td>
                                                <td><?php echo e($vacacion->fech_fin_vac); ?></td>
                                                <td><?php echo e($vacacion->fk_no_empleado); ?></td>
                                                <td><?php echo e($vacacion->Modulo); ?></td>
                                                <td><?php echo e($vacacion->Nom_Emp.' '.$vacacion->Ap_Pat.' '.$vacacion->Ap_Mat); ?></td>
                                                <td><?php echo e($vacacion->Puesto); ?></td>
                                                <td><?php echo e($vacacion->Departamento); ?></td>

                                                <?php if($vacacion->status=='ACTIVO'): ?>
                                                    <?php $__currentLoopData = $parametros; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $parametro): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <?php if($parametro->clave == 'aus_vac'): ?>
                                                            <?php
                                                                $valor_ausentismo = ceil($parametro->valor);
                                                            ?>
                                                        <?php endif; ?>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>     
                                                   
                                                    <?php if($i>$valor_ausentismo ): ?>
                                                        <td><a class="btn btn-danger denegar" href="<?php echo route('denegarPermiso',$vacacion->folio_vac); ?> ">Denegar</a></td>
                                                    <?php else: ?>
                                                        <td><a class="btn btn-info" href="<?php echo route('liberarPermiso',$vacacion->folio_vac); ?> ">Liberar</a></td>
                                                        <td class="float-center">
                                                        <?php echo Form::model($vacaciones, ['method' => 'update', 'route' => ['vacaciones.update',$vacacion->folio_vac] ]); ?>

                                                        <a class="text-danger eliminar" style="cursor: pointer" onclick="">
                                                            <i class="btn btn-danger ">Denegar</i>
                                                        </a>
                                                        <?php echo Form::close(); ?>

                                                    </td>
                                                         
                                                   <?php endif; ?>
                                                <?php else: ?>
                                                    <td><?php echo e($vacacion->status); ?></td>
                                                <?php endif; ?>
                                                
                                            </tr>                                      
                                        <?php endif; ?>    
                                    <?php else: ?>
                                           
                                        <?php if($vacacion->Departamento == 'PRODUCCION' ): ?>
                                            
                                            <tr>
                                                <td><?php echo e($vacacion->folio_vac); ?></td>
                                                <td><?php echo e($vacacion->fecha_solicitud); ?></td>
                                                <td><?php echo e($vacacion->fecha_aprobacion); ?></td>
                                                <td><?php echo e($vacacion->fech_ini_vac); ?></td>
                                                <td><?php echo e($vacacion->fech_fin_vac); ?></td> 
                                                <td><?php echo e($vacacion->fk_no_empleado); ?></td>
                                                <td><?php echo e($vacacion->Modulo); ?></td>
                                                <td><?php echo e($vacacion->Nom_Emp.' '.$vacacion->Ap_Pat.' '.$vacacion->Ap_Mat); ?></td>
                                                <td><?php echo e($vacacion->Puesto); ?></td>
                                                <td><?php echo e($vacacion->Departamento); ?></td>
                                                
                                                
                                                <?php if($vacacion->status=='ACTIVO'): ?>
                                                    <?php $__currentLoopData = $parametros; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $parametro): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <?php if($parametro->clave == 'aus_vac'): ?>
                                                            <?php
                                                                $valor_ausentismo = ceil($parametro->valor);
                                                            ?>
                                                        <?php endif; ?>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>     
                                                   
                                                    <?php if($i>$valor_ausentismo and !auth()->user()->hasRole('VIP')): ?>
                                                        <td><a class="btn btn-danger denegar" href="<?php echo route('denegarPermiso',$vacacion->folio_vac); ?> ">Denegar</a></td>
                                                    <?php else: ?>
                                                        <td><a class="btn btn-info" href="<?php echo route('liberarPermiso',$vacacion->folio_vac); ?> ">Liberar</a></td>
                                                        <td class="float-center">
                                                        <?php echo Form::model($vacaciones, ['method' => 'update', 'route' => ['vacaciones.update',$vacacion->folio_vac] ]); ?>

                                                        <a class="text-danger denegar" style="cursor: pointer" onclick="">
                                                            <i class="btn btn-danger ">Denegar</i>
                                                        </a>
                                                        <?php echo Form::close(); ?>

                                                    </td>
                                                         
                                                   <?php endif; ?>
                                                <?php else: ?>
                                                    <td><?php echo e($vacacion->status); ?></td>
                                                <?php endif; ?>
                                               
                                            </tr>
                                        <?php endif; ?>    
                                    <?php endif; ?>
                                
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            
                        </tbody>
                        
                    </table>
                </div>
            </div>
        </div>
    </div>
</div> 

<?php $__env->stopSection(); ?>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="sweetalert2.all.min.js"></script>

<?php $__env->startSection('scriptBFile'); ?>
    <script>
        $(document).ready(function() {

            $('.eliminar').on('click', function(event) {
               

                Swal.fire({
                    title: 'Estimado colaborador, esta seguro de denegar la solicitud?',
                    text: "",
                    //icon: 'warning',
                    imageUrl: 'img/logo.png',
                    imageWidth: 400,
                    imageHeight: 200,
                    imageAlt: 'Custom image',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Aceptar!'
                    }).then((result) => {
                    if (result.isConfirmed) {
                        Swal.fire(
                        'La solicitud ha sido Denegada satisfactoriamente!'
                        )
                        $(this).closest('form').submit();
                    }
                    })
                    /* event.preventDefault();
                var respuesta = confirm('¿Desea cancelar la solicitud?');
                if (respuesta) {
                    
                    $(this).closest('form').submit();
                } else {
                    return false;
                }*/
            });

            $('.denegar').on('click', function(event) {
              //  alert('Solicitud Denegada por Porcentaje de ausentismo en el modulo');
                Swal.fire({
                    title: '',
                    text: "Estimado colaborador, tu solicitud ha sido denegada por porcentaje de ausentismo en el módulo.",
                    imageUrl: 'img/logo.png',
                    imageWidth: 400,
                    imageHeight: 200,
                    imageAlt: 'Custom image',
                    showCancelButton: false,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Aceptar!'
                }).then((result) => {
                  //  $(this).closest('form').submit();
                    /* if (result.isConfirmed) {
                    Swal.fire(
                        'Deleted!',
                        'Your file has been deleted.',
                        'success'
                    )
                   }*/
                })
                
               // $(this).closest('form').submit();
              //  window.location.href = 'vacaciones.update';
                
            });
        });
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\intimark\resources\views/vacaciones/index.blade.php ENDPATH**/ ?>