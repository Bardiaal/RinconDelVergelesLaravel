<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Historial extends Model
{
    protected $table = 'historial';
    public $timestamps = false;

    protected $fillable = [
        'mesa',
        'idEmpleadoInicio',
        'horaInicio',
        'idEmpleadoFinal',
        'horaCierre',
        'total'
    ];

    public function historial() {
        return $this->hasMany('App\Historial');
    }
    
    public function empleadoInicial() {
        return $this->belongsTo('App\Empleado', 'idEmpleadoInicio');
    } 
    
    public function empleadoFinal() {
        return $this->belongsTo('App\Empleado', 'idEmpleadoFinal');
    } 
    
    public function mesa() {
        return $this->belongsTo('App\Mesa', 'mesa');
    } 
}
