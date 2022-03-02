<div>
    <div class="card">

        <h2>{{ section_title }}</h2>
        <hr>

        <div>
            @foreach ($inputs as $input)
                @livewire ('Input', ['input_class' => $input_class], ['type' => $type], ['label' => $label]);
            @endforeach
        </div>

        <div>
            @livewire ('Button', ['btn_class' => $btn_class_accept], ['btn_name' => $btn_name_accept]);
            @livewire ('Button', ['btn_class' => $btn_class_cancel], ['btn_name' => $btn_name_cancel]);
        </div>
        
    </div>
</div>