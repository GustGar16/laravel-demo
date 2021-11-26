<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Database\Eloquent\Collection;
use App\Models\Client;
use App\Models\City;

class ClientLivewire extends Component
{
    public $view = 'index';
    public Collection $cities;
    public Collection $clients;
    public Client $client;
    public $name, $cod, $city_id;

    protected $rules = [
        'cod' => 'required|string',
        'name' => 'required|string',
        'city_id' => 'required|numeric',
    ];

    public function render()
    {
        $this->cities = City::all();
        $this->clients = Client::all();
        return view('livewire.client-livewire');
    }

    public function add(){
        $this->view = 'add';
        $this->client = new Client;
        $this->name = "";
        $this->cod = "";
        $this->city_id = null;
    }

    public function table(){
        $this->view = 'index';
        $this->client = new Client;
    }

    public function edit($id){
        $this->view = 'add';
        $this->client = Client::findOrFail($id);
        $this->name = $this->client->name;
        $this->cod = $this->client->cod;
        $this->city_id = $this->client->city_id;
    }

    public function save(){
        $this->validate();
        $this->client->cod = $this->cod;
        $this->client->name = $this->name;
        $this->client->city_id = $this->city_id;
        $this->client->save();
        $this->view = 'index';
    }

    public function delete($id){
        $this->client = new Client;
        Client::findOrFail($id)->delete();
        $this->clients = Client::all();
    }
}
