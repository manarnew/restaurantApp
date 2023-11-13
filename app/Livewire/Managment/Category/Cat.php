<?php

namespace App\Livewire\Managment\Category;

use App\Models\category;
use Livewire\Component;
use Livewire\WithPagination;

class Cat extends Component
{

    use WithPagination;
    public $showCreateCat = false;
    public $showEditCat = false;
    public $id;
    public $catEdit ;
    public function render()
    {
        return view('livewire.managment.category.cat',[
            'categories'=>category::paginate(5),
        ]);
    }
     public function delete($id){
        $category = category::destroy($id);
        if($category){
            session()->flash('success', 'Category successfully deleted.');
            return $this->redirect('/management/category', navigate: true);
        }else{
            session()->flash('failed', 'failed to deleted category.');
            return $this->redirect('/management/category', navigate: true);
        }
     }
    public function showCreateCatForm(){
        $this->showCreateCat = !$this->showCreateCat;
        $this->showEditCat =false;
    }
    public function showEditCatForm($id){
    if($this->showEditCat==true){
        $this->showEditCat = !$this->showEditCat;
    }
    else
    {
        $cats = category::whereId($id)->first();
        if($cats){
            $this->catEdit = $cats;
            $this->dispatch('cat-show',$cats);
            $this->showEditCat = !$this->showEditCat;
            $this->showCreateCat = false;
        }
    }
    }
  
}
