<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\CategoriaEvento;
use App\RegistrarAsistenciaActualzacion;
use App\Tbl_Empleado_SIA;

use App\Puestos;
use App\Departamentos;
use Carbon\Carbon;

class EventoActualizacionController extends Controller
{

    public function inicioEvento()
    {
        // Obtiene todos los eventos registrados
        $eventos = CategoriaEvento::orderBy('created_at', 'desc')->get();

        // Devuelve la vista 'eventos.create' con datos
        //  dd($puestos);
        return view('eventosActualizacion.inicioEvento', compact('eventos'));
    }

    // Método para registrar nuevos eventos
    public function registrarEventos(Request $request)
    {
        // Validar los datos del formulario
        $request->validate([
            'nombre_evento' => 'required|string|max:255',
            // otros campos de validación
        ]);

        // Verificar si el evento ya existe (ignora mayúsculas y minúsculas)
        $nombreEvento = strtoupper($request->input('nombre_evento'));
        $eventoExistente = CategoriaEvento::where('nombre', $nombreEvento)->first();

        if ($eventoExistente) {
            // Si el evento ya existe, redirigir con un mensaje de advertencia
            return redirect()->route('eventosActualizacion.inicioEvento')
                ->with('warning', 'El evento con este nombre ya ha sido creado anteriormente.');
        }

        try {
            // Crear un nuevo evento
            $evento = new CategoriaEvento;
            $evento->nombre = $nombreEvento;
            $evento->tipo = $request->input('pre_registro');

            // Asignar otros campos si es necesario
            $evento->save();

            // Añadir un mensaje de éxito a la sesión
            return redirect()->route('eventosActualizacion.inicioEvento')
                ->with('success', 'Evento creado con éxito');
        } catch (\Exception $e) {
            // En caso de error, devolver un mensaje de error
            return redirect()->route('eventosActualizacion.inicioEvento')
                ->with('error', 'Hubo un problema al crear el evento. Intente nuevamente.');
        }
    }


     // Método para eliminar eventos
     public function destroy(CategoriaEvento $evento)
     {
         // Realiza la lógica de eliminación aquí (en este caso, elimina un evento)
         $evento->delete();
         return back();
     }

    public function registroAsistencia()
    {
        $eventos = CategoriaEvento::where('tipo', '0')->get();

        return view('eventosActualizacion.registroAsistencia', compact('eventos'));
    }

    public function formRegistroEvento(Request $request) {
        $evento_id = $request->nombre_evento;
        $empleado_tag = $request->empleado_tag;

        //$inicioMes = Carbon::now()->startOfMonth();
        //$finMes = Carbon::now()->endOfMonth();

        $empleadoExistente = Tbl_Empleado_SIA::where(function ($query) use ($empleado_tag) {
                if (strlen($empleado_tag) == 10) {
                    $empleado_tag = substr($empleado_tag, -9); // Omitir el primer dígito
                }
                $query->where('No_Empleado', str_pad($empleado_tag, 7, '0', STR_PAD_LEFT))
                    ->orWhere('No_TAG', $empleado_tag);
            })
            ->where('Status_Emp', 'A')
            ->first();

        if (!$empleadoExistente) {
            return response()->json(['status' => 'error', 'message' => 'El empleado no existe o no está activo.']);
        }

        $registroExistente = RegistrarAsistenciaActualzacion::where('no_empleado', $empleadoExistente->No_Empleado)
            ->where('evento_id', $evento_id)
            //->whereBetween('created_at', [$inicioMes, $finMes])
            ->exists();

        if($empleadoExistente && !$registroExistente){
            $buscarDepartamento = Departamentos::select('id_Departamento', 'Departamento')
                ->where('id_Departamento', $empleadoExistente->Departamento)
                ->get()
                ->first();
            $buscarPuesto = Puestos::where('id_puesto', $empleadoExistente->Puesto)
                ->select('Puesto')
                ->get()
                ->first();

            $Registro = new RegistrarAsistenciaActualzacion();
            $Registro->evento_id = $evento_id;
            $Registro->no_empleado = $empleadoExistente->No_Empleado;
            $Registro->No_Tag = $empleadoExistente->No_TAG;
            $Registro->nombre_empleado = $empleadoExistente->Nom_Emp . ' ' . $empleadoExistente->Ap_Pat . ' ' . $empleadoExistente->Ap_Mat;
            $Registro->puesto = $buscarPuesto->Puesto;
            $Registro->departamento = $buscarDepartamento->Departamento;
            $Registro->planta = $empleadoExistente->Id_Planta;
            $Registro->save();
            return response()->json(['status' => 'success', 'message' => 'Asistencia registrada correctamente para ' . $empleadoExistente->Nom_Emp . ' ' . $empleadoExistente->Ap_Pat . ' ' . $empleadoExistente->Ap_Mat . '.']);
        } else {
            return response()->json(['status' => 'info', 'message' => 'Asistencia duplicada para ' . $empleadoExistente->Nom_Emp . ' ' . $empleadoExistente->Ap_Pat . ' ' . $empleadoExistente->Ap_Mat . '.']);
        }

        return response()->json(['status' => 'warning', 'message' => 'Data.']);
    }

