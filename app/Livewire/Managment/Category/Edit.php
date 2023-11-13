<?php

namespace App\Livewire\Managment\Category;

use App\Models\category;
use Livewire\Attributes\On;
use Livewire\Attributes\Rule;
use Livewire\Component;

class Edit extends Component
{
    public $cat_id;
    #[Rule('required|unique:categories|max:255')] 
    public $name;
    public $cat;
    public function render()
    {
        
        return view('livewire.managment.category.edit');
    }
    #[On('cat-show')] 
    public function mount($cat = null){
        if($cat){
            $this->cat = $cat;
            $this->cat_id = $cat->id;
            $this->name = $cat->name;
        }
    }
   
   public function save(){
    $this->validate(); 
    $category =  category::find($this->cat_id);
    $category->name = $this->name;
    $category = $category->save();
    if($category){
        session()->flash('success', 'Category successfully updated.');
        return $this->redirect('/management/category', navigate: true);
    }else{
        session()->flash('failed', 'failed to updated category.');
        return $this->redirect('/management/category', navigate: true);
    }
   }
}
