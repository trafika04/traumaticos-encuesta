<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Registro extends Model
{
    use HasFactory;
    protected $table = 'registros';
    protected $dates = ['fecha_inicio'];
    protected $fillable = [
        'id_empresa',
        'fecha_inicio',
        'email',
        'token',
        'sexo',
        'estado_civil',
        'edad',
        'antiguedad',
        'estudios',
        'tipo_puesto',
        'area',
        'tipo_contratacion',
        'jornada_trabajo',
        'jornada_trabajo_opcional',
        'rotacion_turnos',
        'rotacion_personal',
        'tipo_empleado',
        'experiencia_laboral',
        'item_jefe',
        'ets_1',
        'ets_2',
        'ets_3',
        'ets_4',
        'ets_5',
        'ets_6',
        'ets_7',
        'ets_8',
        'ets_9',
        'ets_10',
        'ets_11',
        'ets_12',
        'ets_13',
        'ets_14',
        'ets_15',
        'ets_16',
        'ets_17',
        'ets_18',
        'ets_19',
        'ets_20',
    ];

    public function empresa()
    {
        return $this->belongsTo('App\Empresas', 'id_empresa');
    }

    public function calificaciones()
    {
        return $this->hasOne('App\Calificaciones', 'id_registro');
    }
}
