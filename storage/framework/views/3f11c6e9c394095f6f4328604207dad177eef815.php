<?php $__env->startSection('styleBFile'); ?>
    <!-- Color Box -->
    <link href="<?php echo e(asset('colorbox/colorbox.css')); ?>" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="card">
        <div class="card-header">
            <h3>Generacion de archivos para la interface a Asisweb</h3>
        </div>
        <div class="card-body">
            <?php echo Form::open(['route' => 'asisweb.create', 'method' => 'get', 'files' => true]); ?>

            <div class="row">
                <div class="col-lg-3 col-md-3">
                    <?php echo BootForm::select('tipo', 'Tipo', [
                        'tipo1' => 'SELECCIONE UN TIPO',
                        'JustiHoras' => 'Permisos por horas',
                        'JustiDia' => 'Permisos por día',
                        'JustiVac' => 'Vacaciones',
                        'JustiFalta' => 'Faltas Justificadas',
                        'JustiInca' => 'Incapacidades',
                    ]); ?>

                </div>
                <!--<div class="col-lg-3 col-md-3" style="display: none" id='divmodo'>
                    <?php echo BootForm::select('modohora', 'Modo Horario', [
                        'modo1' => 'SELECCIONE UN MODO',
                        'entrada_tarde' => 'Entrada tarde',
                        'tiempo_comida' => 'Tiempo ausente en jornada',
                        'salida_temprano' => 'Salida Anticipada',
                    ]); ?>

                </div>
                <div class="col-lg-3 col-md-3" style="display: none" id='divmodo2'>
                    <?php echo BootForm::select('modotipo', 'Modo Horario', [
                        'modo2' => 'SELECCIONE UN MODO',
                        'entrada_tarde' => 'Entrada tarde',
                        'tiempo_comida' => 'Tiempo ausente en jornada',
                        'salida_temprano' => 'Salida Anticipada',
                    ]); ?>

                </div>-->
            </div>
            <div class="row">
                <div class="col-lg-3 col-md-3" id='id_inicio'>
                    <?php echo BootForm::date('inicio_fecha', 'Fecha Inicio', '', ['width' => 'col-md-3']); ?>

                </div>
                <div class="col-lg-3 col-md-3" id='id_fin'>
                    <?php echo BootForm::date('fin_fecha', 'Fecha Fin', '', ['width' => 'col-md-3']); ?>

                </div>
            </div>
            <div class="row" style="display:none" id='id_buscar'>
                <div class="col center">
                    <button type="submit" name="solicitar" id='solicitar' value="Solicitar permisos"
                        class="btn btn-primary">Generar archivo</button>
                    <a href="<?php echo route('home'); ?>" class="btn btn-light">Cancelar</a>

                </div>
            </div>
            <?php echo form::close(); ?>

        </div>
    </div>
    <br>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scriptBFile'); ?>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="sweetalert2.all.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#tipo, #modohora, #id_inicio, #id_fin').change(function() {
                var inicioFecha = $('#id_inicio input').val();
                var finFecha = $('#id_fin input').val();
                var tipo = $('#tipo').val();
                /*var modo = $('#modohora').val();
                alert(modo);
                if (tipo === 'JustiHoras') {
                    $('#divmodo').show();
                    if(modo !== 'modo1'){
                        $('#divmodo2').show();
                    }else{
                        $('#divmodo2').hide();
                    }
                } else {
                    $('#divmodo').hide();
                }*/
                if (inicioFecha !== '' && finFecha !== '' && tipo !== 'tipo1') {
                    $('#id_buscar').show();
                } else {
                    $('#id_buscar').hide();
                }
            });
        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\xampp1\htdocs\intimark_sgd\resources\views/asisweb/index.blade.php ENDPATH**/ ?>