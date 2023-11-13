<?php

namespace App\Livewire\Managment\Menu;

use App\Models\menu as ModelsMenu;
use Illuminate\Support\Facades\File;
use Livewire\Component;
use Livewire\WithPagination;

class Menu extends Component
{
    use WithPagination;
    public $showCreateMenu = false;
    public $showEditMenu = false;
    public  $menuEdit;
    public function render()
    {
        return view('livewire.managment.menu.menu',[
            'menus'=>\App\Models\menu::paginate(5),
        ]);
    }
    public function showEidtMenuForm($id){
        if($this->showEditMenu==true){
            $this->showEditMenu = !$this->showEditMenu;
        }
        else
        {
            $menu = \App\Models\menu::whereId($id)->first();
            if($menu ){
                $this->menuEdit = $menu ;
                $this->dispatch('cat-show',$menu);
                $this->showEditMenu = !$this->showEditMenu;
                $this->showCreateMenu = false;
            }
        }
        }
    public function delete($id){
        $image = \App\Models\menu::find($id)->first();
        if(File::exists(public_path('menuImages').'/'.$image->image)){
            unlink(public_path('menuImages').'/'.$image->image);
        }
        $menu = \App\Models\menu::destroy($id);
        if($menu){
            session()->flash('success', 'Menu successfully deleted.');
            return $this->redirect('/management/menu', navigate: true);
        }else{
            session()->flash('failed', 'failed to deleted Menu.');
            return $this->redirect('/management/menu', navigate: true);
        }
    }
    public function showCreateMenuForm(){
        $this->showCreateMenu = !$this->showCreateMenu;
        $this->showEditMenu =false;
    }
}
