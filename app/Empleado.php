<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Empleado extends Model
{
    protected $table = 'empleado';
    public $timestamps = false;

    protected $fillable = [
        'login',
        'pass'
    ];

    public function empleados() {
        return $this->hasMany('App\Empleado');
    }
}
