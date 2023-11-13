<?php

namespace App\Livewire\Managment\Users;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Attributes\Rule;
use Livewire\Component;

class CreateUser extends Component
{
    #[Rule('required|unique:users|max:255')] 
    public $name;
    #[Rule('required|email|unique:users|max:255')] 
    public $email;
    #[Rule('required|min:6')] 
    public $password;
    #[Rule('required')] 
    public $role;
    public function render()
    {
        return view('livewire.managment.users.create-user');
    }
    public function save(){
        $this->validate(); 
        $user = new User();
        $user->name = $this->name;
        $user->email = $this->email;
        $user->password = Hash::make($this->password);
        $user->role = $this->role;
        $user->save();
        if($user){
            session()->flash('success', 'User successfully created.');
            return $this->redirect('/management/user', navigate: true);
        }else{
            session()->flash('failed', 'failed to create user.');
            return $this->redirect('/management/user', navigate: true);
        }
        
    }
}
