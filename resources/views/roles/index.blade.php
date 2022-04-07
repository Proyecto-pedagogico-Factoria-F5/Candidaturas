@extends('layouts.app')
@section('title', __('Roles'))
@section('content')

<div class="container-fluid">
	<div>
		<h1 class="display-6 mb-5 section-title"><span class="section-title-line">Roles</span></h1>
		<div class="container cards-container">
			<div class="row justify-content-center">

				@can('create-role')
                <a class="btn btn-primary" href="{{ route('roles.create') }}">Nuevo Rol</a>
                @endcan

                <table class="table table-bordered table-sm">
                    <thead class="thead">
                        <tr> 
                            <th>Rol</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($roles as $role)
                            <tr>
                                <td>{{ $role->name }}</td>
                                <td>
                                    @can('edit-role')
                                        <a class="btn btn-primary" href="{{ route('roles.edit', $role->id) }}">Editar Rol</a>
                                    @endcan
                                    
                                    @can('delete-role')
                                        {!! Form::open(['method' => 'DELETE', 'route' => ['roles.destroy', $role->id], 'style' => 'display:inline']) !!}
                                            {!! Form::submit('Borrar', ['class' => 'btn btn-danger']) !!}
                                        {!! Form::close() !!}  
                                    @endcan                                
                                </td>
                        @endforeach
                    </tbody>
                </table>
                <div class="pagination justify-content-end">
                    {!! $roles->links() !!}
                </div>
			</div>
		</div>
	</div>
</div>

@endsection