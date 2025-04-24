@extends('layouts.main')
@section('styleBFile')
    <!-- Color Box -->
    <link href="{{ asset('materialfront/assets/vendor/select2/dist/css/select2.min.css') }}" rel="stylesheet">
@endsection
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <!-- Table -->
                    <div id="datatableWithSearchInput" class="table-responsive">
                        <table id="tablaSupervisorI"
                            class="table table-borderless table-thead-bordered table-nowrap table-align-middle card-table">
                            <thead class="thead-light">
                                <tr>
                                    <th><span class="header-content">Planta</span></th>
                                    <th><span class="header-content">Estado de Negocio</span></th>
                                    <th><span class="header-content">Num. Trab.</span></th>
                                    <th><span class="header-content">Nombre</span></th>
                                    <th><span class="header-content">ID Horario</span></th>
                                    <th><span class="header-content">Puesto</span></th>
                                    <th><span class="header-content">Módulo</span></th>
                                    <th><span class="header-content">Justificación</span></th>
                                    <th><span class="header-content">Permiso entrada tarde</span></th>
                                </tr>
                            </thead>
                            <tbody>
                                @isset($reportes)
                                    @foreach ($reportes as $reporte)
                                        <tr>
                                            <td>
                                                @if($reporte->cvepa2 == 100)
                                                    @php
                                                        $planta ='Ixtlahuaca';
                                                    @endphp
                                                @else
                                                    @php
                                                        $planta ='San Bartolo';
                                                    @endphp
                                                @endif
                                                {{ $planta }}
                                            </td>
                                            <td>
                                                {{ $reporte->des_edo_neg }}
                                            </td>
                                            <td>
                                                {{ $reporte->cvetra }}
                                            </td>
                                            <td>
                                                {{ $reporte->nombre.' '.$reporte->paterno.' '.$reporte->materno }}
                                            </td>
                                            <td>
                                                {{ $reporte->horario }}
                                            </td>
                                            <td>
                                                {{ $reporte->cvepue }}
                                            </td>
                                            <td>
                                                {{ $reporte->modulo }}
                                            </td>
                                            <td>
                                                {{ $reporte->justificacion }}
                                            </td>
                                            <td>
                                                {{ $reporte->permiso }}
                                            </td>
                                        </tr>
                                    @endforeach
                                @endisset
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scriptBFile')
    <!-- DataTables CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap4.min.css">
    <link href="https://cdn.datatables.net/buttons/1.7.1/css/buttons.bootstrap4.min.css" rel="stylesheet">
    <!-- DataTables Buttons CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.2.2/css/buttons.bootstrap4.min.css">

    <!-- DataTables JavaScript -->
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap4.min.js"></script>

    <!-- DataTables Buttons JavaScript -->
    <script src="https://cdn.datatables.net/buttons/2.2.2/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.bootstrap4.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.print.min.js"></script>

    <script>
        $(document).ready(function () {
            $('#dtHorizontalVerticalExample').DataTable({
                "scrollX": true,
                "scrollY": 200,
            });
            $('.dataTables_length').addClass('bs-select');

            function initializeDataTable(tableId, columnIndices, dropdownIdPrefix) {
                if (!$.fn.dataTable.isDataTable(tableId)) {
                    var table = $(tableId).DataTable({
                        lengthChange: false,
                        searching: true,
                        paging: false,
                        pageLength: 5,
                        autoWidth: false,
                        responsive: true,
                        bInfo: false,
                        dom: 'Bfrtip',
                        buttons: [
                            {
                                extend: 'excel',
                                exportOptions: {
                                    columns: ':visible',
                                    format: {
                                        header: function (data, columnIdx) {
                                            // Extraer solo el texto del encabezado, excluyendo el botón de filtro
                                            return $(data).clone().children().remove().end().text().trim();
                                        }
                                    }
                                }
                            },
                            {
                                extend: 'pdf',
                                orientation: 'landscape', // Cambiar a orientación horizontal
                                pageSize: 'LEGAL', // Opcional: cambiar el tamaño de la página si es necesario
                                exportOptions: {
                                    columns: ':visible',
                                    format: {
                                        header: function (data, columnIdx) {
                                            return $(data).clone().children().remove().end().text().trim();
                                        }
                                    }
                                },
                                customize: function(doc) {
                                    // Opcional: personalizar más el documento PDF si es necesario
                                    doc.defaultStyle.fontSize = 10; // Reducir el tamaño de la fuente si es necesario
                                    doc.styles.tableHeader.fontSize = 12; // Ajustar el tamaño de la fuente del encabezado
                                }
                            }
                        ]
                    });

                    columnIndices.forEach((columnIndex, index) => {
                        var filterDropdown = $(
                            `<div class="dropdown filter-dropdown">
                                <button class="btn btn-primary dropdown-toggle filter-button" type="button" id="${dropdownIdPrefix}Button${index}" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Filtrar</button>
                                <div class="dropdown-menu" aria-labelledby="${dropdownIdPrefix}Button${index}" id="${dropdownIdPrefix}${index}"></div>
                            </div>`
                        );
                        $(tableId + ' thead th').eq(columnIndex).append(filterDropdown);
                        var uniqueValues = table.column(columnIndex).data().unique().sort();
                        var dropdownContent = `
                            <a class="dropdown-item select-all" href="#">Seleccionar todo</a>
                            <a class="dropdown-item deselect-all" href="#">Deseleccionar todo</a>
                            <div class="dropdown-divider"></div>
                        `;
                        uniqueValues.each(function (d) {
                            dropdownContent += `
                                <a class="dropdown-item custom-checkbox">
                                    <input type="checkbox" class="filter-checkbox" id="${dropdownIdPrefix}${index}-${d}" value="${d}" checked>
                                    <label for="${dropdownIdPrefix}${index}-${d}">${d}</label>
                                </a>`;
                        });

                        $('#' + dropdownIdPrefix + index).addClass('scrollable-menu').html(dropdownContent);

                        // Función para actualizar la tabla
                        function updateTable() {
                            var selectedValues = [];
                            $('#' + dropdownIdPrefix + index + ' .filter-checkbox:checked').each(function () {
                                selectedValues.push($.fn.dataTable.util.escapeRegex($(this).val()));
                            });
                            var searchTerm = selectedValues.length ? '^(' + selectedValues.join('|') + ')$' : '';
                            table.column(columnIndex).search(searchTerm, true, false).draw();
                        }

                        // Manejador para los checkboxes individuales
                        $('#' + dropdownIdPrefix + index).on('change', '.filter-checkbox', updateTable);

                        // Manejador para "Seleccionar todo"
                        $('#' + dropdownIdPrefix + index).on('click', '.select-all', function (e) {
                            e.preventDefault();
                            $('#' + dropdownIdPrefix + index + ' .filter-checkbox').prop('checked', true);
                            updateTable();
                        });

                        // Manejador para "Deseleccionar todo"
                        $('#' + dropdownIdPrefix + index).on('click', '.deselect-all', function (e) {
                            e.preventDefault();
                            $('#' + dropdownIdPrefix + index + ' .filter-checkbox').prop('checked', false);
                            updateTable();
                        });

                        // Evitar que el dropdown se cierre al hacer clic
                        $('#' + dropdownIdPrefix + index).on('click', 'a', function (e) {
                            e.stopPropagation();
                        });

                        // Aplicar el filtro inicial
                        updateTable();
                    });
                }
            }

            // Inicializar las tablas con sus columnas
            initializeDataTable('#tablaSupervisorI', [0, 1, 4, 5, 6, 7], 'filter-dropdown-SupervisorI');
        });
    </script>
@endsection
