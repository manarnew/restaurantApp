<?php

namespace App\Livewire\Managment\Menu;

use App\Models\category;
use Hamcrest\Type\IsString;
use Illuminate\Support\Facades\File;
use Livewire\Attributes\On;
use Livewire\Attributes\Rule;
use Livewire\Component;
use Livewire\WithFileUploads;

class EditMenu extends Component
{
    use WithFileUploads;
    #[Rule('required|max:255')] 
    public $name;
    #[Rule('required|numeric')] 
    public $price;
    public $image;
    public $image_organal;
    #[Rule('required')] 
    public $description;
    #[Rule('required')] 
    public $category_id;
    public $menu_id;
    public $category_name;
    public function render()
    {
        return view('livewire.managment.menu.edit-menu',[
            'categories'=>category::all(),
        ]);
    }
    #[On('cat-show')] 
    public function mount($menu = null){
        if($menu){
            $this->menu_id= $menu->id;
            $this->name = $menu->name;
            $this->description = $menu->description;
            $this->category_name = $menu->category->name;
            $this->category_id = $menu->category->id;
            $this->image = $menu->image;
            $this->image_organal = $menu->image;
            $this->price = $menu->price;
        }
    }
    public function save(){
        $this->validate(); 
        $menu =  \App\Models\menu::find($this->menu_id);
        $menu->name = $this->name;
        $menu->description = $this->description;
        $menu->category_id = $this->category_id;
        $menu->price = $this->price;
        if(($this->image != $this->image_organal)){
            if(File::exists('menuImages'.'/'.$this->image_organal)){
                unlink(public_path('menuImages').'/'.$this->image_organal);
            }
            $imageName = date('mdYHis').uniqid().'.'.$this->image->extension();
                $this->image->storeAs('menuImages', $imageName);
                $menu->image = $imageName;
            }
            $menu = $menu->save();
        if($menu){
            session()->flash('success', 'menu successfully updated.');
            return $this->redirect('/management/menu', navigate: true);
        }else{
            session()->flash('failed', 'failed to updated menu.');
            return $this->redirect('/management/menu', navigate: true);
        }
       }
}
