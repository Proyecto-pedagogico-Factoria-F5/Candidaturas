@extends('layouts.app')
@section('title', __('Crear promo'))
@section('content')

<div class="container-fluid">
	<div>
		<h1 class="display-6 mb-5 section-title"><span class="section-title-line">Crear promo</span></h1>
		<div class="container create-container">
			<form wire:submit.prevent="save">
                <div class="form-group">
                    <label for="schools-select">Escoger escuela</label>
                    <select class="form-control form-select" name="schools-select" aria-label="Schools select">
                        <option selected disabled>Escuela</option>
                        <option value="escuela1">Asturias</option>
                        <option value="escuela2">Barcelona</option>
                        <option value="escuela3">Bilbao</option>
                        <option value="escuela4">Madrid</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="escuela_id"></label>
                    <input wire:model="escuela_id" type="text" class="form-control" id="escuela_id" placeholder="Escuela Id">@error('escuela_id') <span class="error text-danger">{{ $message }}</span> @enderror
                </div>
                <div class="form-group">
                    <label for="nombre_promo">Nombre</label>
                    <input wire:model="nombre_promo" type="text" class="form-control" id="nombre_promo" placeholder="Nombre" required>@error('nombre_promo') <span class="error text-danger">{{ $message }}</span> @enderror
                </div>
                <div class="form-group">
                    <label for="ubicación">Localidad</label>
                    <input wire:model="ubicación" type="text" class="form-control" id="ubicación" placeholder="Localidad" required>@error('ubicación') <span class="error text-danger">{{ $message }}</span> @enderror
                </div>
                    
                <x-datepicker wire:model="date" id="date" />

                <div class="form-group">
                    <label for="duración">Duración (h)</label>
                    <input wire:model="duración" type="text" class="form-control" id="duración" placeholder="Duración (h)" required>@error('duración') <span class="error text-danger">{{ $message }}</span> @enderror
                </div>
                <div class="form-group">
                    <label for="imagen">Imagen</label>
                    <input wire:model="imagen" type="file" class="form-control" id="imagen" name="image" placeholder="Imagen" required>@error('imagen') <span class="error text-danger">{{ $message }}</span> @enderror
                </div>
                <div class="form-group">
                    <label for="código">Código</label>
                    <input wire:model="código" type="text" class="form-control" id="código" placeholder="Código">@error('código') <span class="error text-danger">{{ $message }}</span> @enderror
                </div>
                <div class="form-group">
                    <label for="url">Url</label>
                    <input wire:model="url" type="text" class="form-control" id="url" placeholder="Url" required>@error('url') <span class="error text-danger">{{ $message }}</span> @enderror
                </div>

                <button type="button" class="btn btn-secondary close-btn" data-dismiss="modal">Cancelar</button>
                <button type="button" wire:click.prevent="store()" class="btn btn-primary close-modal">Guardar</button>
            </form>
		</div>
	</div>
</div>

<script src="https://cdn.jsdelivr.net/npm/pikaday/pikaday.js"></script>
<script>
    new Pikaday({ field: document.getElementById('datepicker') })
</script>

@endsection