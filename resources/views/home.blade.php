@extends('layouts.app')
@section('title', __('Perfil'))
@section('content')

<div class="container-fluid">
	<div class="row justify-content-center">
		<div class="col-md-12">
			<h5>ESCUELAS</h5><hr>
			@livewire('card-school')					
		</div>
	</div>
</div>

@endsection