<div class="form-group">
    <label for="fecha_de_inicio">Fecha de inicio</label>
    <input type="text" id="datepicker" class="form-control" value="YYYY-MM-D" required>@error('fecha_de_inicio') <span class="error text-danger">{{ $message }}</span> @enderror

    {{-- <script src="./node_modules/moment/moment.js"></script>
    <script src="./node_modules/pikaday/pikaday.js"></script>  --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/pikaday/pikaday.js"></script>

    <script>
        var picker = new Pikaday({
            field: document.getElementById('datepicker'),
            format: 'D/M/YYYY',
            toString(date, format) {
                // you should do formatting based on the passed format,
                // but we will just return 'D/M/YYYY' for simplicity
                const day = date.getDate();
                const month = date.getMonth() + 1;
                const year = date.getFullYear();
                return `${day}/${month}/${year}`;
            },
            parse(dateString, format) {
                // dateString is the result of `toString` method
                const parts = dateString.split('/');
                const day = parseInt(parts[0], 10);
                const month = parseInt(parts[1], 10) - 1;
                const year = parseInt(parts[2], 10);
                return new Date(year, month, day);
            }
        });
    </script>
</div>