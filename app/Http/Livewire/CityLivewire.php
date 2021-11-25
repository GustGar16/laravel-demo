<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Database\Eloquent\Collection;
use App\Models\City;

class CityLivewire extends Component
{
    public $view = 'index';
    public Collection $cities;
    public City $city;
    public $name, $cod;

    protected $rules = [
        'cod' => 'required|string',
        'name' => 'required|string',
    ];

    public function render()
    {
        $this->cities = City::all();
        return view('livewire.city');
    }

    public function add(){
        $this->view = 'add';
        $this->city = new City;
        $this->name = "";
        $this->cod = "";
    }

    public function table(){
        $this->view = 'index';
    }

    public function edit($id){
        $this->view = 'add';
        $this->city = City::findOrFail($id);
        $this->name = $this->city->name;
        $this->cod = $this->city->cod;
    }

    public function save(){
        $this->validate();
        $this->city->cod = $this->cod;
        $this->city->name = $this->name;
        $this->city->save();
        $this->view = 'index';
    }

    public function delete($id){
        $this->city = new City;
        City::findOrFail($id)->delete();
        $this->cities = City::all();
    }
}
