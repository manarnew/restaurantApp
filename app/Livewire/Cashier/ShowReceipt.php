<?php

namespace App\Livewire\Cashier;

use App\Models\saleDetails;
use App\Models\sales;
use Livewire\Component;

class ShowReceipt extends Component
{
    public $sale;
    public $saleDetails;
    public function render()
    {
      
        return view('livewire.cashier.show-receipt',[
            'sale'=>$this->sale,
            'saleDetails'=>$this->saleDetails
        ]);
    }

    public function mount($id) 
    {
        $sale = sales::find($id);
        $this->sale= $sale;
        $saleDetails = saleDetails ::where('sale_id', $id)->get();
        $this->saleDetails = $saleDetails;
    }
}
