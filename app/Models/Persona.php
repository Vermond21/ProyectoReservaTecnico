<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Persona extends Model
{
    use HasFactory;
    protected $fillable = ['id','nombre', 'apellido', 'cedula','direccion', 'telefono','email','password', 'tipo', 'titulo'];

    public function programaciones() 
    {
        return $this->hasMany(Programacion::class, 'id_tecnico');
    }
}
