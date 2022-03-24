<!-- Modal -->
<div wire:ignore.self class="modal fade" id="createDataModal" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="createDataModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createDataModalLabel">Crear nuevo rol</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true close-btn">×</span>
                </button>
            </div>
           <div class="modal-body">
				<form>
                    <div class="form-group">
                        <label for="superadmin"></label>
                        <input wire:model="superadmin" type="text" class="form-control" id="superadmin" placeholder="Superadmin">@error('superadmin') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                     <div class="form-group">
                        <label for="regional"></label>
                        <input wire:model="regional" type="text" class="form-control" id="regional" placeholder="Regional">@error('regional') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="provincial"></label>
                        <input wire:model="provincial" type="text" class="form-control" id="provincial" placeholder="Provincial">@error('provincial') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="local"></label>
                        <input wire:model="local" type="text" class="form-control" id="local" placeholder="Local">@error('local') <span class="error text-danger">{{ $message }}</span> @enderror
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
