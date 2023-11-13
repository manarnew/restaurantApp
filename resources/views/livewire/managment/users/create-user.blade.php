<div class="card bg-info">
    <div class="container"   style="margin-top: 10px">
        <div class="row justify-content-center">
          <div class="col-md-8">
            <i class="fas fa-plus"></i> Create user
            <hr>
            <form wire:submit="save">
             <div class="form-group"> 
                <label for="categoryName">User Name</label>
                <input type="text" wire:model="name" value="{{old('name')}}" class="form-control" placeholder="User name...">
                <div>
                    @error('name') <span class="text-danger">{{ $message }}</span> @enderror 
                </div>  
             </div>
             <div class="form-group"> 
                <label for="passwordName">Password</label>
                <input type="password" wire:model="password" value="{{old('password')}}" class="form-control" >
                <div>
                    @error('password') <span class="text-danger">{{ $message }}</span> @enderror 
                </div>  
             </div>
             <div class="form-group"> 
                <label for="emailName">Email</label>
                <input type="email" wire:model="email" value="{{old('email')}}" class="form-control" placeholder="Email...">
                <div>
                    @error('email') <span class="text-danger">{{ $message }}</span> @enderror 
                </div>  
             </div>
             <div class="form-group">
                <label for="Role">Role</label>
                <select wire:model="role" class="form-control">
                  <option value="admin">Admin</option>
                  <option value="cashier">Cashier</option>
                </select>
              </div>
              <div>
                @error('role') <span class="text-danger">{{ $message }}</span> @enderror 
            </div>
            <div class="text-center">
              <button type="submit" class="btn btn-primary" style="margin-bottom: 10px">Save</button>
            </div>
            </form>
          </div>
        </div>
      </div>
</div>
