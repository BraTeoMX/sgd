<?php

namespace App\Http\Controllers;

use App\Ausentismo;
use App\Mail\IncapacidadNotificacion;
use App\permiso_vacaciones;
use App\Tbl_Empleado_SIA;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class AusentismoController extends Controller
{
    public function reporte()
    {

        $reportes = Ausentismo::join('cat_edo_neg', 'cat_edo_neg.edo_neg', 'ausentismo.cveci2')
        ->leftjoin('cat_permisos', 'cat_permisos.id_permiso', 'ausentismo.permisoSGD')
        ->where('horario','<>',1)
        ->groupby('cvetra')
        ->orderby('cvepa2', 'asc')
        ->orderby('des_edo_neg', 'asc')
        ->get();

       return view('ausentismo.reporte', compact('reportes'));
    }

}
