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
    <div class="form-group">
        <label for="start_date">Fecha de inicio<span class="required">*</span></label>
        <input wire:model="start_date" type="text" id="datepicker" class="form-control" placeholder="YYYY-MM-DD" required
            data-provide="datepicker" data-date-autoclose="true" data-date-today-highlight="true" autocomplete="off">@error('start_date') <span class="error text-danger">{{ $message }}</span> @enderror
    </div>
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
{{-- <script src="../../node_modules/moment/moment.js"></script>
<script src="../../node_modules/pikaday/pikaday.js"></script> --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/pikaday/pikaday.js"></script>
<script>
    var dateField = document.getElementById('datepicker')
    var picker = new Pikaday({
        field: dateField,
        format: 'YYYY-MM-DD',
        onSelect: function(date) {
            @this.set('start_date', moment(date).format('YYYY-MM-DD'));
        }
    });
</script>