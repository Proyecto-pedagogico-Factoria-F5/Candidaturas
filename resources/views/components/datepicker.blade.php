<div class="form-group">
    <label for="start_date">Fecha de inicio<span class="required">*</span></label>
    <input wire:model="start_date" type="text" id="datepicker" class="form-control" placeholder="YYYY-MM-DD" required
        data-provide="datepicker" data-date-autoclose="true" data-date-today-highlight="true" autocomplete="off">@error('start_date') <span class="error text-danger">{{ $message }}</span> @enderror
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