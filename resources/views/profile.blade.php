@extends('layouts.app')
@section('title', __('Mi perfil'))
@section('content')

<div class="container-fluid">
	<div>
		<h1 class="display-6 mb-5 section-title"><span class="section-title-line">Mi perfil</span></h1>
		<div class="container cards-container">
			<div class="row justify-content-around gap-5">
                <div class="col-md-12">
                    ¡Hola, {{ Auth::user()->name }}!
                </div>
			</div>
		</div>
	</div>
</div>

@endsection