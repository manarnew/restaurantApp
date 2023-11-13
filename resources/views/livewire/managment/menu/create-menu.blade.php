<div class="card bg-info">
    <div class="container" style="margin-top: 10px">
        <div class="row justify-content-center">
          <div class="col-md-8">
            <i class="fas fa-hamburger"></i>Create a Menu
            <hr>
            <form wire:submit="save">
              @csrf
              <div class="form-group">
                <label for="menuName">Menu Name</label>
                <input type="text" wire:model="name" value="{{old('name')}}" class="form-control" placeholder="Menu...">
                <div>
                    @error('name') <span class="text-danger">{{ $message }}</span> @enderror 
                </div>   
            </div>
              <label for="menuPrice">Price</label>
              <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <span class="input-group-text">$</span>
                </div>
                <input type="text" wire:model="price" value="{{old('price')}}" class="form-control" aria-label="Amount (to the nearest dollor)">
                <div class="input-group-append">
                <span class="input-group-text">.00</span>
                </div>
            </div>
            <div>
                @error('price') <span class="text-danger">{{ $message }}</span> @enderror 
            </div> 
            @if ($image) 
            <img src="{{ $image->temporaryUrl() }}">
        @endif
              <label for="MenuImage">Image</label>
              <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <span class="input-group-text">Upload</span>
                </div>
                <div class="custom-file">
                  <input type="file" wire:model="image" value="{{old('image')}}" class="custom-file-input" id="inputGroupFile01">
                  <label class="custom-file-label" for="inputGroupFile01">Choose File</label>            
                </div>
                <div>
                    @error('image') <span class="text-danger">{{ $message }}</span> @enderror 
                </div>  
            </div>
    
              <div class="form-group">
                <label for="Description">Description</label>
                <input type="text" wire:model="description" value="{{old('description')}}" class="form-control" placeholder="Description...">
            </div>
            <div>
              @error('description') <span class="text-danger">{{ $message }}</span> @enderror 
          </div> 
              <div class="form-group">
                <label for="Category">Category</label>
                <select class="form-control" wire:model="category_id" value="{{old('category_id')}}">
                  <option value="">select category</option>
                  @foreach ($categories as $category)
                    <option value="{{$category->id}}">{{$category->name}}</option>
                  @endforeach
                </select>
                <div>
                    @error('category_id') <span class="text-danger">{{ $message }}</span> @enderror 
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
