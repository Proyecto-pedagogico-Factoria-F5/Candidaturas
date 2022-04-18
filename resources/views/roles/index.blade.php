@extends('layouts.app')
@section('title', __('Roles'))
@section('content')

<div class="container-fluid">
	<div class="row justify-content-center">
		<div class="col-md-12">
			<div class="card admin-card">
				<div class="card-header admin-card-header">
					<div style="display: flex; justify-content: space-between; align-items: center;">
						<div class="float-left">
							<h4>
								<i class="fas fa-key text-info"></i> Roles
							</h4>
						</div>
                        @if (session()->has('message'))
						<div wire:poll.4s class="btn btn-sm btn-success" style="margin-top:0px; margin-bottom:0px;"> {{ session('message') }} </div>
						@endif
                        @can('create-role')
                        <a class="btn btn-sm btn-info" href="{{ route('roles.create') }}">
                            <i class="fa fa-plus"></i> Nuevo rol
                        </a> 
                        @endcan
                    </div>
				</div>

                <div class="card-body admin-card-body">
                    <div class="table-responsive">
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
                    </div>
                    <div class="pagination justify-content-end">
                        {!! $roles->links() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection