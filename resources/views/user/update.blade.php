<!-- Modal -->
<div wire:ignore.self class="modal fade" id="updateDataModel" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="updateDataModelLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="updateDataModelLabel">Editar perfil</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true close-btn">×</span>
                </button>
            </div>
           <div class="modal-body">
                <form wire:submit.prevent="save">
					<div class="form-group">
                        <label for="imagen">Imagen</label>
                        <input wire:model="imagen" type="file" class="form-control" id="imagen" name="image" placeholder="Imagen" required>@error('imagen') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
					<div class="form-group">
                        <label for="user-name">Nombre</label>
                        <input wire:model="user-name" type="text" class="form-control" id="user-name" placeholder="Nombre" required>@error('user-name') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
					<div class="form-group">
                        <label for="user-job">Cargo</label>
                        <input wire:model="user-job" type="text" class="form-control" id="user-job" placeholder="Nombre" required>@error('user-job') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>   
					<div class="form-group">
                        <label for="email">Email</label>
                        <input wire:model="email" type="text" class="form-control" id="email" placeholder="Email">@error('email') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div> 
					<div class="form-group">
                        <label for="born-date">Fecha de cumpleaños</label>
                        <input wire:model="born-date" type="text" class="form-control" id="born-date" placeholder="Fecha de cumpleaños" required>@error('born-date') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>             
                    <div class="form-group">
                        <label for="ubicación">Ubicación</label>
                        <input wire:model="ubicación" type="text" class="form-control" id="ubicación" placeholder="Localidad" required>@error('ubicación') <span class="error text-danger">{{ $message }}</span> @enderror
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