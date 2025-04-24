<?php $__env->startSection('content'); ?>
<div class="row">
    <div class="col-md-6">
        <div class="card">
            <div class="card-header" id="asistencia-header">
                <h1>Asistencia: <span id="evento-seleccionado"></span></h1>
            </div>
            <div class="card-body">
                <?php if(session('error')): ?>
                    <div class="alert alert-danger">
                        <?php echo e(session('error')); ?>

                    </div>
                <?php endif; ?>
                <div class="container">
                    <form id="asistenciaForm">
                        <?php echo csrf_field(); ?>
                        <div class="form-group">
                            <p>Selecciona una opción</p>
                            <select name="nombre_evento" id="nombre_evento" class="form-control" required>
                                <option value="">Selecciona una opción</option>
                                <?php $__currentLoopData = $eventos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $evento): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($evento->id); ?>"><?php echo e($evento->nombre); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                        <div class="form-group" id="textboxDiv">
                            <label for="empleado_tag">Registra tu tag o número de empleado:</label>
                            <input type="text" name="empleado_tag" id="empleado_tag" class="form-control">
                        </div>
                        <div class="d-flex justify-content-between">
                            <div>
                                <button type="submit" class="btn btn-primary" id="registrarBtn">Registrar asistencia del evento</button>
                            </div>
                            <div>
                                <button type="button" class="btn btn-secondary registrarbecarioBtn" id="registrarbecarioBtn">Registrar asistencia del becario al evento</button>
                            </div>
                        </div>
                    </form>
                    <!-- Agrega este código justo antes del cierre de la etiqueta </body> en tu Blade -->
                    <div class="modal fade" id="becarioModal" tabindex="-1" role="dialog" aria-labelledby="becarioModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="becarioModalLabel">Registrar asistencia del becario</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form id="becarioForm">
                                        <?php echo csrf_field(); ?>
                                        <div class="form-group">
                                            <label for="nombre_becario">Nombre del Becario</label>
                                            <input type="text" name="nombre_becario" id="nombre_becario" class="form-control" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="planta_becario">Planta</label>
                                            <select name="planta_becario" id="planta_becario" class="form-control" required>
                                                <option value="">Selecciona una planta</option>
                                                <option value="Intimark1">Ixtlahuaca</option>
                                                <option value="Intimark2">San Bartolo</option>
                                            </select>
                                        </div>
                                        <button type="submit" class="btn btn-primary">Registrar</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="card">
            <div class="card-body">
                <div class="card-header" id="asistencia-header">
                    <h1></h1>
                </div>
                <table class="table table-hover table-bordered custom-shadow-table custom-rounded-table">
                    <thead class="table-primary">
                        <tr>
                            <th scope="col"><strong>UBICACIÓN</strong></th>
                            <th scope="col"><strong>CONTEO INICIAL</strong></th>
                        </tr>
                    </thead>
                    <tbody id="registroTabla">
                        <tr>
                            <td>Ixtlahuaca</td>
                            <td id="conteoIxtlahuaca">0</td>
                        </tr>
                        <tr>
                            <td>San Bartolo</td>
                            <td id="conteoSanBartolo">0</td>
                        </tr>
                        <tr>
                            <td>Total General</td>
                            <td id="totalGeneral">0</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<style>
    .custom-shadow-table {
        box-shadow: 25px 25px 25px 15px rgba(205, 221, 236, 0.767);
    }
    .custom-header {
        background-color: #7fa1cc;
        color: rgb(0, 0, 0);
    }
    .custom-rounded-table {
        border-top-left-radius: 10px;
        border-top-right-radius: 10px;
        border-radius: 15px;
    }
    #asistencia-header {
        transition: background-color 0.3s ease;
    }
    #asistencia-header h1 {
        color: #4A4A4A;
    }
</style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scriptBFile'); ?>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="sweetalert2.all.min.js"></script>

