@extends('layouts.app')
@section('title', __('Mi perfil'))
@section('content')

<div class="container-fluid">
	<div>
		<h1 class="display-6 mb-5 section-title"><span class="section-title-line">Mi perfil</span></h1>
		<div class="container profile-container">
			<div class="row gap-5 btn-row">
				{{-- <a href="{{ url('/edit-profile') }}" type="button" class="btn btn-custom btn-edit" value="add_masterclass"> --}}
				{{-- <a data-toggle="modal" data-target="#updateModal" class="dropdown-item" wire:click="edit({{$row->id}})"><i class="fa fa-edit"></i> Editar </a>					 --}}
				{{-- <a data-toggle="modal" data-target="#updateModal" class="dropdown-item" wire:click="edit({{ Auth::user()->id }})">
					<i class="fas fa-edit"></i> Editar perfil
				</a> --}}
				<div class="btn btn-sm btn-info" data-toggle="modal" data-target="#updateDataModal">
					<i class="fa fa-plus"></i>  Editar perfil
				</div>
			</div>
			<div class="row justify-content-around gap-5">
                <div class="col-md-12">
					<div class="card profile-card">
						<div class="card-img">
							<img src="https://media-exp1.licdn.com/dms/image/C4D03AQGgAtKInE1szQ/profile-displayphoto-shrink_200_200/0/1623940131987?e=1652313600&v=beta&t=sKUCQT6_ApvGMPI7zayj5xdgfI8YEYyaPkJ-Ubcsdb4" class="card-img-top" alt="Profile image">
						</div>

						<div class="card-body">
							<div class="user-title">
								<div class="user-name">
									<h4 class="card-title">{{ Auth::user()->name }}</h4>
								</div>
								<div class="user-job">
									Co-formadora Asturias F5
								</div>
								{{-- <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p> --}}
							</div>

							<div class="user-info">
								<div class="user-email">
									<a href="mailto:carla.alvarez@factoriaf5.org">
										<i class="fas fa-envelope text-info"></i> carla.alvarez@factoriaf5.org
									</a>
								</div>
								<div class="user-birthday">
									<i class="fas fa-birthday-cake text-info"></i> 31 de mayo
								</div>
								<div class="user-location">
									<small><cite title="Gijón, Asturias"><i class="fas fa-map-marker-alt text-info"></i> Gijón, Asturias</cite></small>
								</div>
							</div>
						</div>
					</div>
                </div>
			</div>
		</div>
	</div>
</div>

@endsection