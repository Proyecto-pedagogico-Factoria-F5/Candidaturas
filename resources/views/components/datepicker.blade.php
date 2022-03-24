<form wire:submit.prevent="save">
    <div class="form-group">
        <label for="schools-select">Escoger escuela</label>
        <select class="form-control form-select" name="schools-select" aria-label="Schools select">
            <option selected disabled>Escuela</option>
            @foreach($schools as $school)
            <option value="{{$school->id}}">{{$school->nombre_escuela}}</option>
            @endforeach
        </select>
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
        <input type="text" id="datepicker" class="form-control" placeholder="YYYY-MM-DD" required>@error('fecha_de_inicio') <span class="error text-danger">{{ $message }}</span> @enderror
    </div>
    <div class="form-group">
        <label for="duración">Duración (h)</label>
        <input wire:model="duración" type="text" class="form-control" id="hours" placeholder="Duración (h)" required>@error('duración') <span class="error text-danger">{{ $message }}</span> @enderror
    </div>
    <div class="form-group">
        <label for="imagen">Imagen</label>
        <input wire:model="imagen" type="file" class="form-control" id="image" name="image" placeholder="Imagen" required>@error('imagen') <span class="error text-danger">{{ $message }}</span> @enderror
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

{{-- <script src="./node_modules/moment/moment.js"></script>
<script src="./node_modules/pikaday/pikaday.js"></script>  --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/pikaday/pikaday.js"></script>

<script>
    var picker = new Pikaday({
        field: document.getElementById('datepicker'),
        format: 'YYYY-MM-DD',
        onSelect: function() {
            var fecha = document.getElementById('datepicker');
            console.log(this.getMoment().format('YYYY-MM-DD'));
            console.log(fecha.value);
        }
    });

    function getFormData() {
        var name = document.getElementById('nombre_promo').value;
        var ubication = document.getElementById('ubication').value;
        var date = document.getElementById('datepicker').value;
        var hours = document.getElementById('hours').value;
        var img = document.getElementById('image').value;
        var code = document.getElementById('code').value;
        var url = document.getElementById('url').value;

        var formData = name + " " + ubication + " " + date + " " + hours + " " + img + " " + code + " " + url;

        console.log(formData);
        return formData;
    }

</script>
