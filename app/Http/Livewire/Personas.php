<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Persona;

class Personas extends Component
{
    public $personas;
    //public $tipoPersonas = [];
    

    public $persona_id;
    public $nombre;
    public $apellido;
    public $cedula;
    public $direccion;
    public $telefono;
    public $email;
    public $password;
    public $tipo='tecnico';
    public $titulo;

    public $modal = false;

    public function render()
    {
        $this->personas = Persona::where('tipo','=','tecnico')->get();
        return view('livewire.personas');
    }
      
    public function crear()
    {
        $this->limpiarCampos();
      //  $this->tiposPersonas();
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
        $this->persona_id = null;
        $this->nombre = '';
        $this->apellido = '';
        $this->direccion = '';
        $this->cedula = '';
        $this->telefono = '';
        $this->email = '';
        $this->password ='';
        $this->titulo = '';        
    }

    public function editar($id)
    {
        $persona = Persona::findOrFail($id);
        $this->persona_id = $persona->id;
        $this->nombre = $persona->nombre;
        $this->apellido = $persona->apellido;
        $this->cedula = $persona->cedula;
        $this->direccion = $persona->direccion;
        $this->telefono = $persona->telefono;
        $this->email = $persona->email;
        $this->password =$persona->password;
        $this->titulo = $persona->titulo;

      //  $this->tiposPersonas();
        $this->abrirModal();
    }

    public function borrar($id)
    {
        Persona::find($id)->delete();
        session()->flash('message', 'Persona eliminada correctamente');
    }

    public function guardar()
    {
        $persona = null;

        if(is_null($this->persona_id))
        {
            Persona::create(
            [
                'nombre' => $this->nombre,
                'apellido' => $this->apellido,
                'cedula' => $this->cedula,
                'direccion'=> $this->direccion,
                'telefono'=> $this->telefono,
                'email'=> $this->email,
                'password'=> $this->password,
                'titulo'=> $this->titulo,
                'tipo'=>$this->tipo
            ]);    
        }
        else
        {
            $persona = Persona::find($this->persona_id);
            $persona->nombre = $this->nombre;
            $persona->apellido = $this->apellido;
            $persona->cedula = $this->cedula;
            $persona->direccion = $this->direccion;
            $persona->telefono = $this->telefono;
            $persona->email = $this->email;
            $persona->password = $this->password;
            $persona->titulo = $this->titulo;
            $persona->save();
        }
        
         session()->flash('message',
            $this->persona_id ? '¡Actualización exitosa!' : '¡Se creo un nuevo registro!');
         
         $this->cerrarModal();
         $this->limpiarCampos();
    }

    // public function tiposPersonas()
    // {
    //     $this->tiposPersonas = 'tecnico';
    // }
    
}
