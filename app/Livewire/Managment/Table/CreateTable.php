<?php

namespace App\Livewire\Managment\Table;

use App\Models\table;
use Livewire\Attributes\Rule;
use Livewire\Component;

class CreateTable extends Component
{
    #[Rule('required|unique:tables|max:255')] 
    public $name ='';

    public function save(){
        $this->validate(); 
        $table = table::create(
            $this->only(['name'])
        );
        if($table){
            session()->flash('success', 'Table successfully created.');
            return $this->redirect('/management/table', navigate: true);
        }else{
            session()->flash('failed', 'failed to create table.');
            return $this->redirect('/management/table', navigate: true);
        }
        
    }
    public function render()
    {
        return view('livewire.managment.table.create-table');
    }
}
