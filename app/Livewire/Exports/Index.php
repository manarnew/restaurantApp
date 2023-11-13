<?php

namespace App\Livewire\Exports;

use App\Models\saleDetails;
use App\Models\sales;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;
    public $showReports = false;
    public $dateStart;
    public $countSale;
    public $dateEnd;
    public $totalSale;
    public function render()
    {
        $dateStart = date("Y-m-d H:i:s", strtotime($this->dateStart.' 00:00:00'));
        $dateEnd = date("Y-m-d H:i:s", strtotime($this->dateEnd.' 23:59:59'));
        $sales = sales::whereBetween('updated_at', [$dateStart, $dateEnd])->where('sale_status','paid');
            return view('livewire.exports.index',[
                'dateStart'=>date("m/d/Y H:i:s", strtotime($this->dateStart.' 00:00:00')),
                'dateEnd'=>date("m/d/Y H:i:s", strtotime($this->dateEnd.' 23:59:59')),
                'totalSale'=>$this->totalSale,
                'sales'=>$sales->paginate(5),
            ]);
          
       
    }
    public function show(){
        $dateStart = date("Y-m-d H:i:s", strtotime($this->dateStart.' 00:00:00'));
        $dateEnd = date("Y-m-d H:i:s", strtotime($this->dateEnd.' 23:59:59'));
        $sales = sales::whereBetween('updated_at', [$dateStart, $dateEnd])->where('sale_status','paid');
        $this->showReports = true;
        $this->totalSale = $sales->sum('total_price');
    }

    public function salesDetails($saleId){
        return saleDetails::where('sale_id', $saleId)->get();
    }
}
