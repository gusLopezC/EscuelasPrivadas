<div class="main-search-input-item">
    <input wire:model="buscar" wire:keydown.enter="asignarPrimero()" type="text"
    placeholder="{{ __("Search.NameEscuela")}}" class="form-control" id="buscar">
    @error("buscar")
    <small class="form-text text-danger">{{$message}}</small>
    @else
    @if(count($usuarios)>0)
    <div class="shadow">
        @foreach($usuarios as $usuario)
        <div style="cursor: pointer;">
            <a href="school/{{ $usuario->slug}}">
                {{ $usuario->name }}
            </a>
        </div>
        <hr>
        @endforeach
    </div>
    @endif
    @enderror
</div>
