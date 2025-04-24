  

<?php $__env->startSection('content'); ?>  

<div class="row">  
    <div class="col-12">  
        <div class="card">  
            <div class="card-header">
                <h1 class= "textoH1">Evento: <?php echo e($contador); ?></h1>  
                <?php if(auth()->user()->hasRole('Seguridad e Higiene') ||
                auth()->user()->hasRole('Administrador Sistema') ||  auth()->user()->hasRole('Jefe Administrativo') ): ?>
                    <a href="<?php echo e(route('eventos.DeleteRegPre')); ?>" class="btn btn-danger deleteReg">Eliminar registros</a>
                <?php endif; ?>
            </div>
            <div class="card-body">  
                <?php if(session('error')): ?>  
                    <div class="alert alert-danger">
                        <?php echo e(session('error')); ?>  
                    </div>
                <?php endif; ?>
                <div class="container">  
                    <h2 id="eventos-existentes">Eventos existentes</h2>  
                    <form method="POST" action="<?php echo e(route('eventos.RegistrarAsistencias')); ?>">  
                        <?php echo csrf_field(); ?>  
                        <div class="form-group">  
                            <label id="titulome" for="tipo_evento">Elije el evento al que desees generar registros de asistencia</label>
                            <input type="hidden" name="optionsave" id="optionsave" class="form-control" value="<?php echo e($optionsave); ?>">
                            <input type="hidden" name="auxiliar" id="auxiliar" class="form-control" value="<?php echo e($auxiliar); ?>">
                            <input type="hidden" name="datos" id="datos" class="form-control" value="<?php echo e('Nombre: '.$nombre.'<br> Numero de empleado: '.$emplTag); ?>">
                            <input type="hidden" name="nomb" id="nomb" class="form-control" value="<?php echo e($contador); ?>">

                            <p id= "elemento_p">Selecciona una opción</p>
                            <select name="tipo_evento" id="tipo_evento" class="form-control">  
                                <option value="default" selected>Selecciona una opción</option>
                                <?php $__currentLoopData = $eventos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $evento): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>  

                                    <option value="<?php echo e($evento->cve_evento); ?>" <?php echo e($evento->cve_evento == $optionsave ? 'selected' : ''); ?>><?php echo e($evento->tipo_evento); ?></option>

                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                           </select>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group" id="textboxDiv" style="<?php echo e($optionsave !== 'default' ? 'display: block;' : 'display: none;'); ?>">
                                    <label for="datos_evento">Registra tu tag o número de empleado:</label>
                                        <input type="text" name="datos_evento" id="datos_evento" class="form-control" value="<?php echo e(old('datos_evento')); ?>"
                                        type="text" inputmode="numeric">
                                        <script>
                                            // Obtén el elemento de entrada por su ID
                                            var input = document.getElementById('datos_evento');
                                            // Enfoca el campo de entrada cuando la pagina se carga
                                            input.focus();
                                        </script>
                                </div>
                            </div>
                            <div class="col-6">
                                <style>
                                    .custom-shadow-table {
                                      box-shadow: 25px 25px 25px 15px rgba(205, 221, 236, 0.767); /* Ajusta los valores según tu preferencia */

                                    }
                                    /*Aqui es para cambiar el color que se requiere personalizar, asi como el texto  */
                                    .custom-header {
                                        background-color: #7fa1cc; /* Cambia el color a tu preferencia */
                                        color: rgb(0, 0, 0); /* Cambia el color del texto si es necesario */
                                    }
                                    .custom-rounded-table {
                                        border-top-left-radius: 10px; /* Ajusta el valor según tu preferencia */
                                        border-top-right-radius: 10px; /* Ajusta el valor según tu preferencia */
                                        border-radius: 15px; /* Ajusta el valor según tu preferencia */
                                    }
                                  </style>
                                    <table class="table table-hover table-bordered custom-shadow-table custom-rounded-table">

                                        <thead class="table-primary">
                                            <tr>
                                                <th scope="col"><strong>Ubicación</strong></th>
                                                <th scope="col">Conteo inicial</th>
                                                <th scope="col">Conteo Total</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td scope="row">Ixtlahuaca</td>
                                                <td><?php echo e($ConteoRegistroIxtlahuaca); ?></td>
                                                <td><?php echo e($RegistroIxtlahuacaTotal); ?></td>
                                            </tr>
                                            <tr>
                                                <td scope="row">San Bartolo</td>
                                                <td><?php echo e($ConteoRegistroSanBartolo); ?></td>
                                                <td><?php echo e($RegistroSanBartoloTotal); ?></td>
                                            </tr>
                                            <tr>
                                                <td scope="row"><strong>Total General</strong></td>
                                                <td><?php echo e($ConteoRegistros); ?></td>
                                                <td><?php echo e($ConteoRegistrosTotal); ?></td>
                                            </tr>
                                        </tbody>
                                    </table>
                            </div>
                        </div>
                        <div class="d-flex justify-content-between">  
                            <div>
                                <button type="submit" class="btn btn-primary" id="registrarBtn">Registrar asistencia</button>  


                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<div id="messageDiv" class="alert alert-info text-center" style="display: none; position: fixed; top: 50%; left: 50%; transform: translate(-50%, -50%); z-index: 9999;"></div>  
