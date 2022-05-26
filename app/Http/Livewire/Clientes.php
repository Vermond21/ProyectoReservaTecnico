<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Persona;

class Clientes extends Component
{
    public $clientes; 


    public $cliente_id;
    public $nombre;
    public $apellido;
    public $cedula;
    public $direccion;
    public $telefono;
    public $email;
    public $tipo='cliente';

    public $modal = false;

    public function render()
    {
        $this->clientes = Persona::where('tipo','=','cliente')->get();
        return view('livewire.clientes');
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
        $this->cliente_id = null;
        $this->nombre = '';
        $this->apellido = '';
        $this->direccion = '';
        $this->cedula = '';
        $this->telefono = '';
        $this->email = '';      
    }

    public function editar($id)
    {
        $cliente = Persona::findOrFail($id);
        $this->cliente_id = $cliente->id;
        $this->nombre = $cliente->nombre;
        $this->apellido = $cliente->apellido;
        $this->cedula = $cliente->cedula;
        $this->direccion = $cliente->direccion;
        $this->telefono = $cliente->telefono;
        $this->email = $cliente->email;

        
        $this->abrirModal();
    }

    public function borrar($id)
    {
        Persona::find($id)->delete();
        session()->flash('message', 'Cliente eliminado correctamente');
    }

    public function guardar()
    {
        $cliente = null;

        if(is_null($this->cliente_id))
        {
            Persona::create(
            [
                'nombre' => $this->nombre,
                'apellido' => $this->apellido,
                'cedula' => $this->cedula,
                'direccion'=> $this->direccion,
                'telefono'=> $this->telefono,
                'email'=> $this->email,

            ]);    
        }
        else
        {
            $cliente = Persona::find($this->cliente_id);
            $cliente->nombre = $this->nombre;
            $cliente->apellido = $this->apellido;
            $cliente->cedula = $this->cedula;
            $cliente->direccion = $this->direccion;
            $cliente->telefono = $this->telefono;
            $cliente->email = $this->email;
            $cliente->save();
        }
        
         session()->flash('message',
            $this->cliente_id ? '¡Actualización exitosa!' : '¡Se creo un nuevo registro!');
         
         $this->cerrarModal();
         $this->limpiarCampos();
    }

    
    
}
