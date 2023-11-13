<div class="row">
    @foreach($menus as $menu)
        <div class="col-md-3 text-center">
            <a class="btn btn-outline-secondary btn-menu" id="id" wire:click="$dispatch('send-Id', { menu_id: {{ $menu['id'] }} })">
                <img class="img-fluid" width="1000px"  src="{{asset('menuImages')}}/{{$menu['image']}}">
                <br>
                {{$menu['name']}}
                <br>
                {{number_format($menu['price'])}}
            </a>
        </div>
    @endforeach
</div>
<script>
  
</script>