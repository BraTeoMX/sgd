@extends('layouts.main')

@section('content')
    @if(session('error'))
        <div class="alert alert-danger custom-alert">
            {{ session('error') }}
        </div>
    @endif
    @if(session('success'))
        <div class="alert alert-success custom-alert">
            {{ session('success') }}
            @if(session('nombre'))
                <br>{{ session('nombre') }}
            @endif
        </div>
    @endif
    @if(session('duplicado'))
        <div class="alert alert-warning custom-alert">
            {{ session('duplicado') }}
            @if(session('nombre'))
                <br>{{ session('nombre') }}
            @endif
        </div>
    @endif
    @if(session('no_puesto'))
        <div class="alert alert-info custom-alert">
            {{ session('no_puesto') }}
            @if(session('nombre'))
                <br>{{ session('nombre') }}
            @endif
        </div>
    @endif
    <div class="card card-body">
        <div>
            <h2>Simulacro de Sismos</h2>
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
            <div class="col-12">
                <form id="registroForm" method="POST" action="{{ route('eventos.registroSimulacro') }}">
                    @csrf
                    <div class="form-group" id="textboxDiv">
                        <label for="datos_evento">Registra tu tag o número de empleado:</label>
                        <input type="text" name="datos_evento" id="datos_evento" class="form-control" value="{{ old('datos_evento') }}" inputmode="numeric">
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
                            <td id="conteo-ixtlahuaca">{{ $ConteoRegistroIxtlahuaca }}</td>
                        </tr>
                        <tr>
                            <td scope="row">San Bartolo</td>
                            <td id="conteo-sanbartolo">{{ $ConteoRegistroSanBartolo }}</td>
                        </tr>
                        <tr>
                            <td scope="row"><strong>Total General</strong></td>
                            <td id="conteo-total">{{ $ConteoRegistros }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>


    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            // Establecer el foco en el input al cargar la página
            $('#datos_evento').focus();

            function enviarDatos() {
                $.ajax({
                    type: 'POST',
                    url: '{{ route("eventos.registroSimulacro") }}',
                    data: $('#registroForm').serialize(),
                    success: function(response) {
                        $('#messageDiv').removeClass().empty();
                        if (response.success) {
                            $('#messageDiv').addClass('alert alert-success custom-alert-wan').text(response.message + ': ' + response.nombre_empleado);
                        } else {
                            if (response.tipo === 'info') {
                                $('#messageDiv').addClass('alert alert-info custom-alert-wan').text(response.message);
                            } else if (response.tipo === 'warning') {
                                $('#messageDiv').addClass('alert alert-warning custom-alert-wan').text(response.message);
                            } else {
                                $('#messageDiv').addClass('alert alert-danger custom-alert-wan').text(response.message);
                            }
                        }
                        $('#messageDiv').fadeIn();
                    },
                    error: function(xhr, status, error) {
                        $('#messageDiv').removeClass().empty();
                        $('#messageDiv').addClass('alert alert-danger custom-alert-wan').text('Error al procesar la solicitud. Inténtalo de nuevo más tarde.');
                        $('#messageDiv').fadeIn();
                    },
                    complete: function() {
                        $('#datos_evento').val(''); // Limpiar el valor del input
                        $('#datos_evento').focus(); // Enfocar el input de nuevo
                    }
                });
            }

            $('#datos_evento').keydown(function(event) {
                if (event.keyCode === 13) {
                    event.preventDefault(); // Evitar el comportamiento por defecto de la tecla Enter
                    enviarDatos(); // Llamar a la función para enviar datos
                }
            });

            $('#registrarBtn').click(function() {
                enviarDatos(); // Llamar a la función para enviar datos
            });
        });
    </script>

    <script>
        function actualizarConteos() {
            $.ajax({
                url: '{{ route("eventos.obtenerConteosAjax") }}',
                type: 'GET',
                dataType: 'json',
                success: function(data) {
                    $('#conteo-ixtlahuaca').text(data.ConteoRegistroIxtlahuaca);
                    $('#conteo-sanbartolo').text(data.ConteoRegistroSanBartolo);
                    $('#conteo-total').text(data.ConteoRegistros);
                },
                error: function(xhr, status, error) {
                    console.error("Error al actualizar conteos:", error);
                }
            });
        }

        // Actualizar los conteos cada 5 segundos (ajusta este valor según tus necesidades)
        setInterval(actualizarConteos, 5000);
    </script>
@endsection
@section('scriptBFile')

@endsection
