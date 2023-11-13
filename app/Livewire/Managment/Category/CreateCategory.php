<?php

namespace App\Livewire\Managment\Category;

use App\Models\category;
use Livewire\Attributes\Rule;
use Livewire\Component;

class CreateCategory extends Component
{
    #[Rule('required|unique:categories|max:255')] 
    public $name ='';

    public function save(){
        $this->validate(); 
        $category = category::create(
            $this->only(['name'])
        );
        if($category){
            session()->flash('success', 'Category successfully created.');
            return $this->redirect('/management/category', navigate: true);
        }else{
            session()->flash('failed', 'failed to create category.');
            return $this->redirect('/management/category', navigate: true);
        }
        
    }
    public function render()
    {
        return view('livewire.managment.category.create-category');
    }
}
