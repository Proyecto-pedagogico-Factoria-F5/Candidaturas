<!-- Modal -->
<div wire:ignore.self class="modal fade" id="createDataModal" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="createDataModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createDataModalLabel">Crear nueva promo</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true close-btn">×</span>
                </button>
            </div>
           <div class="modal-body">
				<form>
            <div class="form-group">
                <label for="nombre_promo">Nombre</label>
                <input wire:model="nombre_promo" type="text" class="form-control" id="nombre_promo" placeholder="Nombre">@error('nombre_promo') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="form-group">
                <label for="ubicación">Localidad</label>
                <input wire:model="ubicación" type="text" class="form-control" id="ubicación" placeholder="Localidad">@error('ubicación') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>
            {{-- <div class="form-group">
                <label for="escuela_id"></label>
                <input wire:model="escuela_id" type="text" class="form-control" id="escuela_id" placeholder="Escuela Id">@error('escuela_id') <span class="error text-danger">{{ $message }}</span> @enderror
            </div> --}}
            <div class="form-group">
                <label for="fecha_de_inicio">Fecha de inicio</label>
                <input wire:model="fecha_de_inicio" type="text" class="form-control" id="fecha_de_inicio" placeholder="Fecha de inicio">@error('fecha_de_inicio') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="form-group">
                <label for="duración">Duración (h)</label>
                <input wire:model="duración" type="text" class="form-control" id="duración" placeholder="Duración (h)">@error('duración') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="form-group">
                <label for="url">Url</label>
                <input wire:model="url" type="text" class="form-control" id="url" placeholder="Url">@error('url') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="form-group">
                <label for="imagen">Imagen</label>
                <input wire:model="imagen" type="text" class="form-control" id="imagen" placeholder="Imagen">@error('imagen') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>

                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary close-btn" data-dismiss="modal">Cancelar</button>
                <button type="button" wire:click.prevent="store()" class="btn btn-primary close-modal">Guardar</button>
            </div>
        </div>
    </div>
</div>
