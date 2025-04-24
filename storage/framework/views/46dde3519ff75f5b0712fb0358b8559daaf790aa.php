<?php $__env->startSection('styleBFile'); ?>
    <!-- Color Box -->
    <link href="<?php echo e(asset('materialfront/assets/vendor/select2/dist/css/select2.min.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('materialfront/assets/vendor/datatables.net.extensions/fixedColumns.dataTables.min.css')); ?>" rel="stylesheet">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="card" style="height: auto; width: auto;">
    <div class="card-header">
        <h1>Generar reporte <?php echo e($nombre); ?></h1>
    </div>
    <div class="container">
        <?php if(auth()->user()->hasRole('Personal Administrativo')): ?>
        <form method="POST" action="<?php echo e(route('eventos.GenerarReporte')); ?>">
            <?php echo csrf_field(); ?>
            <div class="form-group">
                <input type="hidden" name="mesSeleccionado" id="mesSeleccionado">
                <label for="tipo_evento">Elige el evento al que desees generar tu reporte</label>
                <div class="d-flex align-items-start">
                    <div class="col-lg-6 col-md-6">
                        <select name="tipo_evento" id="tipo_evento" class="form-control select-custom">
                            <option value="" disabled selected>Selecciona una opción</option>
                            <?php $__currentLoopData = $eventos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $evento): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($evento->id_evento); ?>" data-nombre="<?php echo e($evento->tipo_evento); ?>"><?php echo e($evento->tipo_evento); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <select name="created_at" id="created_at" class="form-control">
                            <option value="">Selecciona un mes</option>
                            <?php $__currentLoopData = $mesesSeleccion; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $mes): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($mes->fecha); ?>"><?php echo e($mes->fecha); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-primary" id="registrarBtn">
                Generar reporte PDF
                <img class="avatar avatar-xss avatar-4by3 mr-2" src="<?php echo asset('materialfront/assets/svg/brands/pdf.svg'); ?>" alt="PDF">
            </button>
            <button type="submit" name = "excel" class="btn btn-primary" id="registrarBtnExcel">
                Generar reporte Excel
                <img class="avatar avatar-xss avatar-4by3 mr-2" src="<?php echo e(asset('materialfront/assets/svg/brands/excel.svg')); ?>" alt="Excel">
            </button>
        </form>

        <br>
        <?php endif; ?>
        <?php if(auth()->user()->hasRole('Seguridad e Higiene')|| auth()->user()->email=='adejesus@intimark.com.mx'|| auth()->user()->email=='gvm7506@gmail.com'): ?>
                <br>
                <div class="container">
                    <div class="row">
                        <div class="col-md-6 card">
                            <br>
                            <h1 class="text-center">Entrega de Papel</h1>
                            <form method="POST" action="<?php echo e(route('eventos.GenerarReportePapel')); ?>">
                                <?php echo csrf_field(); ?>
                                <div class="form-row">
                                    <div class="col">
                                        <select name="created_at" id="created_at" class="form-control" required>
                                            <option value="">Selecciona un mes</option>
                                            <?php $__currentLoopData = $mesesSeleccionPapel; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $mes): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($mes->fecha); ?>">
                                                    <?php echo e(\Carbon\Carbon::parse($mes->fecha)->translatedFormat('F - Y')); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                    </div>
                                    <div class="col">
                                        <select name="planta" id="planta" class="form-control">
                                            <option value="Intimark1">Planta 1 - Ixtlahuaca</option>
                                            <option value="Intimark2">Planta 2 - San Bartolo</option>
                                            <option value="ambos">Ambos</option>
                                        </select>
                                    </div>
                                </div>
                                <br>
                                <button type="submit" class="btn btn-primary" id="registrarBtnPapel">
                                    Generar reporte PDF
                                    <img class="avatar avatar-xss avatar-4by3 mr-2" src="<?php echo asset('materialfront/assets/svg/brands/pdf.svg'); ?>" alt="PDF">
                                </button>
                                <button type="submit" name="excel" class="btn btn-primary" id="registrarBtnExcelPapel">
                                    Generar reporte Excel
                                    <img class="avatar avatar-xss avatar-4by3 mr-2" src="<?php echo e(asset('materialfront/assets/svg/brands/excel.svg')); ?>" alt="Excel">
                                </button>
                            </form>
                            <br>
                        </div>
                        <div class="col-md-6 card">
                            <br>
                            <h1 class="text-center">Simulacro Sismo</h1>
                            <form method="POST" action="<?php echo e(route('eventos.GenerarReporteSimulacro')); ?>">
                                <?php echo csrf_field(); ?>
                                <div class="form-row">
                                    <div class="col">
                                        <select name="created_at" id="created_at" class="form-control" required>
                                            <option value="">Selecciona un mes</option>
                                            <?php $__currentLoopData = $mesesSeleccionSimulacro; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $mes): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($mes->fecha); ?>">
                                                    <?php echo e(\Carbon\Carbon::parse($mes->fecha)->translatedFormat('F - Y')); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                    </div>
                                    <div class="col">
                                        <select name="planta" id="planta" class="form-control">
                                            <option value="Intimark1">Planta 1 - Ixtlahuaca</option>
                                            <option value="Intimark2">Planta 2 - San Bartolo</option>
                                            <option value="ambos">Ambos</option>
                                        </select>
                                    </div>
                                </div>
                                <br>
                                <button type="submit" class="btn btn-primary" id="registrarBtnPapel">
                                    Generar reporte PDF
                                    <img class="avatar avatar-xss avatar-4by3 mr-2" src="<?php echo asset('materialfront/assets/svg/brands/pdf.svg'); ?>" alt="PDF">
                                </button>
                                <button type="submit" name="excel" class="btn btn-primary" id="registrarBtnExcelPapel">
                                    Generar reporte Excel
                                    <img class="avatar avatar-xss avatar-4by3 mr-2" src="<?php echo e(asset('materialfront/assets/svg/brands/excel.svg')); ?>" alt="Excel">
                                </button>
                            </form>
                            <br>
                        </div>
                    </div>
                    <br>
                </div>
            <?php endif; ?>

    </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scriptBFile'); ?>
    <!-- Tus scripts existentes aquí -->
    <script src="<?php echo asset('materialfront/assets/vendor/datatables/media/js/jquery.dataTables.min.js'); ?>"></script>
    <script src="<?php echo asset('materialfront/assets/vendor/datatables.net-buttons/js/dataTables.buttons.min.js'); ?>"></script>
    <script src="<?php echo asset('materialfront/assets/vendor/datatables.net-buttons/js/buttons.flash.min.js'); ?>"></script>
    <script src="<?php echo asset('materialfront/assets/vendor/jszip/dist/jszip.min.js'); ?>"></script>
    <script src="<?php echo asset('materialfront/assets/vendor/pdfmake/build/pdfmake.min.js'); ?>"></script>
    <script src="<?php echo asset('materialfront/assets/vendor/pdfmake/build/vfs_fonts.js'); ?>"></script>
    <script src="<?php echo asset('materialfront/assets/vendor/datatables.net-buttons/js/buttons.html5.min.js'); ?>"></script>
    <script src="<?php echo asset('materialfront/assets/vendor/datatables.net-buttons/js/buttons.print.min.js'); ?>"></script>
    <script src="<?php echo asset('materialfront/assets/vendor/datatables.net-buttons/js/buttons.colVis.min.js'); ?>"></script>
    <script src="<?php echo asset('materialfront/assets/vendor/datatables.net.extensions/dataTables.fixedColumns.min.js'); ?>"></script>
    <script>
        $(document).ready(function () {
            var tipoEventoSelect = $('#tipo_evento');
            var fechaSelect = $('#created_at');

            tipoEventoSelect.on('change', function () {
                var selectedEvento = tipoEventoSelect.val();

                if (selectedEvento) {
                    $.ajax({
                        url: '/obtener-meses/' + selectedEvento,
                        type: 'GET',
                        success: function (data) {
                            fechaSelect.empty().append($('<option>', { value: '', text: 'Selecciona un mes' }));
                            $.each(data, function (index, value) {
                                var date = new Date(value);
                                var monthName = date.toLocaleString('default', { month: 'long' });
                                var year = date.getFullYear();
                                fechaSelect.append($('<option>', { value: value, text: `${monthName} ${year}` }));
                            });
                        },
                        error: function (xhr) {
                            console.log(xhr.responseText);
                        }
                    });
                } else {
                    fechaSelect.empty().append($('<option>', { value: '', text: 'Selecciona un mes' }));
                }
            });
        });
    </script>
    <script>
        var nombre = <?php echo json_encode($nombre, 15, 512) ?>;
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\xampp1\htdocs\intimark_sgd\resources\views/eventos/ReportesEventos.blade.php ENDPATH**/ ?>