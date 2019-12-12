<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mesa extends Model
{
    protected $table = 'mesa';
    public $timestamps = false;

    protected $fillable = [
        'mesa', 
        'ocupada'
    ];

    public function mesa() {
        return $this->hasMany('App\Mesa');
    }
}
