<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tbl_Empleado_SIA;
use App\RegistroSimulacro;
use Carbon\Carbon;
use Dompdf\Dompdf;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Redis;

class SimulacroController extends Controller
{
    public function simulacro()
    {
        // Este método permanece igual para la carga inicial de la página
        $conteos = $this->obtenerConteos();
        return view('eventos.simulacro', $conteos);
    }

    public function registroSimulacro(Request $request){
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

        //Lienciado javier
        if($datos_evento == '5742')
        {
            // Verifica si ya existe un registro en RegistroSimulacro
            if (RegistroSimulacro::where('no_empleados', '0005742')
                ->whereBetween('created_at', [$inicioMes, $finMes])
                ->exists()) {

                return response()->json([
                    'success' => false,
                    'message' => 'JAVIER GONZALEZ QUINTANILLA ya está registrado',
                    'tipo' => 'warning' // Cambiar el color a naranja
                ]);
            }

            RegistroSimulacro::create([
                'id_evento' => 5,
                'no_empleados' => '0005742',
                'No_Tag' => '180839466',
                'nombre_empleado' => 'JAVIER GONZALEZ QUINTANILLA',
                'Departamento' =>  'Departamento por defecto',
                'Puesto' => 'Puesto por defecto',
                'Planta' => 'Intimark1',
            ]);
            return response()->json([
                'success' => true,
                'message' => 'Registro correcto',
                'nombre_empleado' => 'JAVIER GONZALEZ QUINTANILLA',
            ]);
        }

        //señor marcos
        if($datos_evento == '19496' || $datos_evento == '068041063')
        {
            // Verifica si ya existe un registro en RegistroSimulacro
            if (RegistroSimulacro::where('no_empleados', '0019496')
                ->whereBetween('created_at', [$inicioMes, $finMes])
                ->exists()) {

                return response()->json([
                    'success' => false,
                    'message' => 'MARCOS ADISSI MICHA ya está registrado',
                    'tipo' => 'warning' // Cambiar el color a naranja
                ]);
            }

            RegistroSimulacro::create([
                'id_evento' => 5,
                'no_empleados' => '0019496',
                'No_Tag' => '068041063',
                'nombre_empleado' => 'MARCOS ADISSI MICHA',
                'Departamento' =>  'DIRECCION',
                'Puesto' => 'GERENTE GENERAL',
                'Planta' => 'Intimark1',
            ]);
            return response()->json([
                'success' => true,
                'message' => 'Registro correcto',
                'nombre_empleado' => 'MARCOS ADISSI MICHA',
            ]);
        }

        //señor Eduardo <dueño>
        if($datos_evento == '700001' || $datos_evento == '409982989')
        {
            // Verifica si ya existe un registro en RegistroSimulacro
            if (RegistroSimulacro::where('no_empleados', '0700001')
                ->whereBetween('created_at', [$inicioMes, $finMes])
                ->exists()) {

                return response()->json([
                    'success' => false,
                    'message' => 'EDUARDO ADISSI COHEN ya está registrado',
                    'tipo' => 'warning' // Cambiar el color a naranja
                ]);
            }

            RegistroSimulacro::create([
                'id_evento' => 5,
                'no_empleados' => '0700001',
                'No_Tag' => '409982989',
                'nombre_empleado' => 'EDUARDO ADISSI COHEN',
                'Departamento' =>  'DIRECCION',
                'Puesto' => 'GERENTE GENERAL',
                'Planta' => 'Intimark1',
            ]);
            return response()->json([
                'success' => true,
                'message' => 'Registro correcto',
                'nombre_empleado' => 'EDUARDO ADISSI COHEN',
            ]);
        }


        // señor nicolas
        if($datos_evento == '18405' || $datos_evento == '425714461')
        {
            // Verifica si ya existe un registro en RegistroSimulacro
            if (RegistroSimulacro::where('no_empleados', '0018405')
                ->whereBetween('created_at', [$inicioMes, $finMes])
                ->exists()) {

                return response()->json([
                    'success' => false,
                    'message' => 'NICOLAS ALBERTO ARANGO ya está registrado',
                    'tipo' => 'warning' // Cambiar el color a naranja
                ]);
            }

            RegistroSimulacro::create([
                'id_evento' => 5,
                'no_empleados' => '0018405',
                'No_Tag' => '425714461',
                'nombre_empleado' => 'NICOLAS ALBERTO ARANGO',
                'Departamento' =>  'DIRECCION',
                'Puesto' => 'GERENTE GENERAL',
                'Planta' => 'Intimark1',
            ]);
            return response()->json([
                'success' => true,
                'message' => 'Registro correcto',
                'nombre_empleado' => 'NICOLAS ALBERTO ARANGO',
            ]);
        }


        if (!$AsistenciaE) {
            return response()->json([
                'success' => false,
                'message' => 'Empleado no encontrado'
            ]);
        }

        // Verifica si ya existe un registro en RegistroSimulacro
        if (RegistroSimulacro::where('no_empleados', $AsistenciaE->No_Empleado)
            ->whereBetween('created_at', [$inicioMes, $finMes])
            ->exists()) {

            return response()->json([
                'success' => false,
                'message' => $AsistenciaE->Nom_Emp . ' ' . $AsistenciaE->Ap_Pat . ' ' . $AsistenciaE->Ap_Mat . ' ya está registrado',
                'tipo' => 'warning' // Cambiar el color a naranja
            ]);
        }

        RegistroSimulacro::create([
            'id_evento' => 5,
            'no_empleados' => $AsistenciaE->No_Empleado,
            'No_Tag' => $AsistenciaE->No_TAG,
            'nombre_empleado' => $AsistenciaE->Nom_Emp . ' ' . $AsistenciaE->Ap_Pat . ' ' . $AsistenciaE->Ap_Mat,
            'Departamento' => $AsistenciaE->departamentoRelacionado->Departamento ?? 'Departamento por defecto',
            'Puesto' => $AsistenciaE->puestoRelacionado->Puesto ?? 'Puesto por defecto',
            'Planta' => $AsistenciaE->Id_Planta,
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Registro correcto',
            'nombre_empleado' => $AsistenciaE->Nom_Emp . ' ' . $AsistenciaE->Ap_Pat . ' ' . $AsistenciaE->Ap_Mat,
        ]);
    }

