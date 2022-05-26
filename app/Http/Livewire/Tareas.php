<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Tarea;

class Tareas extends Component
{
    public $tareas;

    public $tarea_id;
    public $nombre;
    public $descripcion;
    public $tipo;
    public $tiempo;

    public $modal = false;

    public function render()
    {
        $this->tareas = Tarea::all();
        return view('livewire.tareas');
    }
    public function crear()
    {
        $this->limpiarCampos();
        $this->abrirModal();        
    }

    public function abrirModal()
    {
        $this->modal = true;
    }

    public function cerrarModal(){
        $this->modal = false;
    }

    public function limpiarCampos()
    {
        $this->tarea_id = null;
        $this->nombre = '';
        $this->descripcion = '';
        $this->tipo = ''; 
        $this->tiempo = '';      
    }

    public function editar($id)
    {
        $tarea = Tarea::findOrFail($id);
        $this->tarea_id = $tarea->id;
        $this->nombre = $tarea->nombre;
        $this->descripcion = $tarea->descripcion;
        $this->tipo = $tarea->tipo;
        $this->tiempo = $tarea->tiempo;

        $this->abrirModal();
    }

    public function borrar($id)
    {
        Tarea::find($id)->delete();
        session()->flash('message', 'Tarea eliminada correctamente');
    }

    public function guardar()
    {
        $tarea = null;

        if(is_null($this->tarea_id))
        {
            Tarea::create(
            [
                'nombre' => $this->nombre,
                'descripcion' => $this->descripcion,
                'tipo' => $this->tipo,
                'tiempo' => $this->tiempo,
   
            ]);    
        }
        else
        {
            $tarea = Tarea::find($this->tarea_id);
            $tarea->nombre = $this->nombre;
            $tarea->descripcion = $this->descripcion;
            $tarea->tipo = $this->tipo;
            $tarea->tiempo = $this->tiempo;

            $tarea->save();
        }
        
         session()->flash('message',
            $this->tarea_id ? '¡Actualización exitosa!' : '¡Se creo una Nueva Tarea!');
         
         $this->cerrarModal();
         $this->limpiarCampos();
    }

    
}
