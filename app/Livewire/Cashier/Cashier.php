<?php

namespace App\Livewire\Cashier;

use App\Models\category;
use App\Models\saleDetails;
use App\Models\sales;
use Livewire\Attributes\Reactive;
use Livewire\Component;
use App\Models\menu;
use App\Models\table;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\On;

class Cashier extends Component
{
    public $showTable=false;
    public $showMenu=false;
    public $showId;
    public $menu_id;
    public $table_id;
    public $table_name;
    public $quantity = 1;
    public $SELECTED_TABLE_NAME = '';
    public $showOrder;
    public $showOrderDetails = false;
    public $placeSelectTable = '' ;
    public function render()
    {
        return view('livewire.cashier.cashier',[
            'categories'=>category::all(),
        ]);
    }

    public function showTableForm(){
        $this->showTable = !$this->showTable;
    }
    public function showMenuForm($id){
            $menu = Menu::where('category_id', $id)->get();
                $this->showId = $menu;
                $this->dispatch('menu-show',$menu);
                $this->showMenu = true;
        }
        #[On('table-Selected')]
        public function selected($Selected){
        $tableName =  table::where('id',$Selected)->first();
         $this->SELECTED_TABLE_NAME = $tableName->name;
         $this->table_id = $tableName->id;
         $sale = sales::where('table_id', $this->table_id)->where('sale_status','unpaid')->first();
         $this->placeSelectTable ='';
         if($sale){
            $saleDetails = saleDetails::where('sale_id', $sale->id)->get();
            $this->showOrder=$saleDetails;
            $this->dispatch('order-saleDetails', $saleDetails);
            $this->showOrderDetails = true;
         }else{
            $this->showOrderDetails = false;
         }
        }

     
        #[On('send-Id')]
        public function orderFood($menu_id){
            if($this->table_id){
            $this->menu_id = $menu_id;
            $menu = menu::find($this->menu_id);
            $table_id = $this->table_id;
            $table_name = $this->SELECTED_TABLE_NAME;
            $sale = sales::where('table_id', $table_id)->where('sale_status','unpaid')->first();
            // if there is no sale for the selected table, create a new sale record
            if(!$sale){
                $user = Auth::user();
                $sale = new sales();
                $sale->table_id = $table_id;
                $sale->table_name = $table_name;
                $sale->user_id = $user->id;
                $sale->user_name = $user->name;
                $sale->save();
                $sale_id = $sale->id;
                // update table status
                $table = Table::find($table_id);
                $table->status = "unavailable";
                $table->save();
            }else{ // if there is a sale on the selected table
                $sale_id = $sale->id;
            }
    
            // add ordered menu to the sale_details table
            $saleDetail = new saleDetails();
            $saleDetail->sale_id = $sale_id;
            $saleDetail->menu_id = $menu->id;
            $saleDetail->menu_name = $menu->name;
            $saleDetail->menu_price = $menu->price;
            $saleDetail->quantity = $this->quantity;
            $saleDetail->save();
            //update total price in the sales table
            $sale->total_price = $sale->total_price + ($this->quantity * $menu->price);
            $sale->save();
            $saleDetails = saleDetails::where('sale_id', $sale_id)->get();
            $this->showOrder=$saleDetails;
            $this->dispatch('order-saleDetails', $saleDetails);
            $this->showOrderDetails = true;
            $this->placeSelectTable ='';
        }else{
         $this->placeSelectTable = "place select table first";
        }
        }
}
