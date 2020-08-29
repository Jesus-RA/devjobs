<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Categoria;
use App\Experiencia;
use App\Ubicacion;
use App\Salario;
use App\Candidato;

class Vacante extends Model
{
    protected $fillable = [
        'titulo',
        'imagen',
        'descripcion',
        'skills',
        'categoria_id',
        'experiencia_id',
        'ubicacion_id',
        'salario_id',
    ];

    public function reclutador(){
        return $this->belongsTo(User::class, 'user_id');
    }

    public function categoria(){
        return $this->belongsTo(Categoria::class);
    }

    public function experiencia(){
        return $this->belongsTo(Experiencia::class);
    }

    public function ubicacion(){
        return $this->belongsTo(Ubicacion::class);
    }

    public function salario(){
        return $this->belongsTo(Salario::class);
    }

    public function candidatos(){
        return $this->hasMany(Candidato::class);
    }
}