    public function formRegistroBecario(Request $request) {
        $evento_id = $request->input('nombre_evento');
        $becario_nombre = strtoupper($request->input('nombre_becario'));
        $becario_planta = $request->input('planta_becario');

        // Validar que se ha seleccionado un evento
        if (!$evento_id) {
            return response()->json(['status' => 'warning', 'message' => 'Por favor, selecciona un evento antes de registrar la asistencia.']);
        }

        $Registro = new RegistrarAsistenciaActualzacion();
        $Registro->evento_id = $evento_id;
        $Registro->no_empleado = '0000000';
        $Registro->No_Tag = '0000000';
        $Registro->nombre_empleado = $becario_nombre;
        $Registro->puesto = 'Becario';
        $Registro->departamento = 'Becario';
        $Registro->planta = $becario_planta;
        $Registro->save();

        return response()->json(['status' => 'success', 'message' => 'Asistencia registrada correctamente para el becario ' . $becario_nombre . '.']);
    }

    public function obtenerRegistrosPorEvento(Request $request)
    {
        $evento_id = $request->input('evento_id');

        $conteoIxtlahuaca = RegistrarAsistenciaActualzacion::where('evento_id', $evento_id)
                            ->where('planta', 'Intimark1')
                            ->count();

        $conteoSanBartolo = RegistrarAsistenciaActualzacion::where('evento_id', $evento_id)
                            ->where('planta', 'Intimark2')
                            ->count();

        $totalGeneral = $conteoIxtlahuaca + $conteoSanBartolo;

        return response()->json([
            'conteoIxtlahuaca' => $conteoIxtlahuaca,
            'conteoSanBartolo' => $conteoSanBartolo,
            'totalGeneral' => $totalGeneral,
        ]);
    }


    //******************************************************************************************** */
    //En este apartado es muy similar, pero desde la vista de eventos con Pre Registro y Registro
    //******************************************************************************************** */

    public function registroAsistenciaConRegistro()
    {
        $eventos = CategoriaEvento::where('tipo', '1')->get();

        return view('eventosActualizacion.registroAsistenciaConRegistro', compact('eventos'));
    }

    public function formRegistroEventoConRegistro(Request $request) {
        $evento_id = $request->nombre_evento;
        $empleado_tag = $request->empleado_tag;

        //$inicioMes = Carbon::now()->startOfMonth();
        //$finMes = Carbon::now()->endOfMonth();

        $empleadoExistente = Tbl_Empleado_SIA::where(function ($query) use ($empleado_tag) {
                if (strlen($empleado_tag) == 10) {
                    $empleado_tag = substr($empleado_tag, -9); // Omitir el primer dígito
                }
                $query->where('No_Empleado', str_pad($empleado_tag, 7, '0', STR_PAD_LEFT))
                    ->orWhere('No_TAG', $empleado_tag);
            })
            ->where('Status_Emp', 'A')
            ->first();

        if (!$empleadoExistente) {
            return response()->json(['status' => 'error', 'message' => 'El empleado no existe o no está activo.']);
        }

        $registroExistente = RegistrarAsistenciaActualzacion::where('no_empleado', $empleadoExistente->No_Empleado)
            ->where('evento_id', $evento_id)
            //->whereBetween('created_at', [$inicioMes, $finMes])
            ->exists();

        if($empleadoExistente && !$registroExistente){
            $buscarDepartamento = Departamentos::select('id_Departamento', 'Departamento')
                ->where('id_Departamento', $empleadoExistente->Departamento)
                ->get()
                ->first();
            $buscarPuesto = Puestos::where('id_puesto', $empleadoExistente->Puesto)
                ->select('Puesto')
                ->get()
                ->first();

            $Registro = new RegistrarAsistenciaActualzacion();
            $Registro->evento_id = $evento_id;
            $Registro->no_empleado = $empleadoExistente->No_Empleado;
            $Registro->No_Tag = $empleadoExistente->No_TAG;
            $Registro->nombre_empleado = $empleadoExistente->Nom_Emp . ' ' . $empleadoExistente->Ap_Pat . ' ' . $empleadoExistente->Ap_Mat;
            $Registro->puesto = $buscarPuesto->Puesto;
            $Registro->departamento = $buscarDepartamento->Departamento;
            $Registro->planta = $empleadoExistente->Id_Planta;
            $Registro->asistencia = "presente";
            $Registro->save();
            return response()->json(['status' => 'success', 'message' => 'Asistencia registrada correctamente para ' . $empleadoExistente->Nom_Emp . ' ' . $empleadoExistente->Ap_Pat . ' ' . $empleadoExistente->Ap_Mat . '.']);
        } else {
            return response()->json(['status' => 'info', 'message' => 'Asistencia duplicada para ' . $empleadoExistente->Nom_Emp . ' ' . $empleadoExistente->Ap_Pat . ' ' . $empleadoExistente->Ap_Mat . '.']);
        }

        return response()->json(['status' => 'warning', 'message' => 'Data.']);
    }

