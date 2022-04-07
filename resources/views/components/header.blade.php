<nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
    <div class="container header-container">
        <a class="navbar-brand" href="{{ url('/') }}">
            {{ config('app.name') }}
        </a>
        
        <livewire:nav />
        {{-- @livewire('nav') // Old version --}}
    </div>
</nav>