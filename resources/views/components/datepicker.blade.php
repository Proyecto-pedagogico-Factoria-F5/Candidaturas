<div class="form-group">
    <label for="fecha_de_inicio">Fecha de inicio</label>
    <input type="text" id="datepicker" class="form-control" required>@error('fecha_de_inicio') <span class="error text-danger">{{ $message }}</span> @enderror

    <script>
        new Pikaday({ field: document.getElementById('datepicker') })
    </script>
</div>