<!-- Modal -->
<div wire:ignore.self class="modal fade" id="updateModal" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="updateModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
       <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="updateModalLabel">Editar perfil</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span wire:click.prevent="cancel()" aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
					<input type="hidden" wire:model="selected_id">
                    <div class="form-group">
                        <label for="name">Nombre</label>
                        <input wire:model="name" type="text" class="form-control" id="name" placeholder="Nombre">@error('name') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="surnames">Apellidos</label>
                        <input wire:model="surnames" type="text" class="form-control" id="surnames" placeholder="Apellidos">@error('surnames') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input wire:model="email" type="text" class="form-control" id="email" placeholder="Email">@error('email') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="password">Contraseña</label>
                        <input wire:model="password" type="password" class="form-control" id="password" placeholder="Password">@error('password') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                     {{-- <div class="form-group">
                        <label for="escuela">Escuela</label>
                        <input wire:model="escuela" type="text" class="form-control" id="escuela" placeholder="Escuela">@error('escuela') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div> --}}
                    <div class="form-group">
                        <label for="school_id">Escuela</label>
                        <select wire:model="school_id" class="form-control form-select" name="school_id" required>
                            <option value="0">Escoger escuela...</option>
                            @foreach($schools as $school)
                            <option value="{{$school->id}}">{{$school->name}}</option>
                            @endforeach
                        </select>@error('school_id') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    {{-- <div class="form-group">
                        <label for="promo">Promo</label>
                        <input wire:model="promo" type="text" class="form-control" id="promo" placeholder="Promo">@error('promo') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div> --}}
                    <div class="form-group">
                        <label for="promo_id">Promo</label>
                        <select wire:model="promo_id" class="form-control form-select" name="promo_id" required>
                            <option value="0">Escoger promo...</option>
                            @foreach($promos as $promo)
                            <option value="{{$promo->id}}">{{$promo->name}}</option>
                            @endforeach
                        </select>@error('promo_id') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    {{-- <div class="form-group">
                        <label for="role_id"></label>
                        <input wire:model="role_id" type="text" class="form-control" id="role_id" placeholder="Role">@error('role_id') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div> --}}
                    <div class="form-group">
                        <label for="role_id">Rol</label>
                        <select wire:model="role_id" class="form-control form-select" name="role_id" required>
                            <option value="0">Escoger rol...</option>
                            @foreach($roles as $role)
                            <option value="{{$role->id}}">{{$role->name}}</option>
                            @endforeach
                        </select>@error('role_id') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="job">Puesto</label>
                        <input wire:model="job" type="text" class="form-control" id="job" placeholder="Puesto">@error('job') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="github">GitHub</label>
                        <input wire:model="github" type="text" class="form-control" id="github" placeholder="GitHub">@error('github') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="birth_date">Fecha de cumpleaños</label>
                        <input wire:model="birth_date" type="text" class="form-control" id="birth_date" placeholder="YYYY-MM-D">@error('birth_date') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    {{-- <div class="form-group">
                        <label for="imagen"></label>
                        <input wire:model="imagen" type="text" class="form-control" id="imagen" placeholder="Imagen">@error('imagen') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div> --}}
                    <div class="form-group">
                        <label for="image">Imagen</label>
                        <input wire:model="image" type="file" class="form-control" id="image" name="image" placeholder="Imagen" required>@error('image') <span class="error text-danger">{{ $message }}</span> @enderror
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
