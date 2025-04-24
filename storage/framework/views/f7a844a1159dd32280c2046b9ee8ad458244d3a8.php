<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h1 class="textoH1"> Registro: <?php echo e($contador); ?></h1>
                    <?php if(auth()->user()->hasRole('Seguridad e Higiene') ||
                    auth()->user()->hasRole('Administrador Sistema') ||  auth()->user()->hasRole('Jefe Administrativo') ): ?>
                        <div class="text-right">
                            <a href="<?php echo e(route('eventos.DeleteRegistros')); ?>" class="btn btn-danger deleteReg">Eliminar registros</a>
                        </div>
                    <?php endif; ?>

                </div>
                <div class="card-body">
                    <?php if(session('error')): ?>
                        <div class="alert alert-danger">
                            <?php echo e(session('error')); ?>

                        </div>
                    <?php endif; ?>
                    <?php if(isset($Asistencia)): ?>
                    <?php endif; ?>
                    <div class="container">
                        <h2 id="eventos-existentes">Eventos existentes</h2>
                        <form method="POST" action="<?php echo e(route('eventos.PreRegistro')); ?>">
                            <?php echo csrf_field(); ?>
                            <div class="form-group">
                                <label id="titulome">Elije el evento al que desees generar Pre Registros de asistencia</label>
                                <input type="hidden" name="optionsave" id="optionsave" class="form-control" value="<?php echo e($optionsave); ?>">
                                <input type="hidden" name="auxiliar" id="auxiliar" class="form-control" value="<?php echo e($auxiliar); ?>">
                                <input type="hidden" name="datos" id="datos" class="form-control" value="<?php echo e($nombre.'<br> Numero de empleado: '.$emplTag); ?>">
                                <input type="hidden" name="optionsave" id="optionsave" class="form-control" value="<?php echo e($optionsave); ?>">
                                <input type="hidden" name="id_registro" id="id_registro" class="form-control" value="<?php echo e($id_registro); ?>">
                                <p>Selecciona una opción</p>
                                <select name="tipo_evento" id="tipo_evento" class="form-control">
                                    <option value="default" selected>Selecciona una opción</option>
                                    <?php $__currentLoopData = $eventos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $evento): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($evento->cve_evento); ?>" <?php echo e($evento->cve_evento == $optionsave ? 'selected' : ''); ?>><?php echo e($evento->tipo_evento); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                            <div class="form-group" id="textboxDiv" style="<?php echo e($optionsave !== 'default' ? 'display: block;' : 'display: none;'); ?>">
                                <label for="datos_evento">Registra tu tag o número de empleado:</label>
                                <input type="text" name="datos_evento" id="datos_evento" class="form-control" value="<?php echo e(old('datos_evento')); ?>"
                                    type="text" inputmode="numeric">
                                    <script>
                                        // Obtén el elemento de entrada por su ID
                                        var input = document.getElementById('datos_evento');

                                        // Enfoca el campo de entrada cuando la página se carga
                                        input.focus();
                                    </script>
                            </div>
                            <button type="submit" class="btn btn-primary btn-selected" id="registrarBtn" onclick="incrementarContador()">Registrar al evento</button>
                            <div class="text-right">
                                <button type="button" class="btn btn-secondary btn_becario" id="btn_becario">Registrar becarios al evento</button>
                                </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="messageDiv" class="alert alert-info text-center" style="display: none; position: fixed; top: 50%; left: 50%; transform: translate(-50%, -50%); z-index: 9999;">
    </div>
    <script>
          document.addEventListener("DOMContentLoaded", function () {
        var tipoEvento = document.getElementById("tipo_evento").value;
        var eventosExistentes = document.getElementById("eventos-existentes");
        var titulome = document.getElementById("titulome");
        var isHidden = localStorage.getItem("elementsHidden") === "true";

        if (isHidden) {
            eventosExistentes.style.display = "none";
            titulome.style.display = "none";
        } else {
            if (tipoEvento !== "default") {
                eventosExistentes.style.display = "none";
                titulome.style.display = "none";
            }
        }

        document.getElementById("tipo_evento").addEventListener("change", function () {
            var tipoEvento = document.getElementById("tipo_evento").value;
            var textboxDiv = document.getElementById("textboxDiv");

            if (tipoEvento !== "default") {
                textboxDiv.style.display = "block";
                eventosExistentes.style.display = "none";
                titulome.style.display = "none";
                localStorage.setItem("elementsHidden", "true");
            } else {
                textboxDiv.style.display = "none";
            }
        });
    });

        // Validar antes de enviar el formulario
        document.getElementById("registrarBtn").addEventListener("click", function (e) {
            var tipoEvento = document.getElementById("tipo_evento").value;

            if (tipoEvento === "default") {
                e.preventDefault(); // Detener el envío del formulario
                showMessage("Seleccione un evento para poder registrar su asistencia");
            }

            var datosEvento = document.getElementById("datos_evento").value;

            if (datosEvento.trim() === "") {
                e.preventDefault(); // Detener el envío del formulario
                showMessage("Favor de ingresar datos válidos (No. acceso o No. empleado)");
            }
        });

        function showMessage(message) {
            var messageDiv = document.getElementById("messageDiv");
            messageDiv.textContent = message;
            messageDiv.style.display = "block";

            setTimeout(function () {
                messageDiv.style.display = "none";
            }, 1000); // 3 segundos (3000 milisegundos)
        }
    </script>
    <script>
         // Verifica si el usuario ya se ha registrado
    var usuarioRegistrado = localStorage.getItem('usuarioRegistrado') === 'true';

    var contador = 0; // Inicializa el contador en 0

    // Función para incrementar el contador
    function incrementarContador() {
        if (!usuarioRegistrado) {
            contador++;
            localStorage.setItem('usuarioRegistrado', 'true'); // Marca al usuario como registrado
        }
        document.getElementById('contador').textContent = contador;
    }
    </script>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('scriptBFile'); ?>