    public function obtenerConteosAjax()
    {
        // Este nuevo método devolverá solo los datos de los conteos en formato JSON
        return response()->json($this->obtenerConteos());
    }

    private function obtenerConteos()
    {
        $cacheKey = 'conteos_simulacro_mes_actual';
        $lockKey = 'lock_' . $cacheKey;

        // Si ya está cacheado, lo usamos
        if (Cache::has($cacheKey)) {
            Log::info('[CACHE HIT] Conteo leído desde cache.');
            return Cache::get($cacheKey);
        }

        // Verificamos si hay otro proceso construyendo el cache
        if (Cache::has($lockKey)) {
            Log::info('[CACHE BUSY] Otro proceso está construyendo el cache. Esperando...');

            // Esperamos un poco y luego usamos lo que haya
            usleep(500000); // 500 ms
            return Cache::get($cacheKey) ?? [
                'ConteoRegistroIxtlahuaca' => 0,
                'ConteoRegistroSanBartolo' => 0,
                'ConteoRegistros' => 0,
            ];
        }

        // Marcamos que estamos construyendo el cache
        Cache::put($lockKey, true, 3); // lock temporal de 3 segundos

        Log::info('[CACHE MISS] Generando nuevo conteo desde DB.');

        $inicioMes = Carbon::now()->startOfMonth();
        $finMes = Carbon::now()->endOfMonth();

        $conteos = RegistroSimulacro::whereIn('Planta', ['Intimark1', 'Intimark2'])
            ->whereBetween('created_at', [$inicioMes, $finMes])
            ->groupBy('Planta')
            ->selectRaw('Planta, count(*) as total')
            ->get()
            ->keyBy('Planta');

        $ConteoRegistroIxtlahuaca = $conteos['Intimark1']->total ?? 0;
        $ConteoRegistroSanBartolo = $conteos['Intimark2']->total ?? 0;
        $ConteoRegistros = $ConteoRegistroIxtlahuaca + $ConteoRegistroSanBartolo;

        $data = compact('ConteoRegistroIxtlahuaca', 'ConteoRegistroSanBartolo', 'ConteoRegistros');

        Cache::put($cacheKey, $data, 6); // guardamos por 6 segundos
        Cache::forget($lockKey); // liberamos "pseudo-lock"

        return $data;
    }

}
