<?php $__env->startSection('content'); ?>
<div class="row"> <!-- Inicia una fila para crear dos columnas -->

    <div class="col-md-6"> <!-- Primera columna ocupa la mitad del ancho en pantallas medianas y grandes -->
        <div class="card">
            <div class="card-header">
                <h1>Crear Nuevos Eventos</h1>
            </div>
            <div class="card-body">
                <?php if($errors->any()): ?>
                    <div class="alert alert-danger">
                        <ul>
                            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li><?php echo e($error); ?></li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                    </div>
                <?php endif; ?>

                <form method="POST" action="<?php echo e(route('eventosActualizacion.registrarEventos')); ?>" id="registroEventoForm1">
                    <?php echo csrf_field(); ?>
                    <div class="form-group">
                        <label for="nombre_evento">Nombre del Evento</label>
                        <input type="text" name="nombre_evento" id="nombre_evento" class="form-control" placeholder="Escribe el nombre del evento">
                        <div id="nombreEventoError" class="text-danger"></div>
                    </div>
                    <div class="form-check">
                        <input type="hidden" name="pre_registro" value="0">
                        <input type="checkbox" class="form-check-input" id="requierePreRegistros" name="pre_registro" value="1">
                        <label class="form-check-label" for="requierePreRegistros">&nbsp; Marcar si tu evento requiere confirmación de asistencia</label>
                    </div>
                    <br>
                    <div class="form-group text-center">
                        <div id="departamentoError" class="text-danger"></div>
                        <button type="submit" class="btn btn-primary mx-auto d-block" id="btnRegistrarEvento">Registrar Evento</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="col-md-6"> <!-- Segunda columna ocupa la mitad del ancho en pantallas medianas y grandes -->
        <div class="card">
            <div class="card-header">
                <h1>Listado de eventos</h1>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead class="thead-light">
                            <tr>
                                <th>Evento</th>
                                <th>PreRegistro</th>
                                <th>Eliminar</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if($eventos): ?>
                                <?php $__currentLoopData = $eventos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $evento): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td><?php echo e($evento->nombre); ?></td>
                                        <td><?php echo e($evento->tipo == 1 ? 'Sí' : 'No'); ?></td>
                                        <td>
                                            <?php echo Form::model($evento, ['route' => ['eventosActualizacion.destroy', $evento->id], 'method' => 'POST', 'class' => 'deleteForm']); ?>

                                            <?php echo csrf_field(); ?>
                                            <?php echo method_field('DELETE'); ?>
                                            <button type="submit" class="text-danger delete" style="background: none; border: none; cursor: pointer;" data-evento-nombre="<?php echo e($evento->tipo_evento); ?>">
                                                <i class="tio-delete tio-lg text-danger"></i>
                                            </button>
                                            <?php echo Form::close(); ?>

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

</div> <!-- Fin de la fila -->

<style>
    .form-check-input {
        width: 20px;
        height: 20px;
        cursor: pointer;
    }
    
    .form-check-label {
        font-size: 1.2rem;
        font-weight: bold;
        color: #007bff; /* Color de texto llamativo */
    }

    /* Caja envolvente del checkbox */
    .form-check {
        padding: 10px;
        border-radius: 5px;
        background-color: #f0f8ff; /* Color de fondo suave */
        box-shadow: 0 4px 8px rgba(0, 123, 255, 0.2); /* Sombra ligera */
        display: flex;
        align-items: center;
        gap: 10px;
        transition: background-color 0.3s ease;
    }

    /* Efecto al pasar el cursor */
    .form-check:hover {
        background-color: #e3f2fd;
    }
</style>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('scriptBFile'); ?>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="sweetalert2.all.min.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        <?php if(session('success')): ?>
        Swal.fire({
            title: 'Éxito',
            text: '<?php echo e(session('success')); ?>',
            icon: 'success',
            confirmButtonText: 'OK'
        });
        <?php endif; ?>

        <?php if(session('warning')): ?>
        Swal.fire({
            title: 'Advertencia',
            text: '<?php echo e(session('warning')); ?>',
            icon: 'warning',
            confirmButtonText: 'OK'
        });
        <?php endif; ?>

        <?php if(session('error')): ?>
            Swal.fire({
                title: 'Error',
                text: '<?php echo e(session('error')); ?>',
                icon: 'error',
                confirmButtonText: 'OK'
            });
        <?php endif; ?>

        document.querySelectorAll('.deleteForm').forEach(form => {
            form.addEventListener('submit', function(event) {
                event.preventDefault();
                Swal.fire({
                    title: '¿Estás seguro?',
                    text: "¡No podrás revertir esto!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Sí, eliminarlo',
                    cancelButtonText: 'Cancelar'
                }).then((result) => {
                    if (result.isConfirmed) {
                        form.submit();
                    }
                });
            });
        });
    });
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\xampp1\htdocs\intimark_sgd\resources\views/eventosActualizacion/inicioEvento.blade.php ENDPATH**/ ?>