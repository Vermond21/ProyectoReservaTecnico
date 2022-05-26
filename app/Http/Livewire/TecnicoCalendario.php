<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Asantibanez\LivewireCalendar\LivewireCalendar;
use Illuminate\Support\Collection;
use Carbon\Carbon;

class TecnicoCalendario extends LivewireCalendar
{
    public $programaciones;
    // public function render()
    // {
    //     return view('livewire.tecnico-calendario');
    // }
    public function events() : Collection
    {
        dd($this->programaciones);
        return collect([
            [
                'id' => 1,
                'title' => 'Breakfast',
                'description' => 'Pancakes! 🥞',
                'date' => Carbon::today(),
            ],
            [
                'id' => 2,
                'title' => 'Meeting with Pamela',
                'description' => 'Work stuff',
                'date' => Carbon::tomorrow(),
            ],
        ]);        
    }
    
    // public function mount($programacionesTecnico)
    // {
    //     if(!isset($programacionesTecnico))
    //     {
    //         session()->flash('message', 'El técnico no tiene programaciones!!');
    //         return;
    //     }
    //     $this->programaciones = $programacionesTecnico;
    //     dd($this->programaciones);
    // }
}
