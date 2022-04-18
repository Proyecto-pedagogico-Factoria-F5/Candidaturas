@extends('layouts.app')
@section('title', __('Usuarios'))
@section('content')

<div class="container-fluid">
	<div class="row justify-content-center">
		<div class="col-md-12">
			<div class="card admin-card">
				<div class="card-header admin-card-header">
					<div style="display: flex; justify-content: space-between; align-items: center;">
						<div class="float-left">
							<h4>
								<i class="fas fa-users text-info"></i> Usuarios
							</h4>
						</div>
                        @if (session()->has('message'))
						<div wire:poll.4s class="btn btn-sm btn-success" style="margin-top:0px; margin-bottom:0px;"> {{ session('message') }} </div>
						@endif
                        <a class="btn btn-sm btn-info" href="{{ route('users.create') }}">
                            <i class="fa fa-plus"></i> Nuevo Usuario
                        </a> 
                    </div>
				</div>

                <div class="card-body admin-card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-sm">
                            <thead class="thead">
                                <tr> 
                                    <th>ID</th>
                                    <th>Nombre</th>
                                    <th>e-mail</th>
                                    <th>Rol</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($users as $user)
                                    <tr>
                                        <td>{{ $user->id }}</td>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>
                                            @if(!empty($user->getRoleNames()))
                                                @foreach($user->getRoleNames() as $rolName)
                                                    {{$rolName}}
                                                @endforeach
                                            @endif
                                        </td>
                                        <td>
                                            <a class="btn btn-primary" href="{{ route('users.edit', $user->id) }}">Editar</a>

                                            {!! Form::open(['method' => 'DELETE', 'route' => ['users.destroy', $user->id], 'style' => 'display:inline']) !!}
                                                {!! Form::submit('Borrar', ['class' => 'btn btn-danger']) !!}
                                            {!! Form::close() !!}                                  
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="pagination justify-content-end">
                        {!! $users->links() !!}
                    </div>	
                </div>
            </div>
        </div>
    </div>
</div>

@endsection