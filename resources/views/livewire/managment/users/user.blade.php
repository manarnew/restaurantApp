<div> 
    <div class="row">
      <div class="col-12">
      <div class="container">
          <div class="row justify-content-center" style="padding-top: 10px">
            @livewire('managment.inc.sidebar')
            <div class="col-md-8 bg-white" style="padding-top: 10px">
              <i class="fas fa-align-justify"></i>users
              @if($showCreateUser)
              <livewire:managment.users.create-user/>
                @endif
                @if($showEditUser)
                <livewire:managment.users.edit-user :user="$userEdit"/>
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
              <a wire:click="showCreateUserForm()" style="margin-bottom: 10px" class="btn btn-info btn-sm float-right" ><i class="fas fa-plus"></i> Create user</a>
              <table class="table table-bordered" >
                <thead>
                  <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Name</th>
                    <th scope="col">Role</th>
                    <th scope="col">Email</th>
                    <th scope="col">Edit</th>
                    <th scope="col">Delete</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach($users as $user)
              <tr>
                <td>{{$user->id}}</td>
                <td>{{$user->name}}</td>
                <td>{{$user->role}}</td>
                <td>{{$user->email}}</td>
                <td><a wire:click="showEidtUserForm({{$user->id}})" class="btn btn-warning">Edit</a></td>
                <td>
                    <button wire:click="delete({{$user->id}})" class="btn btn-danger">Delete</button>
                </td>
              </tr>
            @endforeach 
                </tbody>
              </table>
              {{$users->links()}}
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  