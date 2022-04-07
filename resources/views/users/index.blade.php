@extends('layouts.app')
@section('title', __('Usuarios'))
@section('content')

<div class="container-fluid">
	<div>
		<h1 class="display-6 mb-5 section-title"><span class="section-title-line">Usuarios</span></h1>
		<div class="container cards-container">
			<div class="row justify-content-center">

				<a class="btn btn-primary" href="{{ route('users.create') }}">Nuevo Usuario</a>

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
                                            <h5><span>{{$rolName}}</span></h5>
                                        @endforeach
                                    @endif
                                </td>
                                <td>
                                    <a class="btn btn-primary" href="{{ route('users.edit', $user->id) }}">Editar</a>

                                    {!! Form::open(['method' => 'DELETE', 'route' => ['users.destroy', $user->id], 'style' => 'display:inline']) !!}
                                        {!! Form::submit('Borrar', ['class' => 'btn btn-danger']) !!}
                                    {!! Form::close() !!}                                  
                                </td>
                        @endforeach
                    </tbody>
                </table>
                <div class="pagination justify-content-end">
                    {!! $users->links() !!}
                </div>	
			</div>
		</div>
	</div>
</div>

@endsection