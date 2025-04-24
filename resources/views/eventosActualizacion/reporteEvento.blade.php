@extends('layouts.main')

@section('styleBFile')
    <!-- DataTables CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.4.1/css/buttons.bootstrap4.min.css">
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h1>Reporte</h1>
            </div>
            <div class="card-body">
                <form action="{{ route('eventosActualizacion.reporteEvento') }}" method="GET" id="filterForm">
                    <div class="row">
                        <!-- Select para eventos -->
                        <div class="form-group col-md-6">
                            <label for="evento_id">Selecciona un evento</label>
                            <select id="evento_id" name="evento_id" class="form-control" required>
                                <option value="">Seleccione un evento</option>
                                @foreach($eventos as $evento)
                                    <option value="{{ $evento->id }}" {{ $evento->id == $eventoId ? 'selected' : '' }}>
                                        {{ $evento->nombre }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <!-- Select para planta -->
                        <div class="form-group col-md-6">
                            <label for="planta_filter">Selecciona una planta</label>
                            <select id="planta_filter" name="planta_filter" class="form-control">
                                <option value="">Ambos</option>
                                <option value="Intimark1" {{ request('planta_filter') == 'Intimark1' ? 'selected' : '' }}>Planta 1</option>
                                <option value="Intimark2" {{ request('planta_filter') == 'Intimark2' ? 'selected' : '' }}>Planta 2</option>
                            </select>
                        </div>
                    </div>
                    <!-- Botón de generar reporte -->
                    <button type="submit" class="btn btn-primary mt-3">Generar Reporte</button>
                </form>
            </div>
        </div>
    </div>

    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table id="tabla-reporte" class="table table-bordered">
                        <thead>
                            <tr>
                                <th>No. Empleado</th>
                                <th>Nombre</th>
                                <th>Puesto</th>
                                <th>Departamento</th>
                                <th>Planta</th>
                                @if($mostrarAsistencia)
                                    <th>Asistencia</th>
                                @endif
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($registros as $dato)
                                <tr>
                                    <td>{{ $dato->no_empleado }}</td>
                                    <td>{{ $dato->nombre_empleado }}</td>
                                    <td>{{ $dato->puesto }}</td>
                                    <td>{{ $dato->departamento }}</td>
                                    <td>{{ $dato->planta }}</td>
                                    @if($mostrarAsistencia)
                                        <td>{{ $dato->asistencia }}</td>
                                    @endif
                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th colspan="{{ $mostrarAsistencia ? 5 : 4 }}">Total Registros</th>
                                <th>
                                    {{ $totalRegistros }}
                                </th>
                            </tr>
                            @if($mostrarAsistencia)
                            <tr>
                                <th colspan="5">Confirmados</th>
                                <th>{{ $confirmados }}</th>
                            </tr>
                            @endif
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<style>
    /* Botón Excel */
    .btn-excel {
        background-color: #28a745; /* Color verde */
        color: white; /* Texto blanco */
        border: none; /* Sin bordes */
        padding: 10px 15px; /* Espaciado interno */
        border-radius: 5px; /* Bordes redondeados */
        font-weight: bold; /* Texto en negritas */
    }

    .btn-excel:hover {
        background-color: #218838; /* Verde más oscuro al pasar el ratón */
    }

    /* Botón PDF */
    .btn-pdf {
        background-color: #dc3545; /* Color rojo oscuro */
        color: white; /* Texto blanco */
        border: none; /* Sin bordes */
        padding: 10px 15px; /* Espaciado interno */
        border-radius: 5px; /* Bordes redondeados */
        font-weight: bold; /* Texto en negritas */
    }

    .btn-pdf:hover {
        background-color: #c82333; /* Rojo más oscuro al pasar el ratón */
    }
    </style>

@endsection

@section('scriptBFile')
<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>

<!-- DataTables JS -->
<script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap4.min.js"></script>
<!-- DataTables Buttons JS -->
<script src="https://cdn.datatables.net/buttons/2.4.1/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.bootstrap4.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.print.min.js"></script>
<!-- Traducción al español -->
<script src="https://cdn.datatables.net/plug-ins/1.13.7/i18n/es-ES.json"></script>

<script>
    $(document).ready(function() {
        $('#tabla-reporte').DataTable({
            dom: 'Bfrtip',
            pageLength: 20, // Número de registros por página
            buttons: [
                {
                    extend: 'excelHtml5',
                    text: 'Exportar a Excel',
                    className: 'btn-excel',
                    title: function() {
                        const eventoNombre = $('#evento_id option:selected').text();
                        return eventoNombre || 'Reporte de Eventos';
                    },
                    //footer: true, // Habilitar exportación del footer
                    customize: function(xlsx) {
                        const sheet = xlsx.xl.worksheets['sheet1.xml'];

                        // Obtener datos del footer
                        const totalRegistros = "{{ $totalRegistros }}";
                        const confirmados = "{{ $confirmados }}";
                        const mostrarAsistencia = "{{ $mostrarAsistencia ? 'true' : 'false' }}";

                        // Crear nodo para la fila del footer
                        let rows = $(sheet).find('row:last'); // Encuentra la última fila

                        // Agregar "Total Registros"
                        const totalRow = `
                            <row>
                                <c t="inlineStr">
                                    <is><t>Total Registros</t></is>
                                </c>
                                <c t="inlineStr">
                                    <is><t>${totalRegistros}</t></is>
                                </c>
                            </row>`;
                        rows.after(totalRow);

                        // Si mostrar asistencia está activo, agrega "Confirmados"
                        if (mostrarAsistencia === 'true') {
                            const confirmadosRow = `
                                <row>
                                    <c t="inlineStr">
                                        <is><t>Confirmados</t></is>
                                    </c>
                                    <c t="inlineStr">
                                        <is><t>${confirmados}</t></is>
                                    </c>
                                </row>`;
                            rows.after(confirmadosRow);
                        }
                    }
                },
                {
                    extend: 'pdfHtml5',
                    text: 'Exportar a PDF',
                    orientation: 'landscape',
                    className: 'btn-pdf', // Clase CSS personalizada
                    pageSize: 'A4',
                    footer: true, // Habilitar exportación del footer
                    customize: function(doc) {
                        const eventoNombre = $('#evento_id option:selected').text() || 'Reporte de Eventos';
                        doc.content.splice(0, 0, {
                            text: eventoNombre,
                            style: 'header',
                            alignment: 'center',
                            fontSize: 14,
                            bold: true
                        });

                        // Agregar datos del footer manualmente
                        const footerRows = [];
                        $('#tabla-reporte tfoot th').each(function() {
                            footerRows.push($(this).text());
                        });
                        doc.content.push({
                            table: {
                                widths: Array(footerRows.length).fill('*'), // Ajustar columnas al ancho dinámicamente
                                body: [footerRows]
                            },
                            margin: [0, 20, 0, 0] // Espaciado superior
                        });
                    }
                }
            ],
            language: {
                url: 'https://cdn.datatables.net/plug-ins/1.13.7/i18n/es-ES.json'
            }
        });
    });
</script>
@endsection
