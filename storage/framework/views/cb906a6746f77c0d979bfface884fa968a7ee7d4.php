

<?php $__env->startSection('styleBFile'); ?>

<!-- Color Box -->
<link href="<?php echo e(asset('colorbox/colorbox.css')); ?>" rel="stylesheet">

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    <div class="card">
        <div class="card-header">
            <h3>Solicitud de Vacaciones</h3>
        </div>
        <div class="card-body">
            <?php echo Form::open(['route'=>'vacaciones.store', 'method'=>'POST', 'files'=>TRUE ]); ?>

            <?php $__empty_1 = true; $__currentLoopData = $datosEmpleado; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $vacacion): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <?php echo BootForm::hidden('id_emp', $vacacion->id_empleado);; ?>

                <?php echo BootForm::hidden('tag_emp', $vacacion->No_TAG);; ?>


                <div class="row">
                    <div class="col-lg-3 col-md-3">    
                        <?php echo BootForm::text('id_planta', 'PLANTA ', $vacacion->Id_Planta, ['width'=>'col-md-6','readonly']);; ?>

                    </div>
                    <div class="col-lg-3 col-md-3">                                
                        <?php echo BootForm::text('no_empleado', 'EMPLEADO ', $vacacion->No_Empleado, ['width'=>'col-md-3','readonly']);; ?>

                    </div>
                    <div class="col-lg-3 col-md-3">                                
                        <?php echo BootForm::text('modulo_emp', 'MODULO ', $vacacion->Modulo, ['width'=>'col-md-3','readonly']);; ?>

                    </div>
                    <div class="col-lg-3 col-md-3">                                
                        <?php echo BootForm::text('modulo_emp', 'TURNO ', $vacacion->Id_Turno, ['width'=>'col-md-3','readonly']);; ?>

                    </div>
                </div>    
                <div class="row">
                    <div class="col-lg-4 col-md-4">                                
                        <?php echo BootForm::text('nom_emp', 'NOMBRE ', $vacacion->Nom_Emp, ['width'=>'col-md-3','readonly']);; ?>

                    </div>
                    <div class="col-lg-4 col-md-4">                                
                        <?php echo BootForm::text('ap_pat', 'APELLIDO PATERNO ', $vacacion->Ap_Pat, ['width'=>'col-md-3','readonly']);; ?>

                    </div>
                    <div class="col-lg-4 col-md-4">                                
                        <?php echo BootForm::text('ap_mat', 'APELLIDO MATERNO ', $vacacion->Ap_Mat, ['width'=>'col-md-3','readonly']);; ?>

                    </div>
                </div>
                <div class="row">  
                    <?php $__currentLoopData = $puestos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $puesto): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if($puesto->id_Puesto == $vacacion->Puesto): ?>
                            <div class="col-lg-6 col-md-6">                                
                                <?php echo BootForm::text('puesto', 'PUESTO ', $puesto->Puesto , ['width'=>'col-md-3','readonly']);; ?>

                            </div>
                        <?php endif; ?> 
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>       
                    <?php $__currentLoopData = $departamentos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dep): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if($dep->id_Departamento == $vacacion->Departamento): ?>
                            <div class="col-lg-6 col-md-6">                               
                                <?php echo BootForm::text('departamento', 'DEPARTAMENTO ', $dep->Departamento, ['width'=>'col-md-3','readonly']);; ?>

                            </div>
                        <?php endif; ?> 
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>   
                </div>     
                <div class="row">    
                    <div class="col-lg-3 col-md-3">                                
                        <?php echo BootForm::text('fecha_in', 'FECHA DE ANTIGUEDAD ', $vacacion->Fecha_In, ['width'=>'col-md-3','readonly']);; ?>   
                    </div>
                    <div class="col-lg-3 col-md-3">
                        <?php if($vacacion->Frec_Pago=='00001'): ?>
                            <?php echo BootForm::text('frec_pago', 'PAGO', 'SEMANAL', ['width'=>'col-md-3','readonly']);; ?>

                        <?php else: ?> 
                            <?php if($vacacion->Frec_Pago=='00002'): ?>
                                <?php echo BootForm::text('frec_pago', 'PAGO', 'QUINCENAL', ['width'=>'col-md-3','readonly']);; ?>

                            <?php else: ?>
                                <?php echo BootForm::text('frec_pago', 'PAGO', 'CONFIDENCIAL', ['width'=>'col-md-3','readonly']);; ?>

                            <?php endif; ?>    
                        <?php endif; ?>    
                    </div>
                    <?php 
                        $total_vac=$vacacion->Dias_Dispo-2;
                        $total_eventualidad=0;
                        $total_periodo=0;
                    ?>
                    <?php $__currentLoopData = $vacaciones; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $vac): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php
                            $total_vac = $total_vac-$vac->dias_solicitud;
                        ?>    
                        <?php if($vac->eventualidades==1): ?>
                            <?php
                                $total_eventualidad=$total_eventualidad+1;
                            ?>
                        <?php else: ?>
                            <?php
                                $total_periodo=$total_periodo+1;
                            ?>
                        <?php endif; ?>    
                             
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <div class="col-lg-2 col-md-2">                                
                        <?php echo BootForm::text('saldo_dias', 'SALDO DE DIAS', number_format($total_vac+2,0), ['width'=>'col-md-3','readonly']);; ?>

                    </div>
                    <div class="col-lg-2 col-md-2">                                
                        <?php echo BootForm::text('dias_reservados', 'DIAS RESERVADOS', number_format('2',0), ['width'=>'col-md-3','readonly']);; ?>

                    </div>
                    <div class="col-lg-2 col-md-2">                                
                        <?php echo BootForm::text('dias_disponibles', 'DIAS DISPONIBLES', number_format($total_vac,0), ['width'=>'col-md-3','readonly']);; ?>

                    </div>
                </div>
                <div class="row">  
                    <div class="col-lg-3 col-md-3">
                        <p>EVENTUALIDAD</p>
                        <select class='form-control' aria-label="Default select example" name="eventualidad" id="eventualidad">
                            <option value= 0 ><?php echo e('--SELECCIONE--'); ?></option>
                            <option value= 1 ><?php echo e('SI'); ?></option>
                            <option value= 2 ><?php echo e('NO'); ?></option>
                        </select>
                    </div>   
                    <div class="col-lg-3 col-md-3">   
                        <?php $__currentLoopData = $parametros; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $parametro): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if($parametro->clave == 'eve_vac'): ?>
                                <?php
                                    $valor_event = $parametro->valor;
                                ?>
                            <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>           
                       
                        <?php echo BootForm::text('eventualidades', 'EVENTUALIDADES',$total_eventualidad.'/'. $valor_event, ['width'=>'col-md-3','readonly']);; ?>

                    </div>
                    <div class="col-lg-3 col-md-3">   
                         <?php $__currentLoopData = $parametros; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $parametro): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if($parametro->clave == 'per_vac'): ?>
                                <?php
                                    $valor_periodo = $parametro->valor;
                                ?>
                            <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>                                 
                        <?php echo BootForm::text('periodos', 'PERIODOS', $total_periodo.'/'.$valor_periodo, ['width'=>'col-md-3','readonly']);; ?>

                    </div>
                </div>
                <div class="row">    
                    <?php
                        $hoy= date('Y-m-d');
                    ?> 
                    <div class="col-lg-3 col-md-3"  style="display: none" id='id_inicio_vac'>
                        <?php echo BootForm::date('inicio_vac', 'INICIO DE VACACIONES','',['width'=>'col-md-3', 'min'=>$hoy]); ?>

                    </div>
                    <div class="col-lg-3 col-md-3"  style="display: none" id='id_fin_vac'>
                        <?php echo BootForm::date('fin_vac', 'FIN DE VACACIONES','',['width'=>'col-md-3', 'min'=> $hoy]); ?>                
                    </div>
                    <div class="col-lg-3 col-md-3" >
                        <?php echo BootForm::text('dias_laborales', 'NUMERO DE DIAS SOLICITADOS', '', ['width'=>'col-md-3','readonly']); ?>       
                    </div>
                </div>
                <?php if(auth()->user()->hasRole('Team Leader')  ): ?>
                <div class="row">      
                    <div class="col-lg-6 col-md-6">
                        <p>PERSONA RESPONSABLE DE AUTORIZAR</p>
                            <?php echo BootForm::text('', ' ', strtoupper(auth()->user()->name), ['width'=>'col-md-3','readonly']);; ?>  
                    </div>
                </div> 
                <?php else: ?>
                
                <div class="row">      
                    <div class="col-lg-6 col-md-6">
                        <p>PERSONA RESPONSABLE DE AUTORIZAR</p>
                       
                            <select class='form-control' aria-label="Default select example" name="idjefe" id="idjefe">
                                <?php $__empty_2 = true; $__currentLoopData = $datosJefe; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_2 = false; ?>
                                    <?php if($i->id_puesto_solicitante != $i->id_jefe ): ?>
                                        <option value=<?php echo e($i->No_Empleado); ?>><?php echo e($i->Nom_Emp.' '.$i->Ap_Pat.' '.$i->Ap_Mat); ?></option>
                                    <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_2): ?>
                                <?php endif; ?>
                            </select>
                      
                    </div>
                </div>    
                <?php endif; ?>
                <br>
                <div class="row" style="display: none" id ='id_enviar'>
                    <div class="col center">
                        <button type="submit" name="solicitar" id='solicitar' value="Solicitar vacaciones" class="btn btn-primary">Enviar</button>
                        <a href="<?php echo route('home'); ?>" class="btn btn-light">Cancelar</a>
            
                    </div> 
                </div>        
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <div class="col-md-4">
                    <label for="">No existe el empleado</label>              
                </div>                        
            <?php endif; ?>    
        </div>
        <?php echo form::close(); ?>

    </div>