    public function formRegistroBecarioConRegistro(Request $request) {
        $evento_id = $request->input('nombre_evento');
        $becario_nombre = strtoupper($request->input('nombre_becario'));
        $becario_planta = $request->input('planta_becario');

        // Validar que se ha seleccionado un evento
        if (!$evento_id) {
            return response()->json(['status' => 'warning', 'message' => 'Por favor, selecciona un evento antes de registrar la asistencia.']);
        }

        $Registro = new RegistrarAsistenciaActualzacion();
        $Registro->evento_id = $evento_id;
        $Registro->no_empleado = '0000000';
        $Registro->No_Tag = '0000000';
        $Registro->nombre_empleado = $becario_nombre;
        $Registro->puesto = 'Becario';
        $Registro->departamento = 'Becario';
        $Registro->planta = $becario_planta;
        $Registro->asistencia = "presente";
        $Registro->save();

        return response()->json(['status' => 'success', 'message' => 'Asistencia registrada correctamente para el becario ' . $becario_nombre . '.']);
    }

    public function obtenerRegistrosPorEventoConRegistro(Request $request)
    {
        $evento_id = $request->input('evento_id');

        $conteoIxtlahuaca = RegistrarAsistenciaActualzacion::where('evento_id', $evento_id)
                            ->where('planta', 'Intimark1')
                            ->count();

        $conteoSanBartolo = RegistrarAsistenciaActualzacion::where('evento_id', $evento_id)
                            ->where('planta', 'Intimark2')
                            ->count();

        $totalGeneral = $conteoIxtlahuaca + $conteoSanBartolo;

        return response()->json([
            'conteoIxtlahuaca' => $conteoIxtlahuaca,
            'conteoSanBartolo' => $conteoSanBartolo,
            'totalGeneral' => $totalGeneral,
        ]);
    }

    public function asistenciaConRegistroConfirmacion()
    {
        $eventos = CategoriaEvento::where('tipo', '1')->get();

        return view('eventosActualizacion.asistenciaConRegistroConfirmacion', compact('eventos', ));
    }

    public function obtenerBecariosPorEvento(Request $request)
    {
        $evento_id = $request->input('evento_id');
        $nombresBecarios = RegistrarAsistenciaActualzacion::where('departamento', "Becario")
            ->where('evento_id', $evento_id)
            ->get(['nombre_empleado']);
        return response()->json($nombresBecarios);
    }

    public function formActualizacionEventoConRegistro(Request $request) {
        $evento_id = $request->nombre_evento;
        $empleado_tag = $request->empleado_tag;


        $registroExistente = RegistrarAsistenciaActualzacion::where(function ($query) use ($empleado_tag) {
                if (strlen($empleado_tag) == 10) {
                    $empleado_tag = substr($empleado_tag, -9); // Omitir el primer dígito
                }
                $query->where('no_empleado', str_pad($empleado_tag, 7, '0', STR_PAD_LEFT))
                    ->orWhere('no_tag', $empleado_tag);
            })
            ->where('evento_id', $evento_id)
            ->first();

        //dd($registroExistente);
        if ($registroExistente) {
            if ($registroExistente->asistencia == 'presente') {
                $registroExistente->asistencia = 'confirmado';
                $registroExistente->save();
                return response()->json(['status' => 'success', 'message' => 'Asistencia confirmada correctamente para ' . $registroExistente->nombre_empleado]);
            } elseif ($registroExistente->asistencia == 'confirmado') {
                return response()->json(['status' => 'warning', 'message' => 'El empleado ' . $registroExistente->nombre_empleado . ' ya confirmo su asistencia']);
            }
        } else {
            return response()->json(['status' => 'error', 'message' => 'Empleado no encontrado ']);
        }

        return response()->json(['status' => 'error', 'message' => 'Ocurrió un error al actualizar la asistencia.']);
    }