<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="sweetalert2.all.min.js"></script>
    <script>
        $(document).ready(function() {
            if($('#auxiliar').val()==1){
                Swal.fire({
  position: 'center',
  icon: 'success',
  title: 'Registro guardado<br>'+$('#datos').val(),
  showConfirmButton: false,
  timer: 1500
})}else{
                if($('#auxiliar').val()==0)
                Swal.fire({
  position: 'center',
  icon: 'error',
  title: 'No se encontraron datos para el registro',
  showConfirmButton: false,
  timer: 1500
})}if($('#auxiliar').val()==3){
                Swal.fire({
  position: 'center',
  icon: 'warning',
  title: 'Usuario ya Registrado<br>'+$('#datos').val(),
  showConfirmButton: false,
  timer: 1500
})}
        }
        );
        </script>
        <script>
            document.addEventListener("DOMContentLoaded", function () {
              // Obtiene elementos necesarios
              var tipoEventoSelect = document.getElementById("tipo_evento");
              var tituloEvento = document.querySelector(".textoH1");
              var backhear = document.querySelector(".card-header");
              var eventoOptions = document.getElementById("tipo_evento").getElementsByTagName('option'); // Obtén todas las opciones

              // Escucha el evento de cambio en el menú desplegable
              tipoEventoSelect.addEventListener("change", function () {
                  // Obtiene el valor seleccionado
                  var selectedValue = tipoEventoSelect.value;
                  backhear.classList.remove("title-selected1","title-selected2");

if (selectedValue !== "default") {
    // Si se selecciona una opción diferente de "default", aplica la clase para cambiar el color
    backhear.classList.add("title-selected");
}if (selectedValue == "Fiesta"){
    backhear.classList.add("title-selected1");
}if (selectedValue == "Misa12"){
    backhear.classList.add("title-selected2");
}

var selectedValue = tipoEventoSelect.value;
registrarBtn.classList.remove("btn-fiesta", "btn-sa12");

if (selectedValue !== "default") {
    // Si se selecciona una opción diferente de "default", aplica la clase para cambiar el color de fondo
    registrarBtn.classList.add("btn-selected");

    if (selectedValue === "Fiesta") {
        // Si el evento es "Fiesta", agrega la clase específica para "Fiesta"
        registrarBtn.classList.add("btn-fiesta");
    } else if (selectedValue === "Misa12") {
        // Si el evento es "sa12", agrega la clase específica para "sa12"
        registrarBtn.classList.add("btn-sa12");
    }
}
                  // Busca el texto correspondiente al valor seleccionado
                  var selectedText = "";
                  for (var i = 0; i < eventoOptions.length; i++) {
                      if (eventoOptions[i].value === selectedValue) {
                          selectedText = eventoOptions[i].text;
                          break;
                      }
                  }

                  // Actualiza el título en la cabecera de la tarjeta con el tipo de evento
                  if (selectedValue !== "default") {
                      tituloEvento.textContent = "Registro: " + selectedText;
                  } else {
                      tituloEvento.textContent = "Registro: <?php echo e($contador); ?>"; // Vuelve al título original
                  }
              });
          });

          </script>

     <script>
