<div> 
    <div class="row">
      <div class="col-12">
      <div class="container">
          <div class="row justify-content-center" style="padding-top: 10px">
            @livewire('managment.inc.sidebar')
            <div class="col-md-8 bg-white" style="padding-top: 10px">
              <i class="fas fa-align-justify"></i>Category
              @if($showCreateCat)
           
              <livewire:managment.category.create-category />
                @endif
                @if($showEditCat)
                <livewire:managment.category.edit :cat="$catEdit"/>
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
              <a wire:click="showCreateCatForm()" style="margin-bottom: 10px" class="btn btn-info btn-sm float-right" ><i class="fas fa-plus"></i> Create Category</a>
              <table class="table table-bordered" >
                <thead>
                  <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Category</th>
                    <th scope="col">Edit</th>
                    <th scope="col">Delete</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($categories as $category)
                    <tr>
                      <th scope="row">{{$category->id}}</th>
                      <td>{{$category->name}}</td>
                      <td>
                        <button wire:click="showEditCatForm({{$category->id}})" class="btn btn-warning">Edit</button>
                      </td>
                      <td>
                        <button wire:click="delete({{$category->id}})" class="btn btn-danger">Delete</button>
                      </td>
                    </tr>
                  @endforeach
                </tbody>
              </table>
              {{$categories->links()}}
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  