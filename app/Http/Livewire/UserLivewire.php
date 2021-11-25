<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use App\Mail\NewUser;

class UserLivewire extends Component
{
    public $view = 'index';
    public Collection $users;
    public User $user;
    public $name, $email, $password;

    protected $rules = [
        'name' => 'required|string',
        'email' => 'required|email',
        'password' => 'required'
    ];

    public function render()
    {
        $this->users = User::all();
        return view('livewire.user-livewire');
    }

    public function add(){
        $this->view = 'add';
        $this->user = new User;
        $this->name = "";
        $this->email = "";
        $this->password = "";
    }

    public function table(){
        $this->view = 'index';
        $this->user = new User;
    }

    public function edit($id){
        $this->view = 'edit';
        $this->user = User::findOrFail($id);
        $this->name = $this->user->name;
        $this->email = $this->user->email;
    }

    public function save(){
        $this->validate();
        $this->user->name = $this->name;
        $this->user->email = $this->email;
        $this->user->password = Hash::make($this->password);
        if($this->view == 'add')
            $this->user->remember_token = Str::random(10);
        $this->user->save();
        $this->view = 'index';
    }

    public function delete($id){
        $this->user = new User;
        User::findOrFail($id)->delete();
        $this->users = User::all();
    }
}
