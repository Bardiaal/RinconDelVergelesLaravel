<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comanda extends Model
{
    protected $table = 'comanda';
    public $timestamps = false;

    protected $fillable = [
        'idFactura',
        'idProducto',
        'nombreProducto',
        'idEmpleado',
        'unidades',
        'entregada',
        'precio'
    ];

    public function comanda() {
        return $this->hasMany('App\Comanda');
    }
    
    public function factura() {
        return $this->belongsTo('App\Factura', 'idFactura');
    } 
    
    public function producto() {
        return $this->belongsTo('App\Producto', 'idProducto');
    } 
    
    public function empleado() {
        return $this->belongsTo('App\Empleado', 'idEmpleado');
    }
}
