<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\User;

/**
 * @property integer $id
 * @property string $categoria
 * @property string $created_at
 * @property string $updated_at
 * @property string $deleted_at
 */
class Ausentismo extends Model
{
    use SoftDeletes;
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'ausentismo';

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

        'id_ausentismo',
        'cvepa2',
        'cveci2',
        'cvetra',
        'nombre',
        'paterno',
        'materno',
        'horario',
        'cvepue',
        'modulo',
        'justificacion',
        'pernmisoSGD'

    ];

     /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'fecha_solicitado' => 'datetime',
    ];



}
