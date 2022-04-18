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
                <form wire:submit.prevent="save">
                    <div class="form-group">
                        <label for="school_id">Escuela<span class="required">*</span></label>
                        <select wire:model="school_id" class="form-control form-select" name="school_id" required>
                            <option value="0">Escoger escuela...</option>
                            @foreach($schools as $school)
                            <option value="{{$school->id}}">{{$school->name}}</option>
                            @endforeach
                        </select>@error('school_id') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="name">Nombre<span class="required">*</span></label>
                        <input wire:model="name" type="text" class="form-control" id="name" placeholder="Nombre" required>@error('name') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="ubication">Localidad<span class="required">*</span></label>
                        <input wire:model="ubication" type="text" class="form-control" id="ubication" placeholder="Localidad" required>@error('ubication') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>   
                    
                    <x-datepicker wire:model="start_date" id="start_date" />

                    <div class="form-group">
                        <label for="duration">Duración (h)<span class="required">*</span></label>
                        <input wire:model="duration" type="text" class="form-control" id="hours" placeholder="Duración (h)" required>@error('duration') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="image">Imagen<span class="required">*</span></label>
                        <input wire:model="image" type="file" class="form-control" id="image" name="image" placeholder="Imagen" required>@error('image') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="code">Código<span class="required">*</span></label>
                        <input wire:model="code" type="text" class="form-control" id="code" placeholder="Código">@error('code') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="url">Url<span class="required">*</span></label>
                        <input wire:model="url" type="text" class="form-control" id="url" placeholder="Url" required>@error('url') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                </form>
                <div>
                    <span class="required">* Campos requeridos</span>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary close-btn" data-dismiss="modal">Cancelar</button>
                <button type="button" wire:click.prevent="store()" class="btn btn-primary close-modal">Guardar</button>
            </div>
        </div>
    </div>
</div>