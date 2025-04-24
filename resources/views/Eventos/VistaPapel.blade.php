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
            <form id="registroForm" method="POST" action="{{ route('eventos.RegistroVistaPapel') }}">
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

        <div class="col-6">
            <table class="table table-hover table-bordered custom-shadow-table custom-rounded-table">
                <thead class="table-primary">
                    <tr>
                        <th scope="col"><strong>Ubicación</strong></th>
                        <th scope="col">Conteo inicial</th>
                    </tr>
                </thead>
                <tbody>
                    @isset($ConteoRegistroIxtlahuaca)
                        <tr>
                            <td scope="row">Ixtlahuaca</td>
                            <td>{{ $ConteoRegistroIxtlahuaca }}</td>
                        </tr>
                    @endisset
                    @isset($ConteoRegistroSanBartolo)
                        <tr>
                            <td scope="row">San Bartolo</td>
                            <td>{{ $ConteoRegistroSanBartolo }}</td>
                        </tr>
                    @endisset
                    <tr>
                        <td scope="row"><strong>Total General</strong></td>
                        <td>{{ $ConteoRegistros }}</td>
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
                    url: '{{ route("eventos.RegistroVistaPapel") }}',
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
@endsection
@section('scriptBFile')

@endsection
