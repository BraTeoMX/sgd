 <!-- Extiende una vista principal llamada 'main' -->

<?php $__env->startSection('content'); ?>
<div class="card"> <!-- Inicia una tarjeta (card) para la sección de contenido -->
    <div class="card-header"> <!-- Encabezado de la tarjeta con un título -->
        <h1>Crear Nuevos Eventos</h1> <!-- Título principal de la página -->
    </div>
    <div class="card-body"> <!-- Cuerpo de la tarjeta -->
        <?php if($errors->any()): ?>
            <!-- Comprueba si hay errores de validación y muestra un mensaje de alerta si los hay -->
            <div class="alert alert-danger">
                <ul>
                    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li><?php echo e($error); ?></li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            </div>
        <?php endif; ?>

        <h2>Crear eventos</h2> <!-- Título secundario para la sección de creación de eventos -->

        <?php if(session('success')): ?>
            <!-- Comprueba si hay un mensaje de éxito en la sesión y muestra un mensaje de éxito si existe -->
            <div class="alert alert-success">
                <?php echo e(session('success')); ?>

            </div>
        <?php endif; ?>

        <form method="POST" action="<?php echo e(route('eventos.RegistrarEventos')); ?>" id="registroEventoForm">
            <!-- Formulario para crear eventos -->
            <?php echo csrf_field(); ?> <!-- Agrega un token CSRF para protección contra ataques CSRF -->
            <div class="form-group">
                <label for="nombre_evento">Nombre del Evento</label>
                <!-- Campo de entrada para el nombre del evento -->
                <input type="text" name="nombre_evento" id="nombre_evento" class="form-control" placeholder="Escribe el nombre del evento">
                <div id="nombreEventoError" class="text-danger"></div> <!-- Muestra errores relacionados con el nombre del evento -->

            </div>
            <div class="form-check">
                <input type="checkbox" class="form-check-input" id="requierePreRegistros" name="requiere_pre_registros">
                <!-- Casilla de verificación para indicar si se requieren preregistros -->
                <label class="form-check-label" for="requierePreRegistros">Tu evento requiere de Registros</label>
            </div>
            <div class="form-group text-center">
                <div id="departamentoError" class="text-danger"></div> <!-- Muestra errores relacionados con el departamento -->
                <button type="submit" class="btn btn-primary mx-auto d-block" id="btnRegistrarEvento">Registrar Evento</button>
                <!-- Botón para enviar el formulario de registro de eventos -->
            </div>
        </form>

        <div class="card-header">
            <h1>Listado de eventos</h1> <!-- Título principal para la sección de listado de eventos -->
        </div>
        <div class="card-body">
            <!-- Cuerpo de la tarjeta para la sección de listado de eventos -->
            <div id="datatableWithSearchInput" class="table-responsive datatable-custom">
                <!-- Tabla para mostrar la lista de eventos -->
                <table id="exportOptionsDatatables" class="table table-borderless table-thead-bordered table-nowrap table-align-middle card-table" data-hs-datatables-options='{"order": [], "search": "#datatableWithSearchInput", "isResponsive": false, "isShowPaging": false, "paging": false }'>
                    <!-- Configuración de la tabla -->
                    <thead class="thead-light">
                        <tr>
                            <th>Evento</th>
                            <th>Utiliza PreRegistro</th>
                            <th>Eliminar</th>
                            <th>    </th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Contenido de la tabla -->
                        <?php if(count($eventos) > 0): ?>
                            <!-- Comprueba si hay eventos en la lista y los muestra si existen -->
                            <?php $__currentLoopData = $eventos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $evento): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <!-- Itera a través de la lista de eventos -->
                                <tr>
                                    <td><?php echo e($evento->tipo_evento); ?></td>
                                    <!-- Muestra el nombre del evento -->
                                    <td><?php echo e($evento->conf_pre_regis); ?></td>
                                    <!-- Muestra si se requieren preregistros o no -->
                                    <td>
                                        <?php echo Form::model($evento, ['method' => 'delete', 'route' => ['eventos.destroy', $evento->id], 'id' => 'eventoEliminarForm']); ?>

                                        <!-- Formulario para eliminar el evento -->
                                        <a class="text-danger delete" style="cursor: pointer" data-evento-nombre="<?php echo e($evento->tipo_evento); ?>" data-toggle="modal" data-target="#confirmarEliminar">
                                            <i class="tio-delete tio-lg text-danger"></i>
                                        </a>
                                        <?php echo Form::close(); ?>

                                    </td>
                                    <?php if($evento->id_evento == 5): ?>
                                    <td>
                                        <a href="<?php echo e(route('eventos.UpdatePuestos')); ?>" class="btn btn-secondary UpPuestos">Actualizar Puestos</a>
                                    </td>

                                <?php endif; ?>
                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php else: ?>
                            <!-- Muestra un mensaje si no hay eventos en la lista -->
                            <tr>
                                <td>No hay eventos creados todavía.</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<script>
    document.getElementById('registroEventoForm').addEventListener('submit', function (e) {
        // Valida el formulario antes de enviarlo
        var nombreEvento = document.getElementById('nombre_evento').value;
        if (nombreEvento === '') {
            document.getElementById('nombreEventoError').textContent = 'Favor de ingresar los datos para poder registrar tu evento';
            e.preventDefault();
        } else {
            document.getElementById('nombreEventoError').textContent = '';
       // Aquí puedes colocar el código del SweetAlert
       Swal.fire({
  position: 'center',
  icon: 'success',
  title: 'Evento creado!',
  showConfirmButton: false,
  timer: 2500
})
        }
    });

</script>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('scriptBFile'); ?>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="sweetalert2.all.min.js"></script>
<script>
   $('.delete').on('click', function(event) {
    var eventoNombre = $(this).data('evento-nombre');
    var deleteButton = $(this); // Almacenamos una referencia al enlace

    Swal.fire({
        title: 'Estimado colaborador<br>¿Está seguro de eliminar el evento "'+ eventoNombre +'" ?',
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
                title: 'Se ha eliminado correctamente el evento "'+eventoNombre+'"',
                showConfirmButton: false,
                timer: 2000
            });

            setTimeout(function () {
                deleteButton.closest('form').submit(); // Utilizamos la referencia almacenada
            }, 1000);
        }
    });
});

    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\sgd\resources\views\Eventos\create.blade.php ENDPATH**/ ?>