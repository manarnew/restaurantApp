<div> 
    <div class="row">
      <div class="col-12">
      <div class="container">
          <div class="row justify-content-center" style="padding-top: 10px">
            @livewire('managment.inc.sidebar')
            <div class="col-md-8 bg-white" style="padding-top: 10px;margin-bottom: 15px">
              <i class="fas fa-align-justify"></i>Menu
              @if($showCreateMenu)
              <livewire:managment.menu.create-menu/>
                @endif
                @if($showEditMenu)
                <livewire:managment.menu.edit-menu :menu="$menuEdit"/>
                @endif
              <hr>
              @if (session('success'))
              <div class="alert alert-success alertSession" id="alertSession">
                <button type="button" class="close" onclick="closeAlert()" data-dismiss="alert">X</button>
                  {{ session('success') }}
              </div>
              @endif
              @if (session('failed'))
              <div class="alert alert-danger alertSession" id="alertSession">
                <button type="button" class="close" onclick="closeAlert()" data-dismiss="alert">X</button>
                  {{ session('failed') }}
              </div>
              @endif
              <a wire:click="showCreateMenuForm()" style="margin-bottom: 10px" class="btn btn-info btn-sm float-right" ><i class="fas fa-plus"></i> Create menu</a>
              <table class="table table-bordered" >
                <thead>
                  <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Name</th>
                    <th scope="col">Price</th>
                    <th scope="col">Picture</th>
                    <th scope="col">Description</th>
                    <th scope="col">Category</th>
                    <th scope="col">Edit</th>
                    <th scope="col">Delete</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach($menus as $menu)
              <tr>
                <td>{{$menu->id}}</td>
                <td>{{$menu->name}}</td>
                <td>{{$menu->price}}</td>
                <td>
                  <img src="{{asset('menuImages')}}/{{$menu->image}}" alt="{{$menu->name}}" width="120px" height="120px" class="img-thumbnail">
                </td>
                <td>{{$menu->description}}</td>
                <td>{{$menu->category->name}}</td>
                <td><a wire:click="showEidtMenuForm({{$menu->id}})" class="btn btn-warning">Edit</a></td>
                <td>
                    <button wire:click="delete({{$menu->id}})" class="btn btn-danger">Delete</button>
                </td>
              </tr>
            @endforeach 
                </tbody>
              </table>
              {{$menus->links()}}
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  