<script>
    document.getElementById("tipo_evento").addEventListener("change", function () {  
        var tipoEvento = document.getElementById("tipo_evento").value;
        var textboxDiv = document.getElementById("textboxDiv");
        textboxDiv.style.display = tipoEvento !== "default" ? "block" : "none";  
    });

    document.getElementById("registrarBtn").addEventListener("click", function (e) {  
        var tipoEvento = document.getElementById("tipo_evento").value;
        var datosEvento = document.getElementById("datos_evento").value;

        if (tipoEvento === "default" || datosEvento.trim() === "") {
            e.preventDefault();
            showMessage("Seleccione un evento y complete el campo de datos válidos.", "");  
        }
    });
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
  title: 'Registro guardado con exito!<br>'+$('#datos').val(),
  showConfirmButton: false,
  timer: 1000
})} else{
                if($('#auxiliar').val()==0)
                Swal.fire({
  position: 'center',
  icon: 'error',
  title: 'No se encontraron datos para el registro',
  showConfirmButton: false,
  timer: 1000
})} if($('#auxiliar').val()==3){
                Swal.fire({
  position: 'center',
  icon: 'warning',
  title: 'Ya cuenta con registro existente!<br>'+$('#datos').val(),
  showConfirmButton: false,
  timer: 1000
})}if($('#auxiliar').val()==5){
                Swal.fire({
  position: 'center',
  icon: 'error',
  title: 'Empleado no corresponde al puesto<br>'+$('#datos').val(),
  showConfirmButton: false,
  timer: 1000
})}if($('#auxiliar').val()==6){
                Swal.fire({
  position: 'center',
  icon: 'error',
  title: 'Nuevo ingreso, no le corresponde despensa 🛒<br>fecha de ingreso:'+$('#ing').val()+'<br>'+$('#datos').val(),
  showConfirmButton: false,
  timer: 1000
})}
 } );
        </script>

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
</script>
<script>
  document.addEventListener("DOMContentLoaded", function () {
    // Obtiene elementos necesarios
    var tipoEventoSelect = document.getElementById("tipo_evento");
    var tituloEvento = document.querySelector(".card-header h1");
    var eventoOptions = document.getElementById("tipo_evento").getElementsByTagName('option'); // Obtén todas las opciones

    // Escucha el evento de cambio en el menú desplegable
    tipoEventoSelect.addEventListener("change", function () {
        // Obtiene el valor seleccionado
        var selectedValue = tipoEventoSelect.value;

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
            tituloEvento.textContent = "Evento: " + selectedText;
        } else {
            tituloEvento.textContent = "Evento: <?php echo e($contador); ?>"; // Vuelve al título original
        }
    });
});

</script>
<script>
    document.addEventListener("DOMContentLoaded", function () {
      // Obtiene elementos necesarios
      var tipoEventoSelect = document.getElementById("tipo_evento");
      var tituloEvento = document.querySelector(".card-header h1");
      var backhear = document.querySelector(".card-header");
      var eventoOptions = document.getElementById("tipo_evento").getElementsByTagName('option'); // Obtén todas las opciones

      // Escucha el evento de cambio en el menú desplegable
      tipoEventoSelect.addEventListener("change", function () {
          // Obtiene el valor seleccionado
          var selectedValue = tipoEventoSelect.value;
          backhear.classList.remove("title-selected1","title-selected2","title-selected3");

if (selectedValue !== "default") {
// Si se selecciona una opción diferente de "default", aplica la clase para cambiar el color
backhear.classList.add("title-selected");
}if (selectedValue == "Sim"){
backhear.classList.add("title-selected1");
}if (selectedValue == "EntPH"){
backhear.classList.add("title-selected2");
}if (selectedValue == "EaDa6"){
backhear.classList.add("title-selected3");
}
var selectedValue = tituloEvento.value;


var selectedValue = tipoEventoSelect.value;
registrarBtn.classList.remove("btn-Sim", "btn-sa12","btn-EaDa6");

if (selectedValue !== "default") {
// Si se selecciona una opción diferente de "default", aplica la clase para cambiar el color de fondo
registrarBtn.classList.add("btn-selected");

if (selectedValue === "Sim") {
// Si el evento es "Fiesta", agrega la clase específica para "Fiesta"
registrarBtn.classList.add("btn-Sim");
} else if (selectedValue === "EntPH") {
// Si el evento es "sa12", agrega la clase específica para "sa12"
registrarBtn.classList.add("btn-sa12");
}else if (selectedValue === "EaDa6") {
// Si el evento es "sa12", agrega la clase específica para "sa12"
registrarBtn.classList.add("btn-EaDa6");
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
              tituloEvento.textContent = "Evento: " + selectedText;
          } else {
              tituloEvento.textContent = "Evento: <?php echo e($contador); ?>"; // Vuelve al título original
          }
      });
  });

  </script>
<style>
    /* Estilo por defecto */
    .title-selected1 {
    background-color: #ff0d00; /* Cambia el color a tu elección */

    }
    .title-selected2 {
    background-color: #229954; /* Cambia el color a tu elección */

    }.btn-Sim {
    background-color: #ff0d00; /* Cambia el color de fondo a tu elección para el evento "Fiesta" */
    color: white; /* Cambia el color del texto a tu elección */
    }

    .btn-sa12 {
    background-color: #229954; /* Cambia el color de fondo a tu elección para el evento "sa12" */
    color: white; /* Cambia el color del texto a tu elección */
    }
    /*Apartado para la seccion de colores evento  Entrega despensa */
    .title-selected3 {
    background-color: #7c6b6b; /* Cambia el color a tu elección */

    }.btn-EaDa6 {
    background-color: #7c6b6b; /* Cambia el color de fondo a tu elección para el evento "Fiesta" */
    color: white; /* Cambia el color del texto a tu elección */
    }

    .textoH1{
    color:rgb(42, 39, 39);
    }

    </style>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\sgd\resources\views\Eventos\ListaEventos.blade.php ENDPATH**/ ?>