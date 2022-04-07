@extends('layouts.app')
@section('title', __('Roles'))
@section('content')

<div class="container-fluid">
	<div>
		<h1 class="display-6 mb-5 section-title"><span class="section-title-line">Editar Rol</span></h1>
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

                {!! Form::model($role, ['route'=>['roles.update', $role->id], 'method'=>'PUT']) !!}

                <div class="card-body">
                        <div class="row mb-3">
                            <label for="name">{{ __('Nombre del Rol') }}</label>
                            {!! Form::text('name', null, array('class'=>'form-control')) !!}
                        </div>
                        <div>
                            <label for="">{{ __('Permisos del Rol') }}</label>
                            <br/>
                            @foreach($permission as $value)
                                {!! Form::checkbox('permission[]', $value->id, in_array($value->id, $rolePermissions), array('class'=>'form-check-input')) !!}
                                <label>{{ $value->name }}</label>                                    
                                <br/>
                            @endforeach
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
