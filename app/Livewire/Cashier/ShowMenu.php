<?php

namespace App\Livewire\Cashier;

use Livewire\Component;
use app\Models\menu;
use Livewire\Attributes\On;

class ShowMenu extends Component
{
    public $menu;
    public function render()
    {
        return view('livewire.cashier.show-menu',[
        'menus'=>$this->menu
        ]);
    }
    #[On('menu-show')] 
    public function mount($menu = null){
        if($menu){
            $this->menu = $menu;
        }
    }

   
   
}
