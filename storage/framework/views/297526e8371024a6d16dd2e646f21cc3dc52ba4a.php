<?php $__env->startSection('styleBFile'); ?>
<!-- Color Box -->
<link href="<?php echo e(asset('materialfront/assets/vendor/select2/dist/css/select2.min.css')); ?>" rel="stylesheet">
<link href="<?php echo e(asset('materialfront/assets/vendor/datatables.net.extensions/fixedColumns.dataTables.min.css')); ?>" rel="stylesheet">
<!-- ../assets/vendor/datatables.net.extensions/fixedColumns.dataTables.min.css -->
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
            <!-- 5 -->
            <!-- Card -->
            <div class="card">
                <!-- Header -->
                <div class="card-header">
                    <div class="col-md-10 col-lg-7 text-rigth">
                    <h3 class="card-header-title">Rol Logistica</h3>
                    <a href="<?php echo e(route('steprol.create')); ?> " class="btn btn-primary float-right">
                        Agregar
                    </a>
                    </div>
                    <div class="col-md-2 col-lg-2 text-rigth">
                      <a href="<?php echo e(route('rollogistica.imprime')); ?> " >
                      <i class="tio-print"></i> Imprimir Rol
                      </a>
                    </div>
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
                            <input id="datatableWithSearchInput" type="search" class="form-control" placeholder="Buscar" aria-label="Buscar">
                        </div>
                        <!-- End Search -->
                        </form>
                        <!-- End Filter -->
                    </div>
                </div>

                <div class="card " >
                    <div class="card-header">
                        <h4 class="card-header-title">Parametros de busqueda</h4>
                        <h5><?php echo e($titulo); ?></h5>
                    </div>
                    <div class="card-body">                      
                        <?php echo BootForm::open(['id'=>'form', 'method' => 'GET']);; ?> 
                            <div class="row mb-3">
                              <div class="col-lg-5 col-md-6">
                              <?php echo BootForm::text('folio_busqueda', 'folio Intimark: ', old('folio_busqueda'));; ?>                                  
                              </div> 
                              <div class="col-lg-5 col-md-6">
                              </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-lg-5 col-md-5">
                                  <?php echo BootForm::select("sucursal_cliente_id", "Sucursal: *", $sucursales, old('sucursal_cliente_id'));; ?>

                                </div> 
                                <div class="col-lg-5 col-md-5">
                                  <?php echo BootForm::select("convenio_id", "Cliente: *", [], old('convenio_id'));; ?>

                                </div>                            
                            </div>
                            <div class="row mb-3">
                              <div class="col-lg-5 col-md-6">
                                  <?php echo BootForm::date("inicio_fecha", "Fecha inical rol: ", old("inicio_fecha") );; ?>

                              </div> 
                              <div class="col-lg-5 col-md-6">
                                <?php echo BootForm::date("fin_fecha", "Fecha fin rol: ", old("fin_fecha"));; ?>

                              </div>
                            </div>
                            <div class="row mb-3">
                              <div class="col-md-2">
                                <?php echo Form::submit('Buscar', ['class' => 'btn btn-primary']);; ?>

                              </div>
                            </div>
                        <?php echo BootForm::close(); ?>

                    </div>
                </div>
                <!-- End Header -->

                <!-- Table -->
                <div id="datatableWithSearchInput" class="table-responsive datatable-custom">
                    <table id="exportOptionsDatatables" class="table table-borderless table-thead-bordered table-nowrap table-align-middle card-table"
                    data-hs-datatables-options='{
                        "order": [],
                        "search": "#datatableWithSearchInput",
                    "isResponsive": false,
                    "isShowPaging": false,
                        "paging": false
                    }'>
                        <thead class="thead-light">
                            <tr>
                            <th>Folio Intimark</th>
                            <th>Fecha</th>
                            <th>Sucursal</th>
                            <th>Cliente</th>
                            <?php if(auth()->user()->roles()->first()->name == 'Administrador' || auth()->user()->roles()->first()->name == 'Logistica de Planta'): ?>
                            <th>Eliminado</th>
                            <?php endif; ?>
                            </tr>  
                        </thead>
                        <tbody>
                            <?php $__empty_1 = true; $__currentLoopData = $roleslogisticas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $rollogistica): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                            <tr>
                                <td>
                                    <a href="<?php echo e(route('steprol.edit', $rollogistica)); ?>">
                                    <?php echo e($rollogistica->id); ?>

                                    </a>
                                </td>
                                <td>
                                    <?php echo e($rollogistica->fecha->format('d/m/Y')); ?>

                                </td>
                                <td>
                                    <?php echo e(optional($rollogistica->sucursalCliente)->sucursal); ?>

                                </td>
                                <td>
                                    <?php echo e(optional(optional($rollogistica->convenio)->catCliente)->nombre_comercial); ?>

                                </td>
                                <?php if(auth()->user()->roles()->first()->name == 'Administrador' || auth()->user()->roles()->first()->name == 'Logistica de Planta'): ?>
                                <td><?php
         if(auth()->user()->can('rollogistica.destroy') || auth()->user()->can('rollogistica.*') || auth()->user()->can('Universal.*')){
             echo e(BootForm::open(['class'=>'eliminar','method'=>'delete','url'=>route('rollogistica.destroy', $rollogistica),'onSubmit'=>'return confirm("¿Desea eliminar el registro?")']) );
             echo e(BootForm::button('<i class="tio-delete tio-lg text-danger"></i>',['type'=>'submit','class'=>'btn btn-link']));
             echo e(BootForm::close());
         }
         ?></td>
                                <?php endif; ?>
                            </tr> 
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                            <tr>
                                <td colspan="5">No se ha registrado información en este apartado</td>
                            </tr>
                            <?php endif; ?>

                            
                        </tbody>
                    </table>
                </div>
                <!-- End Table -->
                
            </div>
            <!-- End Card -->
            <div>
                <br><br>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('scriptBFile'); ?>
<script src="<?php echo asset('materialfront/assets/vendor/select2/dist/js/select2.full.min.js'); ?>"></script>
<script src="<?php echo asset('materialfront/assets/vendor/datatables/media/js/jquery.dataTables.min.js'); ?>"></script>
<script src="<?php echo asset('materialfront/assets/vendor/datatables/media/js/jquery.dataTables.min.js'); ?>"></script>
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
        $('.js-sortable').each(function () {
        var sortable = $.HSCore.components.HSSortable.init($(this));
        });
        // initialization of datatables
        var datatable = $.HSCore.components.HSDatatables.init($('#exportOptionsDatatables'), {
        dom: 'Bfrtip',
        buttons: [
            {
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

        $('#sucursal_cliente_id').on('change', function(e){
            //console.log(e.target.value);
            var sucursal = e.target.value;

            $.get('<?php echo e(url("/")); ?>/consultasajax/getclientesbysucursales/' + sucursal,function(data) {
                $('#convenio_id').empty();
                // console.log(data);
                $('#convenio_id').append('<option value="">'+'Selecciona el cliente del convenio'+'</option>');
                $.each(data, function(fetch, regenciesObj){
                    $('#convenio_id').append('<option value="'+ regenciesObj.id +'">'+ regenciesObj.nombre_comercial +'</option>');
                })
            });
        });
</script>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\intimark\resources\views/roleslogisticas/index.blade.php ENDPATH**/ ?>