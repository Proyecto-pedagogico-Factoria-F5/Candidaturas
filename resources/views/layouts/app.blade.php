<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <x-head />
</head>
<body>
    <div id="app">
        <x-header />

        <main>
            @yield('content')
        </main>

        <x-footer />
    </div>
</body>
</html>
