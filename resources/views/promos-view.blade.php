@extends('layouts.app')
@section('title', __('Promos'))
@section('content')

<div class="container-fluid">
	<div>
		<h1 class="display-6 mb-5 section-title"><span class="section-title-line">Promociones</span></h1>
		<div class="row gap-5 btn-row">
			@can('create-promo')
			<div class="btn btn-sm btn-info" data-toggle="modal" data-target="#updateDataModal">
				<a href="{{ url('/promos-admin') }}">
					<i class="fas fa-edit text-info"></i> Administrar promos
				</a>
			</div>
			@endcan
		</div>
		<div class="container cards-container">
			<div class="row justify-content-center">
				@if(!$school == null)
					@livewire('components.card-promo', ["idSchool" => $school[0]->id])
				@else
					@livewire('components.card-promo')
				
				@endif
				
			</div>
		</div>
	</div>
</div>

@endsection