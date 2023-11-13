<div> 
    <div class="row">
      <div class="col-12">
      <div class="container">
          <div class="row justify-content-center" style="padding-top: 10px">
            @livewire('managment.inc.sidebar')
            <div class="col-md-8 bg-white" style="padding-top: 10px">
              <i class="fas fa-align-justify"></i>Table
              @if($showCreateTable)
           
              <livewire:managment.table.create-table/>
                @endif
                @if($showEditTable)
                <livewire:managment.table.edit-table :table="$tableEdit"/>
                @endif
              <hr>
              @if (session('success'))
              <div class="alert alert-success alertSession">
                <button type="button" class="close" onclick="closeAlert()" data-dismiss="alert">X</button>
                  {{ session('success') }}
              </div>
              @endif
              @if (session('failed'))
              <div class="alert alert-danger alertSession">
                <button type="button" class="close" onclick="closeAlert()" data-dismiss="alert">X</button>
                  {{ session('failed') }}
              </div>
              @endif
              <a wire:click="showCreateTableForm()" style="margin-bottom: 10px" class="btn btn-info btn-sm float-right" ><i class="fas fa-plus"></i> Create table</a>
              <table class="table table-bordered" >
                <thead>
                  <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Table</th>
                    <th scope="col">Status</th>
                    <th scope="col">Edit</th>
                    <th scope="col">Delete</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($tables as $table)
                    <tr>
                      <th scope="row">{{$table->id}}</th>
                      <td>{{$table->name}}</td>
                      <td>{{$table->status}}</td>
                      <td>
                        <button wire:click="showEditTableForm({{$table->id}})" class="btn btn-warning">Edit</button>
                      </td>
                      <td>
                        <button wire:click="delete({{$table->id}})" class="btn btn-danger">Delete</button>
                      </td>
                    </tr>
                  @endforeach
                </tbody>
              </table>
              {{$tables->links()}}
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  