@extends('layouts.app')
@section('title', __('Usuarios'))
@section('content')

<div class="container-fluid">
	<div>
		<h1 class="display-6 mb-5 section-title"><span class="section-title-line">Alta Nuevo Usuario</span></h1>
		<div class="container cards-container">
		    <div class="row justify-content-center">
            
                @if ($errors->any())
                <div class="alert alert-dark alert-dismissible fade show" role="alert">
                <strong>Revise los campos</strong>
                    @foreach ($errors->all() as $error)
                        <span class="badge badge-danger">{{$error}}</span>
                    @endforeach
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">$times;</span>
                    </button>
                </div>
                @endif

                {!! Form::model($user, ['route'=>['users.update', $user->id], 'method'=>'PUT']) !!}

                <div class="card-body">
                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Nombre') }}</label>
                            {!! Form::text('name', null, array('class'=>'form-control')) !!}
                        </div>
                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email') }}</label>
                            {!! Form::text('email', null, array('class'=>'form-control')) !!}
                        </div>
                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>
                            {!! Form::password('password', array('class'=>'form-control')) !!}
                        </div>
                        <div class="row mb-3">
                            <label for="confirm-password" class="col-md-4 col-form-label text-md-end">{{ __('Confirmar password') }}</label>
                            {!! Form::password('confirm-password', array('class'=>'form-control')) !!}
                        </div>
                        <div class="row mb-3">
                            <label for="" class="col-md-4 col-form-label text-md-end">{{ __('Roles') }}</label>
                            {!! Form::select('roles[]', $roles,$userRole, array('class'=>'form-control')) !!}
                        </div>
                        <div class="row mb-3">
                            <button type="submit" class="btn btn-primary">Guardar</button>
                        </div>
                </div>

                {!! Form::close() !!}

		    </div>
		</div>
	</div>
</div>

@endsection