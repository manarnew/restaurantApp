<?php

namespace App\Livewire\Managment\Users;

use Livewire\Component;
use Livewire\WithPagination;

class User extends Component
{
    use WithPagination;
    public $showCreateUser = false;
    public $showEditUser = false;
    public  $userEdit;
    public function render()
    {
        return view('livewire.managment.users.user',[
            'users'=>\App\Models\User::paginate(5),
        ]);
    }
    public function showEidtUserForm($id){
        if($this->showEditUser==true){
            $this->showEditUser = !$this->showEditUser;
        }
        else
        {
            $User = \App\Models\User::whereId($id)->first();
            if($User ){
                $this->userEdit = $User ;
                $this->dispatch('user-show',$User);
                $this->showEditUser = !$this->showEditUser;
                $this->showCreateUser = false;
            }
        }
        }
    public function delete($id){
        $User = \App\Models\User::destroy($id);
        if($User){
            session()->flash('success', 'User successfully deleted.');
            return $this->redirect('/management/user', navigate: true);
        }else{
            session()->flash('failed', 'failed to deleted user.');
            return $this->redirect('/management/user', navigate: true);
        }
    }
    public function showCreateUserForm(){
        $this->showCreateUser = !$this->showCreateUser;
        $this->showEditUser =false;
    }
}