    public function formRegistroBecarioConfirmacion(Request $request) {
        $evento_id = $request->input('nombre_evento');
        $becario_nombre = $request->input('becario_nombre');

        $registroExistente = RegistrarAsistenciaActualzacion::where('nombre_empleado', $becario_nombre)
            ->where('evento_id', $evento_id)
            ->where('departamento', 'Becario')
            ->first();

        //dd($registroExistente);
        if ($registroExistente) {
            if ($registroExistente->asistencia == 'presente') {
                $registroExistente->asistencia = 'confirmado';
                $registroExistente->save();
                return response()->json(['status' => 'success', 'message' => 'Asistencia Becario confirmada correctamente para ' . $registroExistente->nombre_empleado]);
            } elseif ($registroExistente->asistencia == 'confirmado') {
                return response()->json(['status' => 'warning', 'message' => 'El Becario ' . $registroExistente->nombre_empleado . ' ya confirmo su asistencia']);
            }
        } else {
            return response()->json(['status' => 'error', 'message' => 'Becario no encontrado ' . $registroExistente]);
        }

        return response()->json(['status' => 'error', 'message' => 'Ocurrió un error al actualizar la asistencia.' . $registroExistente]);
    }


    public function obtenerRegistrosPorEventoConRegistroConfirmacion(Request $request)
    {
        $evento_id = $request->input('evento_id');

        $conteoIxtlahuaca = RegistrarAsistenciaActualzacion::where('evento_id', $evento_id)
                            ->where('planta', 'Intimark1')
                            ->count();

        $conteoSanBartolo = RegistrarAsistenciaActualzacion::where('evento_id', $evento_id)
                            ->where('planta', 'Intimark2')
                            ->count();
        //
        $conteoConfirmadoIxtlahuaca = RegistrarAsistenciaActualzacion::where('evento_id', $evento_id)
                            ->where('planta', 'Intimark1')
                            ->where('asistencia', 'confirmado')
                            ->count();

        $conteoConfirmadoSanBartolo = RegistrarAsistenciaActualzacion::where('evento_id', $evento_id)
                            ->where('planta', 'Intimark2')
                            ->where('asistencia', 'confirmado')
                            ->count();

        $totalGeneral = $conteoIxtlahuaca + $conteoSanBartolo;
        $totalGeneralConfirmado = $conteoConfirmadoIxtlahuaca + $conteoConfirmadoSanBartolo;

        return response()->json([
            'conteoIxtlahuaca' => $conteoIxtlahuaca,
            'conteoSanBartolo' => $conteoSanBartolo,
            'totalGeneral' => $totalGeneral,
            'conteoConfirmadoIxtlahuaca' => $conteoConfirmadoIxtlahuaca,
            'conteoConfirmadoSanBartolo' => $conteoConfirmadoSanBartolo,
            'totalGeneralConfirmado' => $totalGeneralConfirmado,
        ]);
    }

    public function reporteEvento(Request $request)
    {
        $eventos = CategoriaEvento::all(); // Lista de eventos

        $eventoId = $request->input('evento_id');
        $plantaFilter = $request->input('planta_filter'); // Captura el valor del filtro de planta
        $mostrarAsistencia = false;
        $registros = collect(); // Inicializa vacío
        $totalRegistros = 0;
        $confirmados = 0;

        if ($eventoId) {
            $evento = CategoriaEvento::find($eventoId);
            $mostrarAsistencia = $evento && $evento->tipo === 1;

            $registros = RegistrarAsistenciaActualzacion::where('evento_id', $eventoId)
                ->when($mostrarAsistencia, function ($query) {
                    $query->whereNotNull('asistencia'); // Solo si se requiere asistencia
                })
                ->when($plantaFilter && $plantaFilter !== '', function ($query) use ($plantaFilter) {
                    $query->where('planta', $plantaFilter); // Aplica el filtro de planta solo si no es "Ambos"
                })
                ->get();

            // Transformar los datos de la columna 'planta'
            $registros = $registros->map(function ($registro) {
                if ($registro->planta === 'Intimark1') {
                    $registro->planta = 'Ixtlahuaca';
                } elseif ($registro->planta === 'Intimark2') {
                    $registro->planta = 'San Bartolo';
                }
                return $registro;
            });

            // Cálculos
            $totalRegistros = $registros->count();
            if ($mostrarAsistencia) {
                $confirmados = $registros->where('asistencia', 'confirmado')->count();
            }
        }

        return view('eventosActualizacion.reporteEvento', compact(
            'eventos', 'eventoId', 'plantaFilter', 'registros', 'mostrarAsistencia', 'totalRegistros', 'confirmados'
        ));
    }



}
