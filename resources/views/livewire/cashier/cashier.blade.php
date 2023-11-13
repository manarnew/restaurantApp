<div>
    <div class="container">
          <div class="col-9">
          @if($showTable)
          <livewire:cashier.show-table />
          @endif
        </div>
        <div class="row justify-content-center py5" style="padding-top: 10px">
          <div class="col-md-5">
            <button class="btn btn-primary btn-block" wire:click="showTableForm()">View All Tables</button>
            <div id="selected-table"><br><h3>Table: {{$SELECTED_TABLE_NAME}}</h3><hr>
              @if ($placeSelectTable)
              <div class="alert alert-success alertSession" id="alertSession">
                <button type="button" class="close" onclick="closeAlert()" data-dismiss="alert">X</button>
                  {{ $placeSelectTable }}
              </div>
              @endif
            </div>
            <div id="order-detail">
              @if($showOrderDetails)
              <livewire:cashier.order-details :saleDetails="$showOrder"/>
              @endif
            </div>
          </div>
          <div class="col-md-7">
            <nav>
              <div class="nav nav-tabs" id="nav-tab" role="tablist">
                @foreach($categories as $category)
                  <a class="nav-item nav-link" wire:click="showMenuForm({{$category->id}})" data-toggle="tab">
                    {{$category->name}}
                  </a>
                @endforeach
              </div>
            </nav>
            <div id="list-menu" class="row mt-2">
              @if($showMenu)
              <livewire:cashier.show-menu :menu="$showId"/>
              @endif
            </div>
          </div>
        </div>
    </div>
    
    
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Payment</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <h3 class="totalAmount"></h3>
            <h3 class="changeAmount"></h3>
            <div class="input-group mb-3">
               <div class="input-group-prepend">
                <span class="input-group-text">$</span>
               </div> 
               <input type="number" id="recieved-amount" class="form-control">
            </div>
            <div class="form-group">
              <label for="payment">Payment Type</label>
              <select class="form-control" id="payment-type">
                <option value="cash">Cash</option>
                <option value="credit card">Credit Card</option>
              </select>
            </div>
          
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary btn-save-payment" disabled>Save Payment</button>
          </div>
        </div>
      </div>
    </div>
</div>
