<?php

namespace App\Livewire\Cashier;

use App\Models\saleDetails;
use App\Models\sales;
use App\Models\table;
use Livewire\Attributes\On;
use Livewire\Component;
class OrderDetails extends Component
{
    public $saleDetails;
    public $sale;
    public $PaymentType = "Cash";
    public $recievedAmount;
    public $saleIdPay;
    public $changeAmount  ;
    public function render()
    {
        return view('livewire.cashier.order-details');
    }

    #[On('order-saleDetails')] 
    public function mount($saleDetails= null){
        if($saleDetails){
            $this->saleDetails = $saleDetails;
            $this->sale = sales::where('id',$saleDetails[0]['sale_id'])->first();
        }
    }
    
    public function decreaseQuantity($saleDetail_id){
        //update quantity
        $saleDetail = saleDetails::where('id',$saleDetail_id)->first();
        $saleDetail->quantity=$saleDetail->quantity - 1;
        $saleDetail->save();
        //update total amount
        $sale = sales::where('id',$saleDetail->sale_id)->first();
        $sale->total_price = $sale->total_price - $saleDetail->menu_price;
        $sale->save();
        $saleDetail = saleDetails::where('sale_id',$saleDetail->sale_id)->get();
        $this->sale = $sale;
        $this->saleDetails = $saleDetail;
  
    }
    public function increaseQuantity($saleDetail_id){
        //update quantity
        $saleDetail = saleDetails::where('id',$saleDetail_id)->first();
        $saleDetail->quantity=$saleDetail->quantity + 1;
        $saleDetail->save();

        //update total amount
        $sale = sales::where('id',$saleDetail->sale_id)->first();
        $sale->total_price = $sale->total_price + $saleDetail->menu_price;
        $sale->save();
        $saleDetail = saleDetails::where('sale_id',$saleDetail->sale_id)->get();
        $this->sale = $sale;
        $this->saleDetails = $saleDetail;
       
    }

      public function deleteSaleDetail($saleDetail_id){
        $saleDetail = saleDetails::find($saleDetail_id);
        $sale_id = $saleDetail->sale_id;
        $menu_price = ($saleDetail->menu_price * $saleDetail->quantity);
        $saleDetail->delete();
        //update total price
        $sale = sales::find($sale_id);
        $sale->total_price = $sale->total_price - $menu_price;
        $sale->save();
        $saleDetail = saleDetails::where('sale_id',$sale_id)->get();
        $this->sale = $sale;
        $this->saleDetails = $saleDetail;
    }
    public function confirmOrderStatus($sale_id){
        saleDetails::where('sale_id', $sale_id)->update(['status'=>'confirm']);
        $sale = sales::find($sale_id);
        $saleDetail = saleDetails::where('sale_id',$sale_id)->get();
        $this->sale = $sale;
        $this->saleDetails = $saleDetail;
    }

    public function savePayment($saleIdPay){
        // update sale information in the sales table by using sale model
        $sale = sales::find($saleIdPay);
        $sale->total_recieved = $this->recievedAmount;
        $sale->change = $this->recievedAmount - $sale->total_price;
        $sale->payment_type = $this->PaymentType;
        $sale->sale_status = "paid";
        $sale->save();
        //update table to be available
        $table = table::find($sale->table_id);
        $table->status = "available";
        $table->save();
        return $this->redirect("/cashier/ShowReceipt/$saleIdPay",navigate:true);
    }

    
}
