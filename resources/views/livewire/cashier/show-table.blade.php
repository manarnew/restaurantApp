<div class="row" style="padding-top: 10px">
    @foreach($tables as $table)
        <div class="col-md-2 mb-4" wire:key="{{ $table->id }}" >
        <button wire:click="selectedTable({{$table->id}})" class="btn btn-primary btn-table">
        <img class="img-fluid" src="{{asset("images")}}/table.svg"/>
        <br>
        @if($table->status == "available")
            <span class="badge badge-success">{{$table->name}}</span>
        @else 
            <span class="badge badge-danger">{{$table->name}}</span>
        @endif
        </button>
        </div>
    @endforeach
</div>
