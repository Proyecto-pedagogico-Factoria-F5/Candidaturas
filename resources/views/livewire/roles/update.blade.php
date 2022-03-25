<!-- Modal -->
<div wire:ignore.self class="modal fade" id="updateModal" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="updateModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
       <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="updateModalLabel">Editar rol</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span wire:click.prevent="cancel()" aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
					<input type="hidden" wire:model="selected_id">
                    
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
                <button type="button" wire:click.prevent="cancel()" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                <button type="button" wire:click.prevent="update()" class="btn btn-primary" data-dismiss="modal">Guardar</button>
            </div>
       </div>
    </div>
</div>
