@extends('layouts.main')

@section('styleBFile')

<!-- Color Box -->
<link href="{{ asset('colorbox/colorbox.css') }}" rel="stylesheet">

@endsection


@section('content')

    <div class="card">
        <div class="card-header">
            <h3>Saldo de Vacaciones</h3>
        </div>
        <div class="card-body">
            {!! Form::open(['route'=>'vacaciones.saldoempleado', 'method'=>'POST', 'files'=>TRUE ]) !!}

            <div class="row">
                <div class="col-lg-3 col-md-3">
                    {!! BootForm::text('no_empleado', 'No. de Empleado ' , null , ['id'=> 'no_empleado'] ); !!}

                </div>

            </div>
                <br>
                <div class="row" style="display" id ='id_enviar'>
                    <div class="col center">
                        <button type="submit" name="solicitar" id='solicitar' value="Solicitar saldo" class="btn btn-primary">Buscar empleado</button>
                        <a href="{!! route('home') !!}" class="btn btn-light">Cancelar</a>

                    </div>
                </div>

            {!! form::close() !!}
        </div>
        <div class="row">
            <div class="col-12">
                <table class="table" data-page-size="50" >
                    @isset($saldo)


                        <thead style="">
                            <tr>
                                <th data-sortable="true">No. Empleado</th>
                                <th data-sortable="true">Nombre </th>
                                <th data-sortable="true">Fecha Ingreso</th>
                                <th data-sortable="true">Saldo disponible</th>
                                <th data-sortable="true">Eventualidades</th>
                                <th data-sortable="true">Periodos</th>

                            </tr>
                        </thead>
                        <tbody>
                        @forelse ($saldo as $saldos)
                                <tr>
                                    <td>
                                        {{$saldos->No_Empleado}}
                                    </td>
                                    <td>
                                        {{$saldos->Ap_Pat.' '.$saldos->Ap_Mat.' '.$saldos->Nom_Emp}}
                                    </td>
                                    <td>
                                        {{$saldos->Fecha_In}}
                                        @php
                                            $fecha_inicial = date("Y").'-'.substr($saldos->Fecha_In,5,5) ;
                                        @endphp
                                    </td>
                                    <td>
                                        {{$saldos->Dias_Dispo}}
                                    </td>
                                    @php
                                        $eventualidad=0;
                                        $periodo=0;
                                    @endphp
                                    @foreach($vacaciones as $vac)

                                        @if($fecha_inicial <= $vac->fech_ini_vac)
                                            @php
                                                $eventualidad = $eventualidad+$vac->eventualidades;
                                                $periodo = $periodo+$vac->periodos;
                                            @endphp
                                        @endif
                                    @endforeach
                                    <td>
                                        {{$eventualidad."/3"}}
                                    </td>
                                    <td>
                                        {{$periodo."/4"}}
                                    </td>
                                </tr>

                        @empty
                            <tr>
                                <td colspan="7" style="color: red; background: black;">No existe Empleado, favor de Verificar</td>
                            </tr>

                        @endforelse

                    </tbody>
                    <tfoot>
                    <tr>
                        <td colspan="7">
                        <div>
                            <ul class="pagination"></ul>
                        </div>
                        </td>
                    </tr>
                    </tfoot>
                    @endisset
                    </table>

            </div>
        </div>

    </div>

@endsection

@section('scriptBFile')



    <script>

        document.getElementById("no_empleado").focus();


    </script>

@endsection
