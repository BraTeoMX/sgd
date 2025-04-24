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

    public function registroSimulacro(Request $request)
    {
        Log::info('Iniciando proceso de registro de simulacro');

        $inicioMes = Carbon::now()->startOfMonth();
        $finMes = Carbon::now()->endOfMonth();
        $datos_evento = $request->datos_evento;

        // Cache para empleados especiales
        $specialEmployees = Cache::remember('special_employees', 3600, function () {
            Log::info('Cacheando datos de empleados especiales');
            return [
                '5742' => [
                    'no_empleados' => '0005742',
                    'No_Tag' => '180839466',
                    'nombre_empleado' => 'JAVIER GONZALEZ QUINTANILLA',
                    'Departamento' => 'Departamento por defecto',
                    'Puesto' => 'Puesto por defecto',
                    'Planta' => 'Intimark1',
                ],
                '19496' => [
                    'no_empleados' => '0019496',
                    'No_Tag' => '068041063',
                    'nombre_empleado' => 'MARCOS ADISSI MICHA',
                    'Departamento' => 'DIRECCION',
                    'Puesto' => 'GERENTE GENERAL',
                    'Planta' => 'Intimark1',
                ],
                '700001' => [
                    'no_empleados' => '0700001',
                    'No_Tag' => '409982989',
                    'nombre_empleado' => 'EDUARDO ADISSI COHEN',
                    'Departamento' => 'DIRECCION',
                    'Puesto' => 'GERENTE GENERAL',
                    'Planta' => 'Intimark1',
                ],
                '18405' => [
                    'no_empleados' => '0018405',
                    'No_Tag' => '425714461',
                    'nombre_empleado' => 'NICOLAS ALBERTO ARANGO',
                    'Departamento' => 'DIRECCION',
                    'Puesto' => 'GERENTE GENERAL',
                    'Planta' => 'Intimark1',
                ],
            ];
        });

        // Verificar si es un empleado especial
        if (
            isset($specialEmployees[$datos_evento]) ||
            in_array($datos_evento, array_column($specialEmployees, 'No_Tag'))
        ) {

            Log::info("Procesando empleado especial: $datos_evento");

            // Encontrar empleado especial por No_Tag si es necesario
            $specialEmployee = $specialEmployees[$datos_evento] ??
                current(array_filter($specialEmployees, fn($emp) => $emp['No_Tag'] === $datos_evento));

            // Verificar registro existente usando cache
            $registroExistente = Cache::remember(
                "registro_simulacro_{$specialEmployee['no_empleados']}_{$inicioMes->format('Y-m')}",
                300,
                function () use ($specialEmployee, $inicioMes, $finMes) {
                    Log::info("Verificando registro existente para: {$specialEmployee['nombre_empleado']}");
                    return RegistroSimulacro::where('no_empleados', $specialEmployee['no_empleados'])
                        ->whereBetween('created_at', [$inicioMes, $finMes])
                        ->exists();
                }
            );

            if ($registroExistente) {
                Log::info("Empleado especial ya registrado: {$specialEmployee['nombre_empleado']}");
                return response()->json([
                    'success' => false,
                    'message' => "{$specialEmployee['nombre_empleado']} ya está registrado",
                    'tipo' => 'warning'
                ]);
            }

            // Crear registro para empleado especial
            RegistroSimulacro::create(array_merge(['id_evento' => 5], $specialEmployee));

            Log::info("Registro exitoso para empleado especial: {$specialEmployee['nombre_empleado']}");
            Cache::forget("registro_simulacro_{$specialEmployee['no_empleados']}_{$inicioMes->format('Y-m')}");

            return response()->json([
                'success' => true,
                'message' => 'Registro correcto',
                'nombre_empleado' => $specialEmployee['nombre_empleado'],
            ]);
        }

        // Buscar empleado regular en cache
        $empleadoCacheKey = "empleado_" . md5($datos_evento);
        $AsistenciaE = Cache::remember($empleadoCacheKey, 3600, function () use ($datos_evento) {
            Log::info("Buscando empleado en base de datos: $datos_evento");
            return Tbl_Empleado_SIA::where(function ($query) use ($datos_evento) {
                if (strlen($datos_evento) == 10) {
                    $datos_evento = substr($datos_evento, -9);
                }
                $query->where('No_Empleado', str_pad($datos_evento, 7, '0', STR_PAD_LEFT))
                    ->orWhere('No_TAG', $datos_evento);
            })
                ->where('Status_Emp', 'A')
                ->first();
        });

        if (!$AsistenciaE) {
            Log::info("Empleado no encontrado: $datos_evento");
            return response()->json([
                'success' => false,
                'message' => 'Empleado no encontrado'
            ]);
        }

        // Verificar registro existente
        $registroExistenteCacheKey = "registro_simulacro_{$AsistenciaE->No_Empleado}_{$inicioMes->format('Y-m')}";
        $registroExistente = Cache::remember($registroExistenteCacheKey, 300, function () use ($AsistenciaE, $inicioMes, $finMes) {
            Log::info("Verificando registro existente para: {$AsistenciaE->No_Empleado}");
            return RegistroSimulacro::where('no_empleados', $AsistenciaE->No_Empleado)
                ->whereBetween('created_at', [$inicioMes, $finMes])
                ->exists();
        });

        if ($registroExistente) {
            Log::info("Empleado ya registrado: {$AsistenciaE->No_Empleado}");
            return response()->json([
                'success' => false,
                'message' => $AsistenciaE->Nom_Emp . ' ' . $AsistenciaE->Ap_Pat . ' ' . $AsistenciaE->Ap_Mat . ' ya está registrado',
                'tipo' => 'warning'
            ]);
        }

        // Crear nuevo registro
        if ($registro = RegistroSimulacro::create([
            'id_evento' => 5,
            'no_empleados' => $AsistenciaE->No_Empleado,
            'No_Tag' => $AsistenciaE->No_TAG,
            'nombre_empleado' => $AsistenciaE->Nom_Emp . ' ' . $AsistenciaE->Ap_Pat . ' ' . $AsistenciaE->Ap_Mat,
            'Departamento' => $AsistenciaE->departamentoRelacionado->Departamento ?? 'Departamento por defecto',
            'Puesto' => $AsistenciaE->puestoRelacionado->Puesto ?? 'Puesto por defecto',
            'Planta' => $AsistenciaE->Id_Planta,
        ])) {
            $this->incrementarConteo($registro->Planta);
        }

        Log::info("Registro exitoso para: {$AsistenciaE->No_Empleado}");
        Cache::forget($registroExistenteCacheKey);

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

    private $conteosTemporal = [];

    private function obtenerConteos()
    {
        $cacheKey = 'conteos_simulacro_mes_actual';
        $mesActual = Carbon::now()->format('Y-m');

        // Intentar obtener del array temporal primero
        if (isset($this->conteosTemporal[$mesActual])) {
            Log::info('[MEMORY HIT] Usando conteo desde memoria temporal');
            return $this->conteosTemporal[$mesActual];
        }

        // Intentar obtener del caché
        if (Cache::has($cacheKey)) {
            Log::info('[CACHE HIT] Usando conteo desde caché');
            $this->conteosTemporal[$mesActual] = Cache::get($cacheKey);
            return $this->conteosTemporal[$mesActual];
        }

        Log::info('[CACHE MISS] Generando nuevo conteo desde DB');

        // Si no hay caché, realizar conteo inicial
        $conteos = $this->realizarConteoInicial();

        // Guardar en caché y en memoria temporal
        $this->actualizarConteos($conteos);

        return $conteos;
    }

    private function realizarConteoInicial()
    {
        $inicioMes = Carbon::now()->startOfMonth();
        $finMes = Carbon::now()->endOfMonth();

        Log::info('Realizando conteo inicial desde base de datos');

        $resultados = RegistroSimulacro::whereIn('Planta', ['Intimark1', 'Intimark2'])
            ->whereBetween('created_at', [$inicioMes, $finMes])
            ->groupBy('Planta')
            ->selectRaw('Planta, count(*) as total')
            ->get()
            ->keyBy('Planta');

        return [
            'ConteoRegistroIxtlahuaca' => $resultados['Intimark1']->total ?? 0,
            'ConteoRegistroSanBartolo' => $resultados['Intimark2']->total ?? 0,
            'ConteoRegistros' => ($resultados['Intimark1']->total ?? 0) + ($resultados['Intimark2']->total ?? 0),
            'ultima_actualizacion' => now()->timestamp
        ];
    }

    private function actualizarConteos($conteos)
    {
        $mesActual = Carbon::now()->format('Y-m');
        $cacheKey = 'conteos_simulacro_mes_actual';

        $this->conteosTemporal[$mesActual] = $conteos;

        // Versión para pruebas (1 minuto)
        Cache::put($cacheKey, $conteos, now()->addMinute());

        // Versión para producción (hasta fin del día)
        // Cache::put($cacheKey, $conteos, now()->endOfDay());

        Log::info('Conteos actualizados en caché y memoria temporal');
    }

    public function incrementarConteo($planta)
    {
        $cacheKey = 'conteos_simulacro_mes_actual';
        $conteos = Cache::get($cacheKey) ?? $this->realizarConteoInicial();

        if ($planta === 'Intimark1') {
            $conteos['ConteoRegistroIxtlahuaca']++;
        } elseif ($planta === 'Intimark2') {
            $conteos['ConteoRegistroSanBartolo']++;
        }

        $conteos['ConteoRegistros']++;
        $conteos['ultima_actualizacion'] = now()->timestamp;

        $this->actualizarConteos($conteos);
        Log::info("Conteo incrementado para planta: $planta");
    }
}
