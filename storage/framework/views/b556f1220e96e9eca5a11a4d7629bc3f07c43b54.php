

<?php $__env->startSection('content'); ?>
    <div class="card">
        <div class="card-header">
            <h1>Actualizar Puestos</h1>
            <a href="<?php echo e(route('eventos.create')); ?>" class="btn btn-primary deleteReg">Regresar</a>
        </div>
        <div class="card-body">
            <div class="col-lg-3 col-md-3">
                <div class="input-group">
                    <input type="text" name="search" id="search" class="form-control" placeholder="Buscar Puesto">
                    <div class="input-group-append">
                        <button type="submit" class="btn btn-outline-secondary">
                            <i class="tio-search"></i>
                        </button>
                    </div>
                </div>
            </div>
            <div class="col-lg-15 col-md-15 text-right">
                <a class="btn btn-primary save">Guardar puestos</a>
            </div>
        </div>
        <div class="card-body">
            <table class="table  table-light table-striped">
                <thead>
                    <tr>
                        <th>Id Puesto </th>
                        <th>Tipo de Puesto</th>
                        <th>Nivel</th>
                        <th>Entrega Papel</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $puestos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $puesto): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e($puesto->id_puesto); ?></td>
                            <td><?php echo e($puesto->Puesto); ?></td>
                            <td><?php echo e($puesto->Nivel); ?></td>
                            <td>
                                <input  class="flexCheckChecked" id="flexCheckChecked-item-<?php echo e($puesto->id); ?>" type="checkbox" value="<?php echo e($puesto->id); ?>"
                                  <?php echo e(Str::contains($puesto->Papel, 'EntPH') ? 'checked' : ''); ?>>
                                <label for="flexCheckChecked-item-<?php echo e($puesto->id); ?>"></label>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scriptBFile'); ?>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="sweetalert2.all.min.js"></script>
    <script>
        $(document).ready(function () {
            $('.save').click(function () {
                var selectedIds = [];
                $('.flexCheckChecked:checked').each(function () {
                    selectedIds.push($(this).val());
                });

                // Realiza la petición AJAX para actualizar la base de datos
                $.ajax({
                    type: 'POST',
                    url: '<?php echo e(route('eventos.actualizarPapel')); ?>', // Reemplaza con la ruta correcta en tu aplicación
                    data: {
                        selectedIds: selectedIds,
                        _token: '<?php echo e(csrf_token()); ?>'
                    },
                    success: function (data) {
                        // Manejar la respuesta del servidor
                        Swal.fire('Actualización de puestos exitosa', '', 'success');
                    },
                    error: function (data) {
                        // Manejar errores
                        Swal.fire('Error al actualizar', '', 'error');
                    }
                });
            });
        });

        $('#search').on('input', function() {
            var searchTerm = $(this).val().toLowerCase();

            // Oculta/muestra las filas de la tabla según el término de búsqueda
            $('tbody tr').each(function() {
                var empleado = $(this).find('td:nth-child(2)').text().toLowerCase();

                if (empleado.includes(searchTerm)) {
                    $(this).show();
                } else {
                    $(this).hide();
                }
            });
        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\sgd\resources\views\Eventos\UpdatePuestos.blade.php ENDPATH**/ ?>