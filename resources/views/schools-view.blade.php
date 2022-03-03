@extends('layouts.app')
@section('title', __('Perfil'))
@section('content')

<div class="container-fluid">
	<div class="row justify-content-center">
		<div class="col-md-12">
			<h1 class="display-6 mb-5 section-title"><span class="section-title-line">Escuelas</span></h1>
			<div class="cards-container">
				@livewire('components.card-school')					
			</div>
		</div>
	</div>
</div>

@endsection