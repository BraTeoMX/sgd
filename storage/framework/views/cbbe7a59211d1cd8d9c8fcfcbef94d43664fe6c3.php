<?php $__env->startSection('styleBFile'); ?>
    <!-- Color Box -->
    <link href="<?php echo e(asset('colorbox/colorbox.css')); ?>" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <script>
        $(document).ready(function() {
            document.getElementById("no_empleado").focus();
            <?php if(isset($empleado)): ?>
                $('#formbuscar').hide();
                $('#icobuscar').show();
            <?php endif; ?>
        });
    </script>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="card">
        <div class="card-body" id="formbuscar">
            <h3>Incapacidades</h3>
            <?php echo Form::open(['route' => 'incapacidades.create', 'method' => 'get', 'files' => true]); ?>

            <div class="row">
                <div class="col-lg-3 col-md-3">
                    <?php echo BootForm::text('no_empleado', 'No. de Empleado ', null, ['id' => 'no_empleado']); ?>

                </div>
            </div>
            <div class="row" style="display" id='id_buscar'>
                <div class="col center">
                    <button type="submit" name="solicitar" id='solicitar' value="Solicitar permisos"
                        class="btn btn-primary">Buscar empleado</button>
                    <a href="<?php echo route('home'); ?>" class="btn btn-light">Cancelar</a>
                </div>
            </div>
            <?php echo form::close(); ?>

        </div>
        <div class="card-body text-right" style="display: none;" id="icobuscar">
            <div class="col center">
                <button class="btn btn-primary" onclick="showAlert()">Buscar empleado</button>
            </div>
        </div>

    </div>

    <div class="card">
        <?php if($errors->any()): ?>
            <div class="alert alert-danger">
                <ul>
                    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li><?php echo e($error); ?></li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            </div>
        <?php endif; ?>
        <div class="card-body">
            <?php if(isset($empleado)): ?>
                <?php
                    $hoy = date('Y-m-d');
                    $ayer = date('Y-m-d', strtotime($hoy . '- 1 days'));
                ?>
                <?php $__empty_1 = true; $__currentLoopData = $empleado; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $emp): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <h3>Datos Del Empleado</h3>
                    <?php echo Form::open(['route' => 'incapacidades.store', 'method' => 'post', 'files' => true]); ?>

                    <?php echo BootForm::hidden('no_aux', auth()->user()->no_empleado); ?>

                    <div class="row">
                        <div class="col-md-2">
                            <?php echo BootForm::text('no_emp', 'No. EMPLEADO ', $emp->No_Empleado, ['width' => 'col-md-3', 'readonly']); ?>

                        </div>
                        <div class="col-md-4">
                            <?php echo BootForm::text('nom_empleado', 'Nombre ', $emp->Nom_Emp . ' ' . $emp->Ap_Pat . ' ' . $emp->Ap_Mat, [
                                'width' => 'col-md-3',
                                'readonly',
                            ]); ?>

                        </div>
                        <div class="col-md-4">
                            <?php echo BootForm::text('departamento', 'Departamento', $emp->Departamento, ['width' => 'col-md-3', 'readonly']); ?>

                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-3">
                            <?php echo BootForm::text('folio', 'Folio de la incapacidad', null, ['width' => 'col-md-3', 'maxlength' => 8]); ?>

                        </div>
                        <div class="col-md-3">
                            <?php echo BootForm::date('inicio', 'Inicio Incapacidad', null, ['width' => 'col-md-3']); ?>

                        </div>
                        <div class="col-md-3">
                            <?php echo BootForm::text('dias', 'Dias de incapacidad', null, ['width' => 'col-md-3']); ?>

                        </div>
                        <div class="col-md-3">
                            <?php echo BootForm::date('fin', 'Fin Incapacidad', null, ['width' => 'col-md-3', 'readonly']); ?>

                        </div>
                        <div class="col-md-3">
                            <?php echo BootForm::select('tipo', 'Tipo de incapacidad', [
                                'SELECCIONE UN TIPO',
                                '01' => 'Inicial',
                                '02' => 'Subsecuente',
                                '03' => 'Recaída',
                                '04' => 'Probable riesgo de trabajo',
                            ]); ?>

                        </div>
                        <div class="col-md-3">
                            <?php echo BootForm::select('ramo', 'Ramo de seguro', [
                                'SELECCIONE UN RAMO',
                                '01' => 'Enfermedad general',
                                '02' => 'Maternidad',
                            ]); ?>

                        </div>
                        <div class="col-md-3">
                            <?php echo BootForm::select('riesgo', 'Probable riesgo', ['SELECCIONE', '01' => 'SI', '02' => 'No']); ?>

                        </div>
                        <div class="col-lg-3 col-md-3">
                            <?php echo Form::label('fileincapacidad1', 'Formato de incapacidad'); ?>

                            <?php echo Form::file('fileincapacidad', [
                                'class' => 'form-control-file',
                                'required' => 'required',
                                'accept' => 'application/pdf',
                            ]); ?>

                        </div>
                        <div class="col-md-3">
                            <?php echo BootForm::select('doccalificacion', 'Tipo de calificacion', [
                                'SELECCIONE',
                                'ST-9' => 'ST-9',
                                'ST-7' => 'ST-7',
                                'ST-3' => 'ST-3',
                            ]); ?>

                        </div>
                        <div class="col-lg-3 col-md-3">
                            <?php echo Form::label('filest1', 'Documento de calificacion ST'); ?>

                            <?php echo Form::file('filest', ['class' => 'form-control-file', 'accept' => 'application/pdf']); ?>

                        </div>
                        <div class="col-lg-6 col-md-6">
                            <?php echo BootForm::textarea('comentario', 'Comentarios', '', ['rows' => '2', 'style' => 'rezise:true']); ?>

                        </div>
                    </div>
                    <div class="row" style="display: none" id='id_enviar'>
                        <div class="col center">
                            <button type="submit" name="solicitar" id='solicitar' value="Solicitar permisos"
                                class="btn btn-primary">Enviar</button>
                            <a href="<?php echo route('home'); ?>" class="btn btn-light">Cancelar</a>
                        </div>
                    </div>
                    <?php echo Form::close(); ?>

                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <h3>No hay datos del empleado</h3>
                <?php endif; ?>
            <?php endif; ?>

        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scriptBFile'); ?>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.1.0/dist/sweetalert2.min.js"></script>
    <script>
        $(document).ready(function() {
            document.getElementById("no_empleado").focus();
            $('#folio, #tipo, #ramo, #riesgo, #inicio, #fin, #doccalificacion').change(function() {
                var inicioFecha = $('#inicio').val();
                var finFecha = $('#fin').val();
                var fecha1 = new Date($('#inicio').val());
                var diasIncapacidad = parseInt($('#dias').val());
                var fecha2 = new Date($('#fin').val());
                var tipo = $('#tipo').val();
                var ramo = $('#ramo').val();
                var riesgo = $('#riesgo').val();
                var folio = $('#folio').val();
                var doccal = $('#doccalificacion').val();
                if (doccal !== '0') {
                    $('#filest').prop('required', true);
                }
                if (inicioFecha !== '' && !isNaN(diasIncapacidad)) {
                    var fechaInicio = new Date(inicioFecha);
                    var fechaFin = new Date(fechaInicio);
                    fechaFin.setDate(fechaFin.getDate() + diasIncapacidad);
                    var dia = fechaFin.getDate();
                    var mes = fechaFin.getMonth() + 1;
                    var anio = fechaFin.getFullYear();
                    var fechaFinal = anio + '-' + (mes < 10 ? '0' : '') + mes + '-' + (dia < 10 ? '0' :
                        '') + dia;
                    $('#fin').val(fechaFinal);
                }
                if (folio !== '' && inicioFecha !== '' && finFecha !== '' &&
                    tipo !== '0' && ramo !== '0' && riesgo !== '0') {
                    $('#id_enviar').show();
                } else {
                    $('#id_enviar').hide();
                }
            });
            $('#enviar').on('click', function(event) {
                Swal.fire({
                    position: 'top',
                    icon: 'success',
                    title: 'Espere un momento...',
                    showConfirmButton: false
                });
            });
        });

        function showAlert() {
            $('#formbuscar').show();
            $('#icobuscar').hide();
        }
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\xampp1\htdocs\intimark_sgd\resources\views/incapacidades/index.blade.php ENDPATH**/ ?>