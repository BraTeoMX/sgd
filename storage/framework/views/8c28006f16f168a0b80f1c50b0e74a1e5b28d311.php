
<?php $__env->startSection('styleBFile'); ?>

<!-- Color Box -->
<link href="<?php echo e(asset('colorbox/colorbox.css')); ?>" rel="stylesheet">

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>

<div class="card">

    <div class="card-header">
        <h3 class="card-title">Autorizacion de Permisos</h3>
    </div>

    <div class="card-body">

        <?php echo BootForm::open(['id'=>'form', 'method' => 'GET']);; ?>

       
        <?php echo BootForm::close(); ?>

        
        <div class="row">
            <div class="col-md-12">
                <div class="table-responsive">
                    <table class="table toggle-circle">

                        <thead>
                                                 
                            <th></th>
                            <th></th>
                            <th>Folio</th>
                            <th>Fecha de solicitud</th>
                            
                            <th>Inicio permisos</th>
                            <th>Fin permisos</th>
                            <th>Hora Inicial</th>
                            <th>Hora Final</th>
                            <th>Motivo</th>
                            <th>No. Empleado</th>
                            <th>Nombre</th>
                            <th>Modulo</th>
                           
                            
                           <!-- <th>Puesto</th>
                            <th>Departamento</th>-->
                       
                        </thead>
                        <tbody>
                           
                            <?php $__currentLoopData = $permisos2; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $permiso): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                           
                                 <tr>
                                        <td><a class="btn btn-info" href="<?php echo route('formatopermisos.liberarPermisos',$permiso->folio_per); ?> ">Liberar</a></td>
                                           <td class="float-center">
                                               <?php echo Form::model($permisos2, ['method' => 'update', 'route' => ['formatopermisos.update',$permiso->folio_per] ]); ?>

                                               <a class="text-danger eliminar" style="cursor: pointer" onclick="">
                                                   <i class="btn btn-danger ">Denegar</i>
                                               </a>
                                               <?php echo Form::close(); ?>

                                            </td>
                                                    
                                            <td><?php echo e($permiso->folio_per); ?></td>
                                            <td><?php echo e($permiso->fecha_solicitud); ?></td>
                                            <td><?php echo e($permiso->fech_ini_per); ?></td>
                                            <td><?php echo e($permiso->fech_fin_per); ?></td> 
                                            <td><?php echo e($permiso->fech_ini_hor); ?></td> 
                                            <td><?php echo e($permiso->fech_fin_hor); ?></td> 
                                            <td><?php echo e($permiso->permiso); ?></td> 
                                            <td><?php echo e($permiso->fk_no_empleado); ?></td>
                                          
                                            <td><?php echo e($permiso->Nom_Emp.' '.$permiso->Ap_Pat.' '.$permiso->Ap_Mat); ?></td>
                                            <td><?php echo e($permiso->Modulo); ?></td>
                                        <!--    <td><?php echo e($permiso->Puesto); ?></td>
                                            <td><?php echo e($permiso->Departamento); ?></td>-->
                                              
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
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="sweetalert2.all.min.js"></script>

<?php $__env->startSection('scriptBFile'); ?>
    <script>
        $(document).ready(function() {
            if($('#existe').val()==1){
                Swal.fire({
                    title: '',
                    text: "Estimado colaborador, tu solicitud fue denegada por porcentaje de ausentismo.",
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
            };
            

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

            $('.cancelar').on('click', function(event) {
               

               Swal.fire({
                   title: 'Estimado colaborador, esta seguro de cancelar la solicitud?',
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
                       'La solicitud ha sido Cancelada satisfactoriamente!'
                       
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
              //  window.location.href = 'permisos.update';
                
            });
        });
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\xampp1\htdocs\intimark_sgd\resources\views/formatopermisos/autorizar.blade.php ENDPATH**/ ?>