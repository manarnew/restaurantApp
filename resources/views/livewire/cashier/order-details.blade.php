<div>
  @php $showBtnPayment = true @endphp
    <p>Sale ID: {{$sale["id"]}}</p>
    <div class="table-responsive-md" style="overflow-y:scroll; height: 400px; border: 1px solid #343A40">
    <table class="table table-stripped table-dark">
    <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Menu</th>
            <th style="padding-left:15px" scope="col">Quantity</th>
            <th scope="col">Price</th>
            <th scope="col">Total</th>
            <th scope="col">Status</th>
        </tr>
    </thead>
    <tbody>
    @foreach($saleDetails as $saleDetail)
     <div wire:key="{{ $saleDetail["id"] }}">
        <tr>
            <td>{{$saleDetail["menu_id"]}}</td>
            <td>{{$saleDetail["menu_name"]}}</td>
            <td>
                @if($saleDetail["quantity"] > 1)
                  <button wire:click="decreaseQuantity({{$saleDetail["id"]}})" class="btn btn-danger btn-sm">-</button>
                @endif
                {{$saleDetail["quantity"]}}
                <button wire:click="increaseQuantity({{$saleDetail["id"]}})" class="btn btn-primary btn-sm">+</button>
            </td>
            <td>{{$saleDetail["menu_price"]}}</td>
            <td>{{($saleDetail["menu_price"] * $saleDetail["quantity"])}}</td>
            @if($saleDetail["status"] == "noConfirm")
                {{$showBtnPayment = false}}
                <td><a wire:click="deleteSaleDetail({{$saleDetail["id"]}})" class="btn btn-danger btn-delete-saledetail"><i class="far fa-trash-alt"></a></td>
            @else 
                <td><i class="fas fa-check-circle"></i></td>
            @endif
       </tr>
    </div>
    @endforeach
    </tbody></table></div>

  <hr>
    <h3>Total Amount: ${{number_format($sale["total_price"])}}</h3>

    @if($showBtnPayment)
    <button  class="btn btn-success btn-block btn-payment" data-toggle="modal" data-target="#modal-info">Payment</button>
    <form wire:submit="savePayment({{$sale["id"]}})">
        <div class="modal fade" id="modal-info">
            <div class="modal-dialog">
              <div class="modal-content bg-info">
                <div class="modal-header">
                  <h4 class="modal-title">Payment modal</h4>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                    <h3 class="totalAmount">${{number_format($sale["total_price"])}}</h3>
                    <h3 class="changeAmount"></h3>
                    <div class="input-group mb-3">
                       <div class="input-group-prepend">
                        <span class="input-group-text">$</span>
                       </div> 
                       <input type="number"wire:model="recievedAmount" id="recievedAmount" class="form-control">
                       <input type="hidden" value="{{$sale["total_price"]}}" id="total_price" class="form-control">
                    </div>
                    <div class="form-group">
                      <label for="payment">Payment Type</label>
                      <select wire:model="PaymentType" class="form-control" id="payment-type">
                        <option value="cash" >Cash</option>
                        <option value="credit card">Credit Card</option>
                      </select>
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                  <button type="button" class="btn btn-outline-light" data-dismiss="modal">Close</button>
                  <button type="submit" disabled class="btn btn-outline-light btn-save-payment">Save payment</button>
                </div>
              </div>
              <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
          </div>
                </form>
    @else
        <button wire:click="confirmOrderStatus({{$sale["id"]}})" class="btn btn-warning btn-block btn-confirm-order">Confirm Order</button>
    @endIf


</div>
