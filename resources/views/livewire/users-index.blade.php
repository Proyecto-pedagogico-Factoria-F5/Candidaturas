<div>
    Prueba listado de usuarios

    <div class="card">
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Email</th>
                        <th></th>
                    </tr>
                </thead>
                <body>
                    @foreach ($users as $user)
                    <tr>
                        <td>{{$user->id}}</td>
                        <td>{{$user->name}}</td>
                        <td>{{$user->email}}</td>
                        <td width="10 px"><a class="btn btn-primary" href="{{route('admin-users', $user)}}"></a>Editar</td>
                    </tr>
                    @endforeach
                </body>
            </table>
        </div>
    </div>
</div>
