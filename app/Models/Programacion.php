<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Programacion extends Model
{
    use HasFactory;
    protected $table = 'programaciones';
    protected $fillable = ['id_cliente','id_tarea','id_tecnico','tiempo_inicio','tiempo_fin','fecha','estado','latitud','longitud','observaciones'];
    
    public function cliente()
    {
        return $this->belongsTo(Persona::class,'id_cliente');
    }
    public function tecnico()
    {
        return $this->belongsTo(Persona::class,'id_tecnico');
    }
    public function tarea()
    {
        return $this->belongsTo(Tarea::class,'id_tarea');
    }
}
