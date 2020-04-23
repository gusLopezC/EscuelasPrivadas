<div class="main-search-input-item">
    <input wire:model="buscar" wire:keydown.enter="asignarPrimero()" type="text"
        placeholder="{{ __("Search.CityEscuela")}}" class="form-control" id="buscar">
    @error("buscar")
    <small class="form-text text-danger">{{$message}}</small>
    @else
    @if(count($ciudades)>0)
    <div class="shadow rounded px-3 pt-3 pb-0">
        @foreach($ciudades as $ciudad)
        <div style="cursor: pointer;">
            <a href="{{ route('search', ['city' => $ciudad->ciudad]) }}">
                {{ $ciudad->ciudad }}
            </a>
        </div>
        <hr>
        @endforeach
    </div>
    @endif
    @enderror
</div>
