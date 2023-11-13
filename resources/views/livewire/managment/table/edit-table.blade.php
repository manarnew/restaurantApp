<div class="card bg-info">
    <div class="container"   style="margin-top: 10px">
        <div class="row justify-content-center">
          <div class="col-md-8">
            <i class="fas fa-edit"></i>Edit a table
            <hr>
            <form wire:submit="save">
              <div class="form-group">
                <label for="tableName">table Name</label>
                <input type="text" wire:model="name"  class="form-control" placeholder="table...">
                <div>
                  @error('name') <span class="text-danger">{{ $message }}</span> @enderror 
              </div> 
              </div>
              <div class="text-center">
              <button type="submit" class="btn btn-primary" style="margin-bottom: 10px">Update</button>
              </div>
            </form>
          </div>
        </div>
      </div>
</div>
