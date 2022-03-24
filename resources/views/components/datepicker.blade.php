<form wire:submit.prevent="save">
    <div class="form-group">
        <label for="schools-select">Escoger escuela</label>
        {{-- <select wire:model="escuela_id" class="form-control form-select" name="schools-select" aria-label="Schools select" required>@error('escuela_id') <span class="error text-danger">{{ $message }}</span> @enderror
            <option selected disabled>Escuela</option>
            @foreach($schools as $school)
            <option value="{{$school->id}}">{{$school->nombre_escuela}}</option>
            @endforeach
        </select> --}}
        <input wire:model="escuela_id" type="text" class="form-control" id="escuela_id" placeholder="Escuela id" required>@error('escuela_id') <span class="error text-danger">{{ $message }}</span> @enderror
    </div>
    <div class="form-group">
        <label for="nombre_promo">Nombre</label>
        <input wire:model="nombre_promo" type="text" class="form-control" id="nombre_promo" placeholder="Nombre" required>@error('nombre_promo') <span class="error text-danger">{{ $message }}</span> @enderror
    </div>
    <div class="form-group">
        <label for="ubicación">Localidad</label>
        <input wire:model="ubicación" type="text" class="form-control" id="ubication" placeholder="Localidad" required>@error('ubicación') <span class="error text-danger">{{ $message }}</span> @enderror
    </div>   
    <div class="form-group">
        <label for="fecha_de_inicio">Fecha de inicio</label>
        <input wire:model="fecha_de_inicio" type="text" id="datepicker" class="form-control" placeholder="YYYY-MM-DD" required>@error('fecha_de_inicio') <span class="error text-danger">{{ $message }}</span> @enderror
    </div>
    <div class="form-group">
        <label for="duración">Duración (h)</label>
        <input wire:model="duración" type="text" class="form-control" id="hours" placeholder="Duración (h)" required>@error('duración') <span class="error text-danger">{{ $message }}</span> @enderror
    </div>
    <div class="form-group">
        <label for="imagen">Imagen</label>
        <input wire:model="imagen" type="file" class="form-control" id="imagen" name="imagen" placeholder="Imagen" required>@error('imagen') <span class="error text-danger">{{ $message }}</span> @enderror
    </div>
    <div class="form-group">
        <label for="código">Código</label>
        <input wire:model="código" type="text" class="form-control" id="code" placeholder="Código">@error('código') <span class="error text-danger">{{ $message }}</span> @enderror
    </div>
    <div class="form-group">
        <label for="url">Url</label>
        <input wire:model="url" onclick="getFormData()" type="text" class="form-control" id="url" placeholder="Url" required>@error('url') <span class="error text-danger">{{ $message }}</span> @enderror
    </div>
</form>