<script>
    const coloresPastel = [
        '#E0FFFF', '#FFE4E1', '#FFF5EE', '#F0F8FF', '#F8F8FF',
        '#FFFACD', '#FFEFD5', '#FFE4B5', '#FAEBD7', '#E6E6FA',    
        '#FFD1DC', '#FFEBCD', '#E6E6FA', '#FFDAB9', '#98FB98',
        '#F0FFF0', '#FFF0F5', '#F0FFFF', '#F5F5DC', '#FAFAD2',    
    ];

    $(document).ready(function() {
        // Función para actualizar los conteos en la tabla
        function actualizarConteoTabla(evento_id) {
            if(evento_id) {
                $.ajax({
                    url: '<?php echo e(route("eventosActualizacion.obtenerRegistrosPorEvento")); ?>',
                    type: 'GET',
                    data: { evento_id: evento_id },
                    success: function(data) {
                        $('#conteoIxtlahuaca').text(data.conteoIxtlahuaca);
                        $('#conteoSanBartolo').text(data.conteoSanBartolo);
                        $('#totalGeneral').text(data.totalGeneral);
                    }
                });
            } else {
                $('#conteoIxtlahuaca').text('0');
                $('#conteoSanBartolo').text('0');
                $('#totalGeneral').text('0');
            }
        }

        // Cambiar de evento y actualizar la tabla
        $('#nombre_evento').change(function() {
            var evento_id = $(this).val();
            var evento_nombre = $(this).find('option:selected').text();
            var colorIndex = evento_id % coloresPastel.length;
            
            // Actualizar el título y color de fondo del encabezado
            $('#evento-seleccionado').text(evento_nombre);
            $('#asistencia-header').css('background-color', coloresPastel[colorIndex]);

            // Llamar a la función de actualización de la tabla
            actualizarConteoTabla(evento_id);
        });

        // Enviar datos del formulario de asistencia y actualizar tabla
        $('#asistenciaForm').on('submit', function(event) {
            event.preventDefault();

            var formData = $(this).serialize();

            $.ajax({
                url: '<?php echo e(route("eventosActualizacion.formRegistroEvento")); ?>',
                type: 'POST',
                data: formData,
                success: function(response) {
                    // Mostrar el mensaje de SweetAlert con cierre automático
                    if(response.status === 'success') {
                        Swal.fire({
                            icon: 'success',
                            title: 'Éxito',
                            text: response.message,
                            timer: 2000, 
                            showConfirmButton: false
                        });
                    } else if(response.status === 'error') {
                        Swal.fire({
                            icon: 'error',
                            title: 'Error',
                            text: response.message,
                            timer: 2000,
                            showConfirmButton: false
                        });
                    } else if(response.status === 'info') {
                        Swal.fire({
                            icon: 'info',
                            title: 'Información',
                            text: response.message,
                            timer: 2000,
                            showConfirmButton: false
                        });
                    } else if(response.status === 'warning') {
                        Swal.fire({
                            icon: 'warning',
                            title: 'Advertencia',
                            text: response.message,
                            timer: 2000,
                            showConfirmButton: false
                        });
                    }

                    // Limpiar el input del empleado_tag
                    $('#empleado_tag').val('');

                    // Actualizar la tabla después del envío exitoso
                    var evento_id = $('#nombre_evento').val();
                    actualizarConteoTabla(evento_id);
                },
                error: function(xhr) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: 'Ocurrió un error al enviar los datos.',
                        timer: 2000,
                        showConfirmButton: false
                    });
                }
            });
        });

        // Abrir modal al hacer clic en el botón "Registrar asistencia del becario al evento"
        $('#registrarbecarioBtn').on('click', function() {
            $('#becarioModal').modal('show');
        });

        // Manejar el envío del formulario del modal de becario y actualizar tabla
        $('#becarioForm').on('submit', function(event) {
            event.preventDefault();

            var formData = $(this).serialize();
            formData += '&nombre_evento=' + $('#nombre_evento').val();

            $.ajax({
                url: '<?php echo e(route("eventosActualizacion.formRegistroBecario")); ?>',
                type: 'POST',
                data: formData,
                success: function(response) {
                    // Mostrar el mensaje de SweetAlert con cierre automático
                    if(response.status === 'success') {
                        Swal.fire({
                            icon: 'success',
                            title: 'Éxito',
                            text: response.message,
                            timer: 2000,
                            showConfirmButton: false
                        });
                        $('#becarioModal').modal('hide');
                        $('#nombre_becario').val('');
                        $('#planta_becario').val('');

                        // Actualizar la tabla después de registrar al becario
                        var evento_id = $('#nombre_evento').val();
                        actualizarConteoTabla(evento_id);
                    } else if(response.status === 'error') {
                        Swal.fire({
                            icon: 'error',
                            title: 'Error',
                            text: response.message,
                            timer: 2000,
                            showConfirmButton: false
                        });
                    } else if(response.status === 'info') {
                        Swal.fire({
                            icon: 'info',
                            title: 'Información',
                            text: response.message,
                            timer: 2000,
                            showConfirmButton: false
                        });
                    } else if(response.status === 'warning') {
                        Swal.fire({
                            icon: 'warning',
                            title: 'Advertencia',
                            text: response.message,
                            timer: 2000,
                            showConfirmButton: false
                        });
                    }
                },
                error: function(xhr) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: 'Ocurrió un error al enviar los datos.',
                        timer: 2000,
                        showConfirmButton: false
                    });
                }
            });
        });
    });
</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\xampp1\htdocs\intimark_sgd\resources\views/eventosActualizacion/registroAsistencia.blade.php ENDPATH**/ ?>