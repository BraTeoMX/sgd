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
    <div class="card card-body">
        <div>
            <h2>Simulacro de Sismos</h2>
        </div>
        <hr>
        <style>
            .custom-alert {
                font-size: 20px;
                /* Aumenta el tamaño del texto */
                padding: 30px;
                /* Aumenta el padding */
                margin-top: 20px;
                /* Margen superior */
                border-radius: 10px;
                /* Esquinas redondeadas */
            }

            .custom-alert-wan {
                font-size: 20px;
                /* Tamaño del texto */
                padding: 20px;
                /* Espacio interno */
                margin-top: 20px;
                /* Espacio externo superior */
                border-radius: 10px;
                /* Esquinas redondeadas */
            }
        </style>
        <div id="messageDiv" class="custom-alert-wan" style="display: none;"></div>

        <div class="row">
            <div class="col-12">
                <form id="registroForm" method="POST" action="<?php echo e(route('eventos.registroSimulacro')); ?>">
                    <?php echo csrf_field(); ?>
                    <div class="form-group" id="textboxDiv">
                        <label for="datos_evento">Registra tu tag o número de empleado:</label>
                        <input type="text" name="datos_evento" id="datos_evento" class="form-control"
                            value="<?php echo e(old('datos_evento')); ?>" inputmode="numeric">
                    </div>
                    <div class="d-flex justify-content-between">
                        <div>
                            <button type="button" class="btn btn-primary" id="registrarBtn">Registrar asistencia</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-12">
                <table class="table table-hover table-bordered custom-shadow-table custom-rounded-table">
                    <thead class="table-primary">
                        <tr>
                            <th scope="col"><strong>Ubicación</strong></th>
                            <th scope="col">Conteo inicial</th>
                        </tr>
                    </thead>
                    <tbody id="conteo-table-body">
                        <tr>
                            <td scope="row">Ixtlahuaca</td>
                            <td id="conteo-ixtlahuaca"><?php echo e($ConteoRegistroIxtlahuaca); ?></td>
                        </tr>
                        <tr>
                            <td scope="row">San Bartolo</td>
                            <td id="conteo-sanbartolo"><?php echo e($ConteoRegistroSanBartolo); ?></td>
                        </tr>
                        <tr>
                            <td scope="row"><strong>Total General</strong></td>
                            <td id="conteo-total"><?php echo e($ConteoRegistros); ?></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    
    <link rel="stylesheet" href="<?php echo e(asset('css/simulacro.css')); ?>">

    <script src="https://code.jquery.com/jquery-3.6.0.min.js" defer></script>

    <script type="module">
        // Módulo principal para el manejo del simulacro
        const SimulacroManager = {
            messageDiv: null,
            inputField: null,
            form: null,
            counters: {},

            async init() {
                this.messageDiv = document.getElementById('messageDiv');
                this.inputField = document.getElementById('datos_evento');
                this.form = document.getElementById('registroForm');
                this.counters = {
                    ixtlahuaca: document.getElementById('conteo-ixtlahuaca'),
                    sanbartolo: document.getElementById('conteo-sanbartolo'),
                    total: document.getElementById('conteo-total')
                };

                this.setupEventListeners();
                this.startCounterUpdates();
            },

            setupEventListeners() {
                // Debounce para el input
                let timeout;
                this.inputField.addEventListener('keydown', (event) => {
                    if (event.key === 'Enter') {
                        event.preventDefault();
                        clearTimeout(timeout);
                        this.enviarDatos();
                    }
                });

                document.getElementById('registrarBtn').addEventListener('click', () => this.enviarDatos());
            },

            async enviarDatos() {
                try {
                    const formData = new FormData(this.form);
                    const response = await fetch('<?php echo e(route('eventos.registroSimulacro')); ?>', {
                        method: 'POST',
                        headers: {
                            'X-CSRF-TOKEN': '<?php echo e(csrf_token()); ?>',
                            'Accept': 'application/json',
                            'Content-Type': 'application/json'
                        },
                        body: JSON.stringify(Object.fromEntries(formData))
                    });

                    const data = await response.json();
                    this.showMessage(data);
                    this.actualizarConteos();
                } catch (error) {
                    console.error('Error:', error);
                    this.showMessage({
                        success: false,
                        message: 'Error al procesar la solicitud. Inténtalo de nuevo más tarde.'
                    });
                } finally {
                    this.inputField.value = '';
                    this.inputField.focus();
                }
            },

            showMessage(data) {
                this.messageDiv.className = '';
                const baseClass = 'alert custom-alert-wan ';
                const messageType = data.success ? 'success' : (data.tipo || 'danger');

                this.messageDiv.className = baseClass + 'alert-' + messageType;
                this.messageDiv.textContent = data.success ?
                    `${data.message}: ${data.nombre_empleado}` :
                    data.message;

                this.messageDiv.style.display = 'block';
                setTimeout(() => this.messageDiv.style.display = 'none', 5000);
            },

            async actualizarConteos() {
                try {
                    const response = await fetch('<?php echo e(route('eventos.obtenerConteosAjax')); ?>');
                    const data = await response.json();

                    // Actualizar contadores solo si han cambiado
                    if (this.counters.ixtlahuaca.textContent !== data.ConteoRegistroIxtlahuaca.toString()) {
                        this.counters.ixtlahuaca.textContent = data.ConteoRegistroIxtlahuaca;
                    }
                    if (this.counters.sanbartolo.textContent !== data.ConteoRegistroSanBartolo.toString()) {
                        this.counters.sanbartolo.textContent = data.ConteoRegistroSanBartolo;
                    }
                    if (this.counters.total.textContent !== data.ConteoRegistros.toString()) {
                        this.counters.total.textContent = data.ConteoRegistros;
                    }
                } catch (error) {
                    console.error('Error al actualizar conteos:', error);
                }
            },

            startCounterUpdates() {
                // Usar RequestAnimationFrame para optimizar las actualizaciones
                let lastUpdate = 0;
                const updateInterval = 5000; // 5 segundos

                const update = (timestamp) => {
                    if (timestamp - lastUpdate >= updateInterval) {
                        this.actualizarConteos();
                        lastUpdate = timestamp;
                    }
                    requestAnimationFrame(update);
                };

                requestAnimationFrame(update);
            }
        };

        // Iniciar cuando el DOM esté listo
        document.addEventListener('DOMContentLoaded', () => SimulacroManager.init());
    </script>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('scriptBFile'); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\sgd\resources\views\Eventos\simulacro.blade.php ENDPATH**/ ?>