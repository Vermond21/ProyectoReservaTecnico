<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Persona;
use Illuminate\Support\Arr;

class Calendario extends Component
{
    public $tecnicos;
    public $tecnico;
    public $tecnico_id;
    public $programaciones = '';
    public $programacionesJson;

    protected $listeners = ['seleccionarTecnico'];

    public function render()
    {
        $this->tecnicos = Persona::where('tipo','=','tecnico')->get();    
        return view('livewire.calendario');
    }

    public function seleccionarTecnico()
    {
        if($this->tecnico_id == "")
        {
            session()->flash('message', 'Seleccione un técnico!!');
            return;
        }

        $this->tecnico = Persona::find($this->tecnico_id);
        $this->programaciones = $this->tecnico->programaciones;
        $programacionesTecnicos = [];

        foreach($this->programaciones as $programacion)
        {
            array_push($programacionesTecnicos,['id' =>$programacion->id, 'title' => $programacion->tarea->nombre, 'start' => $programacion->fecha]);
        }

        $this->programacionesJson = json_encode($programacionesTecnicos);
    } 

    public function refrescarCalendario(){
    }   
}
