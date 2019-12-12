<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Factura extends Model
{
    protected $table = 'factura';
    public $timestamps = false;

    protected $fillable = [
        'horaInicio',
        'horaCierre',
        'total',
        'mesa',
        'idEmpleadoInicio',
        'idEmpleadoFinal'
    ];

    public function factura() {
        return $this->hasMany('App\Factura');
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
