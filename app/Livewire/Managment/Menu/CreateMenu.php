<?php

namespace App\Livewire\Managment\Menu;

use App\Models\category;
use App\Models\menu;
use Livewire\Attributes\Rule;
use Livewire\Component;
use Livewire\WithFileUploads;

class CreateMenu extends Component
{
    use WithFileUploads;
    #[Rule('required|max:255')] 
    public $name;
    #[Rule('required|numeric')] 
    public $price;
    #[Rule('nullable|file|image|mimes:jpeg,png,jpg|max:5000')] 
    public $image;
    #[Rule('required')] 
    public $description;
    #[Rule('required')] 
    public $category_id;
    public function render()
    {
        return view('livewire.managment.menu.create-menu',[
            'categories'=>category::all(),
        ]);
    }

    public function save(){
        $this->validate(); 
        if($this->image){
            $imageName = date('mdYHis').uniqid().'.'.$this->image->extension();
            $this->image->storeAs('menuImages', $imageName);
        }
        $menu = new Menu();
        $menu->name = $this->name;
        $menu->price = $this->price;
        $menu->image = $imageName;
        $menu->description = $this->description;
        $menu->category_id = $this->category_id;
        $menu=  $menu->save();
        if($menu){
            session()->flash('success', 'Menu successfully created.');
            return $this->redirect('/management/menu', navigate: true);
        }else{
            session()->flash('failed', 'failed to create Menu.');
            return $this->redirect('/management/menu', navigate: true);
        }
        
    }
}