document.addEventListener("DOMContentLoaded", function () {
    document.getElementById("btn_becario").addEventListener("click", async function () {
        const { value: planta } = await Swal.fire({
            title: 'Selecciona tu planta',
            input: 'select',
            inputOptions: {
                'Ixtlahuca': {
                    'Intimark1': 'Intimark1',
                },
                'San Bartolo': {
                    'Intimark2': 'Intimark2',
                }
            },
            inputPlaceholder: 'Selecciona tu planta',
            showCancelButton: true,
            inputValidator: (value) => {
                if (!value) {
                    return 'Debes seleccionar una planta.';
                }
            }
        });

        if (planta) {
            const { value: formValues } = await Swal.fire({
                title: 'Registro de becarios',
                html:
                    '<input id="nombre_becario" name="nombre_becario" class="swal2-input" placeholder="Nombre del becario">',
                focusConfirm: false,
                preConfirm: () => {
                    return [
                        planta, // Planta seleccionada
                        document.getElementById('nombre_becario').value, // Nombre del becario
                    ];
                }
            });

            if (formValues) {
                // Aquí puedes realizar acciones con los valores ingresados por el usuario, por ejemplo, enviarlos al servidor.
                enviarDatosAlControlador(formValues);
                // También puedes realizar otras acciones después de mostrar el segundo SweetAlert.
                // Por ejemplo, enviar los datos al servidor, actualizar la página, etc.
            }
        }
    });
});


    </script>


<script>
    document.addEventListener("DOMContentLoaded", function () {
        var tipoEventoSelect = document.getElementById("tipo_evento");
        var btnBecario = document.getElementById("btn_becario");

        tipoEventoSelect.addEventListener("change", function () {
            var selectedValue = tipoEventoSelect.value;

            if (selectedValue !== "default") {
                // Si se ha seleccionado un evento válido, habilita el botón "Registrar becarios"
                btnBecario.removeAttribute("disabled");
            } else {
                // Si no se ha seleccionado un evento válido, deshabilita el botón "Registrar becarios"
                btnBecario.setAttribute("disabled", "disabled");

            }
        });
    });
</script>
<script>
    // Añade la función enviarDatosAlControlador aquí
    function enviarDatosAlControlador(data) {
        const url = '<?php echo e(route('eventos.registrarBecario')); ?>'; // Ruta al controlador Laravel
        const formData = new FormData();
        formData.append('nombre_becario', data[1]); // Nombre del becario
        formData.append('planta', data[0]); // Planta seleccionada
        formData.append('tipo_evento', $('#tipo_evento').val()); // Tipo de evento desde el formulario
        var nombre=data[1];

        fetch(url, {
            method: 'POST',
            body: formData,
            headers: {
                'X-CSRF-TOKEN': '<?php echo e(csrf_token()); ?>', // Token CSRF necesario para las solicitudes POST
            },
        })
        .then(response => {
            if (response.ok) {
                return response.json(); // Si la respuesta es exitosa, procesa la respuesta JSON
            } else {
                throw new Error('Error al enviar los datos al controlador'); // Lanza un error si la respuesta no es exitosa
            }
        })
        .then(data => {
           // alert(data);
            // Aquí puedes manejar la respuesta del controlador si es necesario
            Swal.fire({
                position: 'center',
                icon: 'success',
                title: nombre+'<br>Registro guardado.<br><b>Tu numero de registro es: '+data,
                showConfirmButton: false,
                timer: 1000
            });

            // Puedes realizar más acciones después de guardar con éxito, como actualizar la página
            // o realizar otras operaciones si es necesario
        })
        .catch(error => {
            console.error('Error al enviar los datos al controlador:', error);

            // Puedes manejar el error mostrando una notificación de error o tomando otras medidas
            Swal.fire({
                icon: 'error',
                title: 'Error al enviar datos al servidor',
                text: 'Por favor, inténtalo de nuevo más tarde.'
            });
        });
    }
</script>

          <style>
            /* Estilo por defecto */
            .title-selected1 {
    background-color: #007bff; /* Cambia el color a tu elección */

}         .title-selected2 {
    background-color: #01f0e8; /* Cambia el color a tu elección */

}.btn-fiesta {
    background-color: #007bff; /* Cambia el color de fondo a tu elección para el evento "Fiesta" */
    color: white; /* Cambia el color del texto a tu elección */
}

.btn-sa12 {
    background-color: #01f0e8; /* Cambia el color de fondo a tu elección para el evento "sa12" */
    color: white; /* Cambia el color del texto a tu elección */
}
.textoH1{
    color: rgb(42, 39, 39);
}

            </style>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\xampp1\htdocs\intimark_sgd\resources\views/eventos/PreRegistro.blade.php ENDPATH**/ ?>