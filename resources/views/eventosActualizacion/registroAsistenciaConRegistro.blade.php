@extends('layouts.main')

@section('content')
<div class="row">
    <div class="col-md-6">
        <div class="card">
            <div class="card-header" id="asistencia-header">
                <h1>Asistencia: <span id="evento-seleccionado"></span></h1>
            </div>
            <div class="card-body">
                @if (session('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                @endif
                <div class="container">
                    <form id="asistenciaForm">
                        @csrf
                        <div class="form-group">
                            <p>Selecciona una opción</p>
                            <select name="nombre_evento" id="nombre_evento" class="form-control" required>
                                <option value="">Selecciona una opción</option>
                                @foreach ($eventos as $evento)
                                    <option value="{{ $evento->id }}">{{ $evento->nombre }}</option>
                                @endforeach
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
                                        @csrf
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
                <div class="card-header">
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
@endsection

@section('scriptBFile')
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="sweetalert2.all.min.js"></script>

<script>
    const coloresPastel = [
        '#FFD1DC', '#FFEBCD', '#E6E6FA', '#FFDAB9', '#98FB98',
        '#F0FFF0', '#FFF0F5', '#F0FFFF', '#F5F5DC', '#FAFAD2',
        '#E0FFFF', '#FFE4E1', '#FFF5EE', '#F0F8FF', '#F8F8FF',
        '#FFFACD', '#FFEFD5', '#FFE4B5', '#FAEBD7', '#E6E6FA'
    ];

    $(document).ready(function() {
        function actualizarConteoTabla(evento_id) {
            if(evento_id) {
                $.ajax({
                    url: '{{ route("eventosActualizacion.obtenerRegistrosPorEventoConRegistro") }}',
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

        $('#nombre_evento').change(function() {
            var evento_id = $(this).val();
            var evento_nombre = $(this).find('option:selected').text();
            var colorIndex = evento_id % coloresPastel.length;

            $('#evento-seleccionado').text(evento_nombre);
            $('#asistencia-header').css('background-color', coloresPastel[colorIndex]);

            actualizarConteoTabla(evento_id);
        });

        $('#asistenciaForm').on('submit', function(event) {
            event.preventDefault();

            var formData = $(this).serialize();

            $.ajax({
                url: '{{ route("eventosActualizacion.formRegistroEventoConRegistro") }}',
                type: 'POST',
                data: formData,
                success: function(response) {
                    if(response.status === 'success') {
                        Swal.fire({
                            icon: 'success',
                            title: 'Éxito',
                            text: response.message,
                            timer: 2000, // Se cerrará automáticamente en 2 segundos
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

                    $('#empleado_tag').val('');
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

        $('#registrarbecarioBtn').on('click', function() {
            $('#becarioModal').modal('show');
        });

        $('#becarioForm').on('submit', function(event) {
            event.preventDefault();

            var formData = $(this).serialize();
            formData += '&nombre_evento=' + $('#nombre_evento').val();

            $.ajax({
                url: '{{ route("eventosActualizacion.formRegistroBecarioConRegistro") }}',
                type: 'POST',
                data: formData,
                success: function(response) {
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


@endsection