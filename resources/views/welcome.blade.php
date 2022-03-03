@extends('layouts.app')
@section('title', __('Welcome'))
@section('content')
<div class="container-fluid">
<div class="row justify-content-center">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header"><h5><span class="text-center fa fa-home"></span> @yield('title')</h5></div>
            <div class="card-body">
              <h5>  
            @guest
				
				{{ __('Te damos la bienvenida a ') }} {{ config('app.name') }} !!! </br>
				Por favor contacta con tu administrador para recibir tus credenciales o inicia sesión para acceder a tu perfil.
                
			@else
					¡Hola, {{ Auth::user()->name }}!
            @endif	
				</h5>
            </div>
        </div>
    </div>
</div>
</div>
@endsection