@extends('layouts.app')
@section('title', __('Promos'))
@section('content')

<div class="container-fluid">
	<div>
		<h1 class="display-6 mb-5 section-title"><span class="section-title-line">Promociones</span></h1>
		<div class="container cards-container">
			<div class="row justify-content-around gap-5">
				@livewire('components.card-promo')
			</div>
		</div>
	</div>
</div>

@endsection