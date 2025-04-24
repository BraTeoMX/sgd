

<?php $__env->startSection('content'); ?>
    <div class="card">
        <div class="card-header">
            <h1>Eliminar registros</h1>
            <a href="<?php echo e(route('eventos.PreRegistro')); ?>" class="btn btn-primary deleteReg">Regresar</a>
        </div>
        <div class="card-body">
            <h2>Selecciona una opción</h2>
            <form action="<?php echo e(route('eventos.DeleteRegistros')); ?>" method="post">
                <input type="hidden" name="tipEvent" id="tipEvent" class="form-control" value="<?php echo e($TipEvent); ?>">
                <?php echo csrf_field(); ?>
                <div class="form-group d-flex justify-content-between align-items-start">
                    <div class="col-lg-6 col-md-6">
                        <select name="tipo_evento" id="tipo_evento" class="form-control">
                            <option value="default" selected>Selecciona una opción</option>
                            <?php $__currentLoopData = $eventos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $evento): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($evento->cve_evento); ?>" <?php echo e($evento->cve_evento == $optionsave ? 'selected' : ''); ?>><?php echo e($evento->tipo_evento); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>
                    <div class="col-lg-5 col-md-5">
                        <div class="input-group">
                            <input type="text" name="search" id="search" class="form-control" placeholder="Buscar registro">
                            <div class="input-group-append">
                                <button type="submit" class="btn btn-outline-secondary">
                                    <i class="tio-search"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="text-right">
                    <button type="submit" class="btn btn-danger">Generar Registros</button>
                </div>
            </form>
            <?php if(count($registros) > 0): ?>
                <h2>Registros Generados <?php echo e($TipEvent); ?> </h2>
                <table class="table">
                    <thead>
                        <tr>
                            <th>Número empleado</th>
                            <th>Número de tag</th>
                            <th>Tipo de evento</th>
                            <th>Nombre del empleado</th>
                            <th>Eliminar Registro</th>
                        </tr>
                    </thead>
                    <tfoot class="thead-light">
                        <tr>
                            <th>Total de Registros: <?php echo e($totalRegistros); ?></th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <?php $__currentLoopData = $registros; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $registro): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e($registro->no_empleados); ?></td>
                                <td><?php echo e($registro->No_Tag); ?></td>
                                <td><?php echo e($registro->tipo_evento); ?></td>
                                <td><?php echo e($registro->nombre_empleado); ?></td>
                                <td>
                                    <?php echo Form::model($registro, ['method' => 'delete', 'route' => ['eventos.BorrarRegistro', $registro->id], 'id' => 'eventoEliminarForm']); ?>

                                    <!-- Formulario para eliminar el evento -->

                                    <a class="text-danger delete" style="cursor: pointer" data-toggle="modal" data-target="#confirmarEliminar">
                                        <i class="tio-delete tio-lg text-danger"></i>
                                    </a>
                                    <?php echo Form::close(); ?>

                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
            <?php endif; ?>

        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('scriptBFile'); ?>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="sweetalert2.all.min.js"></script>
<script>
   $('.delete').on('click', function(event) {
    var deleteButton = $(this); // Almacenamos una referencia al enlace
    Swal.fire({
        title: 'Estimado colaborador<br>¿Está seguro de eliminar el registro ?',
        text: "",
        icon: 'warning',
        iconWidth: 400,
        iconHeight: 200,
        showCancelButton: true,
        confirmButtonColor: '#d33',
        cancelButtonColor: '#808080',
        confirmButtonText: 'Eliminar'
    }).then((result) => {
        if (result.isConfirmed) {
            Swal.fire({
                icon: 'success',
                title: 'Se ha eliminado correctamente el registro',
                showConfirmButton: false,
                timer: 2000
            });

            setTimeout(function () {
                deleteButton.closest('form').submit(); // Utilizamos la referencia almacenada
            }, 1000);
        }
    });
});
$('#search').on('input', function() {
    var searchTerm = $(this).val().toLowerCase();

    // Oculta/muestra las filas de la tabla según el término de búsqueda
    $('tbody tr').each(function() {
        var empleado = $(this).find('td:nth-child(1)').text().toLowerCase();

        if (empleado.includes(searchTerm)) {
            $(this).show();
        } else {
            $(this).hide();
        }
    });
});
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\sgd\resources\views\Eventos\DeleteRegistros.blade.php ENDPATH**/ ?>