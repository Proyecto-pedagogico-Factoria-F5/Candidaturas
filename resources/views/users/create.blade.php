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

                <div class="card form-card">
                    {!! Form::open(array('route'=>'users.store', 'method'=>'POST')) !!}
                    <div class="card-body form-card-body">
                            <div class="row">
                                <label for="name" class="col-form-label text-md-end">{{ __('Nombre') }}<span class="required">*</span></label>
                                {!! Form::text('name', null, array('class'=>'form-control')) !!}
                            </div>
                            <div class="row">
                                <label for="email" class="col-form-label text-md-end">{{ __('Email') }}<span class="required">*</span></label>
                                {!! Form::text('email', null, array('class'=>'form-control')) !!}
                            </div>
                            <div class="row">
                                <label for="password" class="col-form-label text-md-end">{{ __('Password') }}<span class="required">*</span></label>
                                {!! Form::password('password', array('class'=>'form-control')) !!}
                            </div>
                            <div class="row">
                                <label for="confirm-password" class="col-form-label text-md-end">{{ __('Confirmar password') }}<span class="required">*</span></label>
                                {!! Form::password('confirm-password', array('class'=>'form-control')) !!}
                            </div>
                            <div class="row">
                                <label for="" class="col-form-label text-md-end">{{ __('Roles') }}<span class="required">*</span></label>
                                {!! Form::select('roles[]', $roles,[], array('class'=>'form-control')) !!}
                            </div>
                            <div class="row">
                                <label for="" class="col-form-label text-md-end">{{ __('Schools') }}<span class="required">*</span></label>
                                {!! Form::select('schools[]', $schools,[], array('class'=>'form-control', 'id'=>'school-dd')) !!}
                            </div>
                            <div class="row">
                                <button type="submit" class="btn btn-primary">Guardar</button>
                            </div>

                            <div class="row">
                                <span class="required">* Campos requeridos</span>
                            </div>
                        </div>
                        {!! Form::close() !!}
                </div>
            </div>
		</div>
	</div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <script>
        $(document).ready(function () {
            $('#school-dd').on('change', function () 
                var idSchool = this.value;
                console.log(idSchool);
                $("#promo-dd").html('');
                $.ajax(
                    url: "url('api/fetch-promos')",
                    type: "POST",
                    data: 
                        school_id: idCountry,
                        _token: 'csrf_token()'
                    ,
                    dataType: 'json',
                    success: function (result) 
                        $('#state-dd').html('<option value="">Select State</option>');
                        $.each(result.states, function (key, value) 
                            $("#state-dd").append('<option value="' + value
                                .id + '">' + value.name + '</option>');
                        );
                        $('#city-dd').html('<option value="">Select City</option>');
                    
                );
            );
          
        });
    </script>
</div>
@endsection