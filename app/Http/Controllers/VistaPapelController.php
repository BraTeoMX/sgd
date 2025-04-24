<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tbl_Empleado_SIA;
use App\RegistroPapelTemporal;
use Carbon\Carbon;

class VistaPapelController extends Controller
{
    public function VistaPapel(){
        $inicioMes = Carbon::now()->startOfMonth();
        $finMes = Carbon::now()->endOfMonth();

        $conteos = RegistroPapelTemporal::where('asistencia', '2')
            ->whereIn('Planta', ['Intimark1', 'Intimark2'])
            ->whereBetween('created_at', [$inicioMes, $finMes])
            ->groupBy('Planta')
            ->selectRaw('Planta, count(*) as total')
            ->get()
            ->keyBy('Planta');

        $ConteoRegistroIxtlahuaca = $conteos['Intimark1']->total ?? 0;
        $ConteoRegistroSanBartolo = $conteos['Intimark2']->total ?? 0;

        $ConteoRegistros = $ConteoRegistroIxtlahuaca + $ConteoRegistroSanBartolo;
        return view('eventos.VistaPapel', compact(
            'ConteoRegistroIxtlahuaca','ConteoRegistroSanBartolo',
            'ConteoRegistros'
        ));
    }

    public function RegistroVistaPapel(Request $request){
        $inicioMes = Carbon::now()->startOfMonth();
        $finMes = Carbon::now()->endOfMonth();

        $datos_evento = $request->datos_evento;

        // Verifica si el empleado existe
        $AsistenciaE = Tbl_Empleado_SIA::where(function ($query) use ($datos_evento) {
            if (strlen($datos_evento) == 10) {
                $datos_evento = substr($datos_evento, -9); // Omitir el primer dígito
            }
            $query->where('No_Empleado', str_pad($datos_evento, 7, '0', STR_PAD_LEFT))
                ->orWhere('No_TAG', $datos_evento);
        })
        ->where('Status_Emp', 'A')
        ->first();

        if (!$AsistenciaE) {
            return response()->json([
                'success' => false,
                'message' => 'Empleado no encontrado'
            ]);
        }

        // Verifica si ya existe un registro en RegistroPapelTemporal
        if (RegistroPapelTemporal::where('no_empleados', $AsistenciaE->No_Empleado)
            ->whereBetween('created_at', [$inicioMes, $finMes])
            ->exists()) {

            return response()->json([
                'success' => false,
                'message' => $AsistenciaE->Nom_Emp . ' ' . $AsistenciaE->Ap_Pat . ' ' . $AsistenciaE->Ap_Mat . ' ya está registrado',
                'tipo' => 'warning' // Cambiar el color a naranja
            ]);
        }

        // Verifica si el puesto permite el registro
        if ($AsistenciaE->puestoRelacionado && $AsistenciaE->puestoRelacionado->Papel == 'EntPH') {
            RegistroPapelTemporal::create([
                'id_evento' => 5,
                'no_empleados' => $AsistenciaE->No_Empleado,
                'No_Tag' => $AsistenciaE->No_TAG,
                'tipo_evento' => 'Entrega Papel Higiénico',
                'nombre_empleado' => $AsistenciaE->Nom_Emp . ' ' . $AsistenciaE->Ap_Pat . ' ' . $AsistenciaE->Ap_Mat,
                'Departamento' => $AsistenciaE->departamentoRelacionado->Departamento ?? 'Departamento por defecto',
                'Puesto' => $AsistenciaE->puestoRelacionado->Puesto ?? 'Puesto por defecto',
                'asistencia' => '2',
                'Planta' => $AsistenciaE->Id_Planta,
            ]);

            return response()->json([
                'success' => true,
                'message' => 'Registro correcto',
                'nombre_empleado' => $AsistenciaE->Nom_Emp . ' ' . $AsistenciaE->Ap_Pat . ' ' . $AsistenciaE->Ap_Mat,
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Puesto no permitido',
                'tipo' => 'info' // Cambiar el color a azul
            ]);
        }
    }
}
