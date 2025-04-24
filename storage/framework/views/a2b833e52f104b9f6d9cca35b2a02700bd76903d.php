

<?php $__env->startSection('content'); ?>
    <?php if(session('error')): ?>
        <div class="alert alert-danger custom-alert">
            <?php echo e(session('error')); ?>

        </div>
    <?php endif; ?>
    <?php if(session('success')): ?>
        <div class="alert alert-success custom-alert">
            <?php echo e(session('success')); ?>

            <?php if(session('nombre')): ?>
                <br><?php echo e(session('nombre')); ?>

            <?php endif; ?>
        </div>
    <?php endif; ?>
    <?php if(session('duplicado')): ?>
        <div class="alert alert-warning custom-alert">
            <?php echo e(session('duplicado')); ?>

            <?php if(session('nombre')): ?>
                <br><?php echo e(session('nombre')); ?>

            <?php endif; ?>
        </div>
    <?php endif; ?>
    <?php if(session('no_puesto')): ?>
        <div class="alert alert-info custom-alert">
            <?php echo e(session('no_puesto')); ?>

            <?php if(session('nombre')): ?>
                <br><?php echo e(session('nombre')); ?>

            <?php endif; ?>
        </div>
    <?php endif; ?>

    <div>
        <h2>Entrega de Papel</h2>
    </div>
    <hr>
    <style>
        .custom-alert {
            font-size: 20px; /* Aumenta el tamaño del texto */
            padding: 30px; /* Aumenta el padding */
            margin-top: 20px; /* Margen superior */
            border-radius: 10px; /* Esquinas redondeadas */
        }
        .custom-alert-wan {
            font-size: 20px; /* Tamaño del texto */
            padding: 20px; /* Espacio interno */
            margin-top: 20px; /* Espacio externo superior */
            border-radius: 10px; /* Esquinas redondeadas */
        }
    </style>
    <div id="messageDiv" class="custom-alert-wan" style="display: none;"></div>
    <div class="row">
        <div class="col-6">
            <form id="registroForm" method="POST" action="<?php echo e(route('eventos.RegistroVistaPapel')); ?>">
                <?php echo csrf_field(); ?>
                <div class="form-group" id="textboxDiv">
                    <label for="datos_evento">Registra tu tag o número de empleado:</label>
                    <input type="text" name="datos_evento" id="datos_evento" class="form-control" value="<?php echo e(old('datos_evento')); ?>" inputmode="numeric">
                </div>
                <div class="d-flex justify-content-between">
                    <div>
                        <button type="button" class="btn btn-primary" id="registrarBtn">Registrar asistencia</button>
                    </div>
                </div>
            </form>
        </div>

        <div class="col-6">
            <table class="table table-hover table-bordered custom-shadow-table custom-rounded-table">
                <thead class="table-primary">
                    <tr>
                        <th scope="col"><strong>Ubicación</strong></th>
                        <th scope="col">Conteo inicial</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if(isset($ConteoRegistroIxtlahuaca)): ?>
                        <tr>
                            <td scope="row">Ixtlahuaca</td>
                            <td><?php echo e($ConteoRegistroIxtlahuaca); ?></td>
                        </tr>
                    <?php endif; ?>
                    <?php if(isset($ConteoRegistroSanBartolo)): ?>
                        <tr>
                            <td scope="row">San Bartolo</td>
                            <td><?php echo e($ConteoRegistroSanBartolo); ?></td>
                        </tr>
                    <?php endif; ?>
                    <tr>
                        <td scope="row"><strong>Total General</strong></td>
                        <td><?php echo e($ConteoRegistros); ?></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>


    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            // Establecer el foco en el input al cargar la página
            $('#datos_evento').focus();

            $('#datos_evento').keydown(function(event) {
                if (event.keyCode === 13) {
                    event.preventDefault(); // Evitar el comportamiento por defecto de la tecla Enter
                    $('#registrarBtn').click(); // Simular un clic en el botón de registro
                    $(this).val(''); // Limpiar el valor del input después de presionar Enter
                }
            });

            $('#registrarBtn').click(function() {
                $.ajax({
                    type: 'POST',
                    url: '<?php echo e(route("eventos.RegistroVistaPapel")); ?>',
                    data: $('#registroForm').serialize(),
                    success: function(response) {
                        $('#messageDiv').removeClass().empty();
                        if (response.success) {
                            $('#messageDiv').addClass('alert alert-success custom-alert-wan').text(response.message + ': ' + response.nombre_empleado);
                            $('#datos_evento').val(''); // Limpiar el valor del input
                            $('#datos_evento').focus(); // Enfocar el input de nuevo
                        } else {
                            if (response.tipo === 'info') {
                                $('#messageDiv').addClass('alert alert-info custom-alert-wan').text(response.message);
                            } else if (response.tipo === 'warning') {
                                $('#messageDiv').addClass('alert alert-warning custom-alert-wan').text(response.message);
                            } else {
                                $('#messageDiv').addClass('alert alert-danger custom-alert-wan').text(response.message);
                            }
                            $('#datos_evento').focus(); // Enfocar el input de nuevo
                        }
                        $('#messageDiv').fadeIn();
                    },
                    error: function(xhr, status, error) {
                        $('#messageDiv').removeClass().empty();
                        $('#messageDiv').addClass('alert alert-danger custom-alert-wan').text('Error al procesar la solicitud. Inténtalo de nuevo más tarde.');
                        $('#messageDiv').fadeIn();
                        $('#datos_evento').focus(); // Enfocar el input de nuevo
                    }
                });
            });

            function checkTimeToReload() {
                var now = new Date();
                var minutes = now.getMinutes();
                var seconds = now.getSeconds();
                var milliseconds = now.getMilliseconds();

                var timeToNextReload = ((10 - (minutes % 10)) * 60 * 1000) - (seconds * 1000) - milliseconds;

                setTimeout(function() {
                    location.reload();
                }, timeToNextReload);
            }

            checkTimeToReload();
        });
    </script>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('scriptBFile'); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\sgd\resources\views\Eventos\VistaPapel.blade.php ENDPATH**/ ?>