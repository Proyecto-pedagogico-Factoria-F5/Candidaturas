@extends('layouts.app')
@section('title', __('Escuelas'))
@section('content')

<div class="container-fluid">
	<h1 class="display-6 mb-5 section-title"><span class="section-title-line">Escuelas</span></h1>
	<div class="col">
		@livewire('components.card-school')					
	</div> 
</div>

@endsection