<?php $__env->stopSection(); ?>



<?php $__env->startSection('scriptBFile'); ?>

<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="sweetalert2.all.min.js"></script>


<script>
    $(document).ready(function() {
        if($('#dias_disponibles').val()<=0){
           
           Swal.fire({
                title: '',
                text: "Estimado colaborador, por el momento no cuentas con días disponibles para vacaciones",
                imageUrl: 'img/logo.png',
                imageWidth: 400,
                imageHeight: 200,
                imageAlt: 'Custom image',
                //icon: 'warning',
                showCancelButton: false,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Aceptar!'
                }).then((result) => {
                    window.location.href = '/home';
                /* if (result.isConfirmed) {
                    Swal.fire(
                    'Deleted!',
                    'Your file has been deleted.',
                    'success'
                    )
                }*/
         })
           // window.location.href = '/home';
        };

        $('#eventualidad').change(function () {
            if($('#eventualidad').val() == 1){
                $('#id_inicio_vac').show();
                $('#id_fin_vac').hide();
                $('#dias_laborales').val(1);
                $('#id_enviar').hide();

                if($('#eventualidades').val().substr(0,1) == $('#eventualidades').val().substr(2,1) ){
                 
                    Swal.fire({
                        title: '',
                        text: "Estimado colaborador, has cubierto el número de eventualidades permitidas",
                        imageUrl: 'img/logo.png',
                        imageWidth: 400,
                        imageHeight: 200,
                        imageAlt: 'Custom image',
                        //icon: 'warning',
                        showCancelButton: false,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Aceptar!'
                        }).then((result) => {
                            window.location.href = '/home';
                        /* if (result.isConfirmed) {
                            Swal.fire(
                            'Deleted!',
                            'Your file has been deleted.',
                            'success'
                            )
                        }*/
                  })
                }

            } else if ($('#eventualidad').val() == 2){

                if($('#periodos').val().substr(0,1) == $('#periodos').val().substr(2,1) ){
                  //  alert("Se han cubierto el numero de periodos permitidos, favor de verificar");
                   // window.location.href = '/home';
                    Swal.fire({
                        title: '',
                        text: "Estimado colaborador, has cubierto el número de periodos permitidos",
                        imageUrl: 'img/logo.png',
                        imageWidth: 400,
                        imageHeight: 200,
                        imageAlt: 'Custom image',
                        //icon: 'warning',
                        showCancelButton: false,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Aceptar!'
                        }).then((result) => {
                            window.location.href = '/home';
                        /* if (result.isConfirmed) {
                            Swal.fire(
                            'Deleted!',
                            'Your file has been deleted.',
                            'success'
                            )
                        }*/
                  })
                }
                $('#id_inicio_vac').show();
                if($('#dias_disponibles').val()==1){
                    $('#id_fin_vac').hide();
                }else{    
                    $('#id_fin_vac').show();
                }    
                $('#id_enviar').hide();
            }else{
                $('#id_inicio_vac').hide();
                $('#id_fin_vac').hide();
                $('#id_enviar').hide();
            }
        });    

        $('#inicio_vac').change(function () {
            var FechaI = new Date($('#inicio_vac').val());
            var AnyoFecha = FechaI.getFullYear();
            var MesFecha = FechaI.getMonth()+1;
            var DiaFecha = FechaI.getDate()+1;

            var Hoy = new Date(); 
            var AnyoHoy = Hoy.getFullYear();
            var MesHoy = Hoy.getMonth()+1;
            var DiaHoy = Hoy.getDate();

            var DiaSemana = DiaHoy+7;
            
            /*if(DiaSemana<=0){
                if(MesHoy==12){
                    DiaSemana=DiaSemana+31;
                }
            }*/

            var validadorFecha=0;
            var validadorFecha2=0;
            
            if (AnyoFecha < AnyoHoy){
                validadorFecha=1;          
            }else{
                if (AnyoFecha == AnyoHoy && MesFecha < MesHoy){
                    validadorFecha=1;  
                }else{
                    if (AnyoFecha == AnyoHoy && MesFecha == MesHoy && DiaFecha < DiaHoy){
                        validadorFecha=1;
                    }
                }
            }

;           if (AnyoFecha == AnyoHoy ){
                if( MesFecha == MesHoy &&  DiaFecha < DiaSemana){
                    validadorFecha2=1;
                }else{
                    if(DiaFecha < DiaSemana){
                        validadorFecha2=1;
                    }
                }
                  
            }
           

           if($('#eventualidad').val() == 1){
                
                if( validadorFecha==1 ) 
                {
                   // alert('Las fechas no pueden ser menor de la fecha actual');
                    Swal.fire({
                        title: '',
                        text: "Estimado colaborador, por favor ingresa una fecha posterior a la actual.",
                        imageUrl: 'img/logo.png',
                        imageWidth: 400,
                        imageHeight: 200,
                        imageAlt: 'Custom image',
                        //icon: 'warning',
                        showCancelButton: false,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Aceptar!'
                        }).then((result) => {
                            $('#inicio_vac').val('');
                             $('#id_enviar').hide();  
                           
                        
                  })
                   
                }else{
                    $('#id_enviar').show();     
                }
            }else{
                if($('#dias_disponibles').val()==1){
                    $('#dias_laborales').val(1);
                   
                    if( validadorFecha==1 ) 
                    {
                       // alert('Las fechas no pueden ser menor de la fecha actual');
                        Swal.fire({
                                title: '',
                                text: "Estimado colaborador, por favor ingresa una fecha posterior a la actual.",
                                imageUrl: 'img/logo.png',
                                imageWidth: 400,
                                imageHeight: 200,
                                imageAlt: 'Custom image',
                                showCancelButton: false,
                                confirmButtonColor: '#3085d6',
                                cancelButtonColor: '#d33',
                                confirmButtonText: 'Aceptar!'
                                }).then((result) => {
                                    $('#inicio_vac').val('');
                                    $('#id_enviar').hide();   
                        })
                           
                    }else{
                        if( validadorFecha2==1){
                          //  alert('Las vacaciones deben ser ingresadas mínimo con una semana de anticipación');
                            Swal.fire({
                                title: '',
                                    text: "Estimado colaborador, el periodo de vacaciones debe ser ingresado mínimo con una semana de anticipación.",
                                    imageUrl: 'img/logo.png',
                                    imageWidth: 400,
                                    imageHeight: 200,
                                    imageAlt: 'Custom image',
                                    showCancelButton: false,
                                    confirmButtonColor: '#3085d6',
                                    cancelButtonColor: '#d33',
                                    confirmButtonText: 'Aceptar!'
                                    }).then((result) => {
                                        $('#inicio_vac').val('');
                                         $('#id_enviar').hide();   
                            })
                             
                        }else{
                            $('#id_enviar').show();
                        }

                    }
                }else{
                    $('#dias_laborales').val(1);
                   
                    if( validadorFecha==1 ) 
                    {
                       // alert('Las fechas no pueden ser menor de la fecha actual');
                        Swal.fire({
                            title: '',
                                text: "Estimado colaborador, por favor ingresa una fecha posterior a la actual.",
                                imageUrl: 'img/logo.png',
                                imageWidth: 400,
                                imageHeight: 200,
                                imageAlt: 'Custom image',
                                showCancelButton: false,
                                confirmButtonColor: '#3085d6',
                                cancelButtonColor: '#d33',
                                confirmButtonText: 'Aceptar!'
                                }).then((result) => {
                                    $('#inicio_vac').val('');
                                    $('#id_enviar').hide();   
                        })
                           
                    }else{
                        if( validadorFecha2==1){
                          //  alert('Las vacaciones deben ser ingresadas mínimo con una semana de anticipación');
                            Swal.fire({
                                title: '',
                                    text: "Estimado colaborador, el periodo de vacaciones debe ser ingresado mínimo con una semana de anticipación.",
                                    imageUrl: 'img/logo.png',
                                    imageWidth: 400,
                                    imageHeight: 200,
                                    imageAlt: 'Custom image',
                                    showCancelButton: false,
                                    confirmButtonColor: '#3085d6',
                                    cancelButtonColor: '#d33',
                                    confirmButtonText: 'Aceptar!'
                                    }).then((result) => {
                                        $('#inicio_vac').val('');
                                         $('#id_enviar').hide();   
                            })
                             
                        }else{
                            $('#id_enviar').show();
                        }

                    }
                }
            }
        });

        $('#fin_vac').change(function () {
           
            var disponibles = +$('#dias_disponibles').val();

            var FechaI = new Date($('#inicio_vac').val());
            var AnyoFecha = FechaI.getFullYear();
            var MesFecha = FechaI.getMonth()+1;
            var DiaFecha = FechaI.getDate()+1;

            var FechaF = new Date($('#fin_vac').val());
            var AnyoFecha2 = FechaF.getFullYear();
            var MesFecha2 = FechaF.getMonth()+1;
            var DiaFecha2 = FechaF.getDate()+1;

            var Hoy = new Date(); 
            var AnyoHoy = Hoy.getFullYear();
            var MesHoy = Hoy.getMonth()+1;
            var DiaHoy = Hoy.getDate();

            var DiaSemana = DiaHoy+7;

            /*if(DiaSemana<=0){
                if(MesHoy==12){
                    DiaSemana=DiaSemana+31;
                }
            }*/

            var validadorFecha=0;
            var validadorFecha2=0;
            var validadorFecha3=0;
            
            if (AnyoFecha < AnyoHoy){
                validadorFecha=1;          
            }else{
                if (AnyoFecha == AnyoHoy && MesFecha < MesHoy){
                    validadorFecha=1;  
                }else{
                    if (AnyoFecha == AnyoHoy && MesFecha == MesHoy && DiaFecha < DiaHoy){
                        validadorFecha=1;
                    }
                }
            }

            if (AnyoFecha > AnyoFecha2){
                validadorFecha3=1;          
            }else{
                if (AnyoFecha == AnyoFecha2 && MesFecha > MesFecha2){
                    validadorFecha3=1;  
                }else{
                    if (AnyoFecha == AnyoFecha2 && MesFecha == MesFecha2 && DiaFecha > DiaFecha2){
                        validadorFecha3=1;
                    }
                }
            }

           if (AnyoFecha == AnyoHoy ){
                if( MesFecha == MesHoy &&  DiaFecha < DiaSemana){
                    validadorFecha2=1;
                }else{
                    if(DiaFecha < DiaSemana){
                        validadorFecha2=1;
                    }
                }
                  
            }

            if( validadorFecha==1 ) 
            {
              // alert('Las fechas no pueden ser menor de la fecha actual');
              Swal.fire({
                title: '',
                    text: "Estimado colaborador, por favor ingresa una fecha posterior a la actual.",
                    imageUrl: 'img/logo.png',
                    imageWidth: 400,
                    imageHeight: 200,
                    imageAlt: 'Custom image',
                    showCancelButton: false,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Aceptar!'
                    }).then((result) => {
                        $('#inicio_vac').val('');
                        $('#fin_vac').val('');
                        $('#id_enviar').hide();  
                })
                
            }else{
               if( validadorFecha3==1 ) 
                {
                    //alert('Las fecha final no puede ser menor a la fecha inical');
                    Swal.fire({
                        title: '',
                        text: "Estimado colaborador, por favor ingresa una fecha posterior a la actual.",
                        imageUrl: 'img/logo.png',
                        imageWidth: 400,
                        imageHeight: 200,
                        imageAlt: 'Custom image',
                        showCancelButton: false,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Aceptar!'
                        }).then((result) => {
                            $('#inicio_vac').val('');
                            $('#fin_vac').val('');
                            $('#id_enviar').hide();  
                    })
                }else{
                
                    var difM = FechaF - FechaI ; // diferencia en milisegundos
                    var difD = difM / (1000 * 60 * 60 * 24); // diferencia en dias
                    var difD = difD +1;

                    weeks = 0;
                    for(i = 0; i < difD; i++){
                        if (FechaI.getDay () == 0 || FechaI.getDay () == 6) weeks ++; // agrega 1 si es sábado o domingo
                        FechaI = FechaI.valueOf();
                        FechaI += 1000 * 60 * 60 * 24;
                        FechaI = new Date(FechaI);
                    }

                    difD = difD - weeks;
                    
                    $('#dias_laborales').val(difD);
                    var solicitados = +$('#dias_laborales').val();

                    if (disponibles==1)
                    {
                        //alert('Solo puede tomar 1 dia de vacaciones como remanente');
                        Swal.fire({
                            title: '',
                            text: "Estimado colaborador, solo se le otorgara un dia de vacaciones como remanente.",
                            imageUrl: 'img/logo.png',
                            imageWidth: 400,
                            imageHeight: 200,
                            imageAlt: 'Custom image',
                            showCancelButton: false,
                            confirmButtonColor: '#3085d6',
                            cancelButtonColor: '#d33',
                            confirmButtonText: 'Aceptar!'
                            }).then((result) => {
                                $('#dias_laborales').val('');
                                $('#inicio_vac').val('');
                                $('#fin_vac').val('');
                                $('#fin_vac').hide();
                                $('#id_fin_vac').hide();  
                        })    
                       
                    }else{
                        if (solicitados == 1){
                          //  alert( "El periodo de vacaciones debe de ser de 2 dias o mayor" );
                            Swal.fire({
                                title: '',
                                text: "Estimado colaborador, el periodo vacacional debe considerar como mínimo 2 días, favor de verificar",
                                imageUrl: 'img/logo.png',
                                imageWidth: 400,
                                imageHeight: 200,
                                imageAlt: 'Custom image',
                                showCancelButton: false,
                                confirmButtonColor: '#3085d6',
                                cancelButtonColor: '#d33',
                                confirmButtonText: 'Aceptar!'
                                }).then((result) => {
                                    $('#inicio_vac').val('');
                                    $('#fin_vac').val('');
                                    $('#dias_laborales').val('');
                                    $('#dias_laborales').focus();
                                    $('#id_enviar').hide(); 
                            })    
                           
                        }else{    
                            if (solicitados > disponibles){
                                if(disponibles != 0){
                                    //alert( "!! Los dias Solicitados: "+solicitados+" excede el número de dias disponibles: "+disponibles+", favor de verificar." );
                                    Swal.fire({
                                        title: '',
                                        text: "Estimado colaborador, el periodo de días solicitados "+solicitados+" excede el número de dias disponibles: "+disponibles+", favor de verificar",
                                        imageUrl: 'img/logo.png',
                                        imageWidth: 400,
                                        imageHeight: 200,
                                        imageAlt: 'Custom image',
                                        showCancelButton: false,
                                        confirmButtonColor: '#3085d6',
                                        cancelButtonColor: '#d33',
                                        confirmButtonText: 'Aceptar!'
                                        }).then((result) => {
                                            $('#inicio_vac').val('');
                                            $('#fin_vac').val('');
                                            $('#dias_laborales').val('');
                                            $('#dias_laborales').focus();
                                           $('#id_enviar').hide();
                                    })    
                                  
                                }else{
                                    //alert( "Lo sentimos, no tienes dias disponibles" );
                                    Swal.fire({
                                        title: '',
                                            text: "Estimado colaborador, por el momento no cuentas con días disponibles para vacaciones",
                                            imageUrl: 'img/logo.png',
                                            imageWidth: 400,
                                            imageHeight: 200,
                                            imageAlt: 'Custom image',
                                            //icon: 'warning',
                                            showCancelButton: false,
                                            confirmButtonColor: '#3085d6',
                                            cancelButtonColor: '#d33',
                                            confirmButtonText: 'Aceptar!'
                                            }).then((result) => {
                                                window.location.href = 'vacaciones.solicitarvacaciones';
                                            /* if (result.isConfirmed) {
                                                Swal.fire(
                                                'Deleted!',
                                                'Your file has been deleted.',
                                                'success'
                                                )
                                            }*/
                                    })
                                  //  window.location.href = 'vacaciones.solicitarvacaciones';
                                }
                            }else{
                                if(validadorFecha2==1){
                                   // alert('Las vacaciones deben ser ingresadas mínimo con una semana de anticipación');
                                        Swal.fire({
                                            title: '',
                                        text: "Estimado colaborador, el periodo de vacaciones debe ser ingresado mínimo con una semana de anticipación.",
                                        imageUrl: 'img/logo.png',
                                        imageWidth: 400,
                                        imageHeight: 200,
                                        imageAlt: 'Custom image',
                                        showCancelButton: false,
                                        confirmButtonColor: '#3085d6',
                                        cancelButtonColor: '#d33',
                                        confirmButtonText: 'Aceptar!'
                                        }).then((result) => {
                                            $('#inicio_vac').val('');
                                            $('#fin_vac').val('');
                                            $('#dias_laborales').val('');
                                            $('#dias_laborales').focus();
                                            $('#id_enviar').hide(); 
                                    })    
                                      
                                }else{
                                    $('#id_enviar').show();
                                }       
                            }   
                        }
                    }
                }
            }
        });

        $("#fin_vac").datetimepicker({
                changeMonth : true,
                changeYear : true,
                autoclose: true,
                firstDay : 1,
                format: "dd/mm/yyyy",
                language: "es",
                datesDisabled: '06/02/2023',
            });
    });
    $("#inicio_vac").datetimepicker({
                changeMonth : true,
                changeYear : true,
                autoclose: true,
                firstDay : 1,
                format: "dd/mm/yyyy",
                language: "es",
                datesDisabled: '06/02/2023',
            });
        
         
 $( "#solicitar" ).click(function() {
    
  // alert( "solicitud enviada con exito." );     
    Swal.fire('Solicitud enviada con exito')

                                
 });
   
 
</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\intimark\resources\views/vacaciones/solicitud_vac.blade.php ENDPATH**/ ?>