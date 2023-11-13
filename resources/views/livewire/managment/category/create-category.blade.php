<div class="card bg-info">
    <div class="container"   style="margin-top: 10px">
        <div class="row justify-content-center">
          <div class="col-md-8">
            <i class="fas fa-plus"></i> Create category
            <hr>
            <form wire:submit="save">
              <div class="form-group">
                <label for="categoryName">Category Name</label>
                <input type="text" wire:model="name" value="{{old('name')}}" class="form-control" placeholder="Category name...">
                <div>
                    @error('name') <span class="text-danger">{{ $message }}</span> @enderror 
                </div>  
            </div>
            <div class="text-center">
              <button type="submit" class="btn btn-primary" style="margin-bottom: 10px">Save</button>
            </div>
            </form>
          </div>
        </div>
      </div>
</div>
