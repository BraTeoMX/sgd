<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RegistrarAsistenciaActualzacion extends Model
{
    //
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'eventos_actualizacion';

    /**
     * The "type" of the auto-incrementing ID.
     *
     * @var string
     */
    protected $keyType = 'integer';

    /**
     * @var array
     */
    protected $fillable = [

        'id',
        'evento_id',
        'no_empleado',
        'no_tag',
        'asistencia',
        'nombre_empleado',
        'puesto',
        'planta',
        'departamento',
        'updated_at',
        'created_at',
    ];

     /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [

    ];
}
 