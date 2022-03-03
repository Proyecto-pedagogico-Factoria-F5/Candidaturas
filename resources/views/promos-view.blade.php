@extends('layouts.app')
@section('title', __('Perfil'))
@section('content')

<div class="container-fluid">
	<div class="row justify-content-center">
		<div class="col-md-12">
			<h5>PROMOCIONES</h5><hr>
			@livewire('components.card-promo')					
		</div>
	</div>
</div>

@endsection