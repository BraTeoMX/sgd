
<?php $__env->startSection('styleBFile'); ?>
    <!-- Color Box -->
    <link href="<?php echo e(asset('materialfront/assets/vendor/select2/dist/css/select2.min.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('materialfront/assets/vendor/datatables.net.extensions/fixedColumns.dataTables.min.css')); ?>"
        rel="stylesheet">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <div class="col-md-8 col-lg-8 text-rigth">
                        <h3>Consulta Faltas Justificadas</h3>
                        <?php echo BootForm::open(['id' => 'form', 'method' => 'GET', 'route' => 'busquedareporte']); ?>

                        <div class="row">
                            <div class="col-lg-3 col-md-3">
                                <?php echo BootForm::number('no_empleado', 'No Empleado : ', null, ['width' => 'col-lg-3 col-md-3']); ?>

                            </div>
                            <div class="col-lg-4 col-md-4">
                                <?php echo BootForm::date('inicio_fecha', 'Fecha inicial : ', old('inicio_fecha'), ['width' => 'col-lg-3 col-md-3']); ?>

                            </div>
                            <div class="col-lg-4 col-md-4">
                                <?php echo BootForm::date('fin_fecha', 'Fecha final : ', old('fin_fecha'), ['width' => 'col-lg-3 col-md-3']); ?>

                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-2">
                                <?php echo Form::submit('Buscar', ['class' => 'btn btn-primary']); ?>

                            </div>
                        </div>
                        <?php echo BootForm::close(); ?>

                    </div>
                    <!-- Unfold -->
                    <div class="hs-unfold">
                        <a class="js-hs-unfold-invoker btn btn-white dropdown-toggle" href="javascript:;"
                            data-hs-unfold-options='{
                                        "target": "#dropdownHover",
                                        "type": "css-animation",
                                        "event": "hover" }'>
                            <i class="tio-download-to mr-1"></i>Exportar
                        </a>
                        <div id="dropdownHover" class="hs-unfold-content dropdown-unfold dropdown-menu">
                            <a id="export-print" class="dropdown-item" href="javascript:;">
                                <img class="avatar avatar-xss avatar-4by3 mr-2" src="<?php echo asset('materialfront/assets/svg/illustrations/print.svg'); ?>"
                                    alt="Imprimir">
                                Imprimir
                            </a>
                            <a id="export-copy" class="dropdown-item" href="javascript:;">
                                <img class="avatar avatar-xss avatar-4by3 mr-2" src="<?php echo asset('materialfront/assets/svg/illustrations/copy.svg'); ?>"
                                    alt="Image Description">
                                Copiar
                            </a>
                            <a id="export-excel" class="dropdown-item" href="javascript:;">
                                <img class="avatar avatar-xss avatar-4by3 mr-2" src="<?php echo asset('materialfront/assets/svg/brands/excel.svg'); ?>"
                                    alt="Excel">
                                Excel
                            </a>
                            <a id="export-csv" class="dropdown-item" href="javascript:;">
                                <img class="avatar avatar-xss avatar-4by3 mr-2" src="<?php echo asset('materialfront/assets/svg/components/placeholder-csv-format.svg'); ?>"
                                    alt="CSV">
                                .CSV
                            </a>
                            <a id="export-pdf" class="dropdown-item" href="javascript:;">
                                <img class="avatar avatar-xss avatar-4by3 mr-2" src="<?php echo asset('materialfront/assets/svg/brands/pdf.svg'); ?>"
                                    alt="PDF">
                                PDF
                            </a>
                        </div>
                    </div>
                    <!-- End Unfold -->
                    <div class="col-auto">
                        <!-- Filter -->
                        <form>
                            <!-- Search -->
                            <div class="input-group input-group-merge input-group-flush">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <i class="tio-search"></i>
                                    </div>
                                </div>
                                <input id="datatableWithSearchInput" type="search" class="form-control"
                                    placeholder="Buscar" aria-label="Buscar">
                            </div>
                            <!-- End Search -->
                        </form>
                        <!-- End Filter -->
                    </div>
                </div>
                <div class="card-body">
                    <!-- Table -->
                    <div id="datatableWithSearchInput" class="table-responsive datatable-custom">
                        <table id="exportOptionsDatatables"
                            class="table table-borderless table-thead-bordered table-nowrap table-align-middle card-table"
                            data-hs-datatables-options='{"order": [],
                                    "search": "#datatableWithSearchInput",
                                    "isResponsive": false,
                                    "isShowPaging": false,
                                    "paging": false}'>
                            <thead class="thead-light">
                                <tr>
                                    <th>Folio</th>
                                    <th>Fecha Solicitud</th>
                                    <th>No. de empleado</th>
                                    <th>Nombre</th>
                                    <th>Departamento</th>
                                    <th>Fecha Falta</th>
                                    <th>Motivo</th>
                                    <th>Comentario</th>
                                    <th>Estatus</th>
                                    <th>Archivo</th>
                                    <th></th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if(isset($reportes)): ?>
                                    <?php $__currentLoopData = $reportes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $reporte): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td>
                                                <?php echo e($reporte->folio_falta); ?>

                                            </td>
                                            <td>
                                                <?php echo e($reporte->fecha_reg); ?>

                                            </td>
                                            <td>
                                                <?php echo e($reporte->fk_no_empleado); ?>

                                            </td>
                                            <td>
                                                <?php echo e($reporte->Nom_Emp . ' ' . $reporte->Ap_Pat . ' ' . $reporte->Ap_Mat); ?>

                                            </td>
                                            <td>
                                                <?php echo e($reporte->Departamento); ?>

                                            </td>
                                            <td>
                                                <?php echo e($reporte->fecha_inicio_justificar); ?>

                                            </td>
                                            <td>
                                                <?php echo e($reporte->motivo); ?>

                                            </td>
                                            <td>
                                                <?php echo e($reporte->comentario); ?>

                                            </td>
                                            <td>
                                                <?php echo e($reporte->estatus_falta); ?>

                                            </td>
                                            <td>
                                                <?php echo e($reporte->nombre_archivo); ?>

                                                <br>
                                                <!--<a href="Documentos/Sem 08_Victor Manuel Cruz Mendoza.pdf" target="_blank">Ver archivo</a>-->
                                                <a href="<?php echo e(str_replace('E:\xampp1\htdocs\intimark_sgd\public\Documentos', 'Documentos', $reporte->ruta_archivo)); ?>"
                                                    target="_blank">Ver documento</a>
                                            </td>

                                            <td class="float-center">
                                                <a class="btn btn-info float-right"
                                                    href="<?php echo e(route('updatearchivo', $reporte->folio_falta)); ?>">Actualizar
                                                    archivo</a>
                                            </td>
                                            <td class="float-center">
                                                <a class="btn btn-danger float-right"
                                                    href="<?php echo e(route('cancelarfaltaj', $reporte->folio_falta)); ?>">Cancelar
                                                    Justificante</a>
                                            </td>

                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('scriptBFile'); ?>
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
        $(document).ready(function() {
            var datatable = $.HSCore.components.HSDatatables.init($('#datatableWithSearch'));
            // initialization of sortable
            $('.js-sortable').each(function() {
                var sortable = $.HSCore.components.HSSortable.init($(this));
            });
            // initialization of datatables
            var datatable = $.HSCore.components.HSDatatables.init($('#exportOptionsDatatables'), {
                dom: 'Bfrtip',
                buttons: [{
                        extend: 'copy',
                        className: 'd-none'
                    },
                    {
                        extend: 'excel',
                        className: 'd-none'
                    },
                    {
                        extend: 'csv',
                        className: 'd-none'
                    },
                    {
                        extend: 'pdf',
                        className: 'd-none'
                    },
                    {
                        extend: 'print',
                        className: 'd-none'
                    },
                ]
            });

            $('#export-copy').click(() => {
                datatable.button('.buttons-copy').trigger()
            });

            $('#export-excel').click(() => {
                datatable.button('.buttons-excel').trigger()
            });

            $('#export-csv').click(() => {
                datatable.button('.buttons-csv').trigger()
            });

            $('#export-pdf').click(() => {
                datatable.button('.buttons-pdf').trigger()
            });

            $('#export-print').click(() => {
                datatable.button('.buttons-print').trigger()
            });
        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\sgd\resources\views\faltasjustificadas\reporte.blade.php ENDPATH**/ ?>