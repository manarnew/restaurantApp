<div>
    <div class="container">
      <div class="row noPrint" style="padding-top: 10px">
        <div class="col-md-12">
          @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                  @foreach($errors->all() as $error)
                      <li>{{$error}}</li>
                  @endforeach
                </ul>
            </div>
          @endif
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="/dashboard">Main Functions</a></li>
              <li class="breadcrumb-item active" aria-current="page">Report</li>
            </ol>
          </nav>
        </div>
      </div>
      <div class="row">
        <form wire:submit="show" class="noPrint">
          <div class="col-md-12">
          <label>Choose Date For Report</label>
            <div class="form-group">
              <div class="input-group date" id="date-start" data-target-input="nearest">
                    <input type="date" wire:model="dateStart" value="2023-01-01" class="form-control datetimepicker-input" data-target="#date-start"/>
                </div>
            </div>
  
            <div class="form-group">
             <div class="input-group date" id="date-end" data-target-input="nearest">
                  <input type="date" wire:model="dateEnd" value="2023-01-01" class="form-control datetimepicker-input" data-target="#date-end"/>
              </div>
            </div>
            <input class="btn btn-primary" type="submit" value="Show Report">
          </div>
        </form>
      </div>
    @if($showReports)
    <div class="row"  style="10px;padding-top: 10px">
      <div class="col-md-12">
        @if($sales->count() > 0)
          <div class="alert alert-success" role="alert">
            <p>The Total Amount of Sale from {{$dateStart}} to {{$dateEnd}} is ${{number_format($totalSale, 2)}}</p>
          </div>
          <table class="table">
            <thead>
              <tr class="bg-primary text-light">
                <th scope="col">#</th>
                <th scope="col">Receipt ID</th>
                <th scope="col">Date Time</th>
                <th scope="col">Table</th>
                <th scope="col">Staff</th>
                <th scope="col">Total Amount</th>
              </tr>
            </thead>
            <tbody>
              @php 
                $countSale = ($sales->currentPage() - 1) * $sales->perPage() + 1;
              @endphp 
              @foreach($sales as $sale)
                <tr class="bg-primary text-light">
                  <td>{{$countSale++}}</td>
                  <td>{{$sale->id}}</td>
                  <td>{{date("m/d/Y H:i:s", strtotime($sale->updated_at))}}</td>
                  <td>{{$sale->table_name}}</td>
                  <td>{{$sale->user_name}}</td>
                  <td>{{$sale->total_price}}</td>
                </tr>
                <tr >
                  <th></th>
                  <th>Menu ID</th>
                  <th>Menu</th>
                  <th>Quantity</th>
                  <th>Price</th>
                  <th>Total Price</th>
                </tr>
                @foreach($this->salesDetails($sale->id) as $saleDetail)
                  <tr>
                    <td></td>
                    <td>{{$saleDetail->menu_id}}</td>
                    <td>{{$saleDetail->menu_name}}</td>
                    <td>{{$saleDetail->quantity}}</td>
                    <td>{{$saleDetail->menu_price}}</td>
                    <td>{{$saleDetail->menu_price * $saleDetail->quantity}}</td>
                  </tr>
                @endforeach
              @endforeach
            </tbody>
          </table>
 
          {{$sales->appends($_GET)->links()}}
         
        @else
          <div class="alert alert-danger" role="alert">
            There is no Sale Report
          </div>
        @endif
      </div>
  </div>
  <div class="text-center noPrint">
    <button class="btn btn-info" type="button" onclick="window.print(); return false;">
      Print
    </button>
  </div>
  @endif
</div>
</div>
