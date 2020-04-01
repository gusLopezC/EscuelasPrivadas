<?php

namespace App\Http\Livewire;

use Livewire\Component;

class SearchCitySchool extends Component
{

    public $buscar;
    public $ciudades;

    public function mount()
    {
        $this->buscar = "";
        $this->ciudades = [];
    }

    public function updatedBuscar()
    {

        $this->ciudades = \App\Escuelas::where("ciudad", "like", trim($this->buscar) . "%")
            ->take(5)
            ->get();
    }

    public function asignarUsuario($nombre)
    {
        $this->buscar = $nombre;

        return  $this->buscar;
    }

    public function asignarPrimero()
    {
        return $this->buscar;

        $usuario = \App\User::where("name", "like", trim($this->buscar) . "%")->first();
        if ($usuario) {
            $this->buscar = $usuario->name;
        } else {
            $this->buscar = "...";
        }
    }

    public function render()
    {
        return view('livewire.search-city-school');
    }
}
