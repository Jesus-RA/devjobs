<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Vacante;

class Categoria extends Model
{
    protected $fillable = [
        'nombre',
    ];

    public function vacantes(){
        return $this->hasMany(Vacante::class);
    }
}
