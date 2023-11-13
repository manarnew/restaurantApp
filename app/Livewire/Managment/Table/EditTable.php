<?php

namespace App\Livewire\Managment\Table;

use Livewire\Attributes\On;
use Livewire\Attributes\Rule;
use Livewire\Component;

class EditTable extends Component
{
    public $table_id;
    #[Rule('required|unique:tables|max:255')] 
    public $name;
    public $table;
    public function render()
    {
        return view('livewire.managment.table.edit-table');
    }
    #[On('cat-show')] 
    public function mount($table = null){
        if($table){
            $this->table = $table;
            $this->table_id = $table->id;
            $this->name = $table->name;
        }
    }
    public function save(){
        $this->validate(); 
        $table =  \App\Models\table::find($this->table_id);
        $table->name = $this->name;
        $table = $table->save();
        if($table){
            session()->flash('success', 'Table successfully updated.');
            return $this->redirect('/management/table', navigate: true);
        }else{
            session()->flash('failed', 'failed to updated table.');
            return $this->redirect('/management/table', navigate: true);
        }
       }
}
