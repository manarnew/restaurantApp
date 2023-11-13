<?php

namespace App\Livewire\Managment\Users;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Attributes\On;
use Livewire\Attributes\Rule;
use Livewire\Component;

class EditUser extends Component
{
    #[Rule('required|max:255')] 
    public $name;
    #[Rule('required|email|max:255')] 
    public $email;
    public $password;
    #[Rule('required')] 
    public $role;
    public $user;
    public $user_id;
    public function render()
    {
        return view('livewire.managment.users.edit-user');
    }
    #[On('user-show')] 
    public function mount($user = null){
        if($user){
            $this->user = $user;
            $this->user_id = $user->id;
            $this->name = $user->name;
            $this->email = $user->email;
            $this->role = $user->role;
        }
    }

    public function save(){
        $this->validate(); 
        $user =  User::find($this->user_id);
        $user->name = $this->name;
        $user->email = $this->email;
        if($user->password)
        $user->password = Hash::make($this->password);
        $user->role = $this->role;
        $User = $user->save();
        if($User){
            session()->flash('success', 'User successfully updated.');
            return $this->redirect('/management/user', navigate: true);
        }else{
            session()->flash('failed', 'failed to updated user.');
            return $this->redirect('/management/user', navigate: true);
        }
       }
}
