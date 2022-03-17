@section('title', __('Candidaturas'))

<div class="container-fluid">
	<div class="row justify-content-center">
		<div class="col-md-12">
			<div class="card">
				<div class="card-header">
					<div style="display: flex; justify-content: space-between; align-items: center;">
						<div class="float-left">
							<h4><i class="fab fa-laravel text-info"></i>
							Candidaturas  </h4>
						</div>
						<div wire:poll.60s>
							<code><h5>{{ now()->format('H:i:s') }} UTC</h5></code>
						</div>
						@if (session()->has('message'))
						<div wire:poll.4s class="btn btn-sm btn-success" style="margin-top:0px; margin-bottom:0px;"> {{ session('message') }} </div>
						@endif
						<div>
							<input wire:model='keyWord' type="text" class="form-control" name="search" id="search" placeholder="Buscar candidaturas">
						</div>
						<div class="btn btn-sm btn-info" data-toggle="modal" data-target="#createDataModal">
							<i class="fa fa-plus"></i> Añadir candidatura
						</div>
					</div>
				</div>
				<div class="card-body">
					@include('livewire.candidaturas.create')
					@include('livewire.candidaturas.update')
					<div class="table-responsive" wire:ignore>
						<table class="table table-bordered table-sm">
							<thead class="thead">
								<tr> 
									<th>#</th> 
									<th>Nombre</th>
									<th>Apellidos</th>
									<th>Fecha de nacimiento</th>
									<th>Nacionalidad</th>
									<th>Email</th>
									<th>Teléfono</th>
									<th>Cuenta de usuario</th>
									<th>Puntos</th>
									<th>Descripción</th>
									<th>Fecha de registro</th>
									<th>Promo id</th>
									<th>Acciones</th>
								</tr>
							</thead>
							<tbody id="tbody">

							</tbody>
							{{-- <tbody>
								@foreach($candidaturas as $row)
								<tr>
									<td>{{ $loop->iteration }}</td> 
									<td>{{ $row->nombre }}</td>
									<td>{{ $row->apellidos }}</td>
									<td>{{ $row->fecha_de_nacimiento }}</td>
									<td>{{ $row->nacionalidad }}</td>
									<td>{{ $row->email }}</td>
									<td>{{ $row->teléfono }}</td>
									<td>{{ $row->cuenta_usuario }}</td>
									<td>{{ $row->puntos }}</td>
									<td>{{ $row->descripción }}</td>
									<td>{{ $row->fecha_de_registro }}</td>
									<td>{{ $row->promo_id }}</td>
									<td width="90">
									<div class="btn-group">
										<button type="button" class="btn btn-info btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
										Acciones
										</button>
										<div class="dropdown-menu dropdown-menu-right">
											<a data-toggle="modal" data-target="#updateModal" class="dropdown-item" wire:click="edit({{$row->id}})"><i class="fa fa-edit"></i> Editar </a>							 
											<a class="dropdown-item" onclick="confirm('¿Confirmas que quieres borrar la candidatura con id {{$row->id}}? \n¡Esta acción no se puede deshacer!')||event.stopImmediatePropagation()" wire:click="destroy({{$row->id}})"><i class="fa fa-trash"></i> Borrar </a>   
										</div>
									</div>
									</td>
								@endforeach
							</tbody> --}}
						</table>						
						{{ $candidaturas->links() }}
					</div>
				</div>
			</div>
		</div>
	</div>
</div>


<script>

// FREECODECAMP

const urlFreeCodeCamp = 'https://api.freecodecamp.org/api/users/get-public-profile?username='

//const idUserFreeCodeCamp = 'fcc6d1f6012-533f-4a6f-8949-b766711c8f5a'
//const idUserFreeCodeCamp = 'fcc86accbf5-9a37-4319-8de8-498906c33515'

async function getPoints(id){

    var myHeaders = new Headers();
    myHeaders.append("Cookie", "_csrf=XgWIagMZB3DIJKmiNWw2_yBX; csrf_token=CJzGy40i-Yn-nkwiiJx3JjVtrhFBioB91v_8; connect.sid=s%3AOYbepHrYbtwH5AdlKH_z1IiVBjGdhbMo.YuGP9bE7xSFH9UMpfUx5eREwD2PWGitHqJH315CrPqo");

    var requestOptions = {
    method: 'GET',
    headers: myHeaders,
    redirect: 'follow',
    };

    let response = await fetch(urlFreeCodeCamp+id, requestOptions);
    let result = await response.json();

    let freeCodePoints = await result.entities.user[id].points;
    console.log('FreeCodeCamp: Actualmente tiene ' + freeCodePoints + ' puntos')
    return freeCodePoints;
}


// TYPEFORM

const urlTypeFormPromos = 'https://api.typeform.com/forms';

const tokenTypeForm = 'tfp_BsmM66GTu1TP1iyScqsHrXn6DWN7DcwbYjXbgDjiBtkZ_3pYMiWSoCZ2jAz';

async function getCandidatures(idPromo){

    const urlTypeFormCandidatures = 'https://api.typeform.com/forms/' + idPromo + '/responses';

    var myHeaders = new Headers();
    myHeaders.append("Authorization", "Bearer " + tokenTypeForm);

    var requestOptions = {
    method: 'GET',
    headers: myHeaders,
    redirect: 'follow'
    };

    let response = await fetch(urlTypeFormCandidatures, requestOptions);
    let result = await response.json();

    let typeFormCandidatures = await result.items;
    //console.log('TypeForm candidatos: ' + typeFormCandidatures)
    return typeFormCandidatures;
}

async function showCandidatures(){

    const idPromo = 'pY7hQ52y'  //Este dato se puede sacar de TypeForm

    const NAME = 0;
    const SURNAME = 1;
    const MAIL = 2;
    const FREECODE = 3;
    const DESCRIPTION = 4;

    let typeFormPromos = await getCandidatures(idPromo);
	
	//var freeCodeCampId;
	var freeCodeCampPoints = await getPoints('fcc86accbf5-9a37-4319-8de8-498906c33515');
	//var freeCodeCampPoints = 'fcc86accbf5-9a37-4319-8de8-498906c33515';
	
	var rowsCandidates = [];

	

	typeFormPromos.forEach(user => {   

		var row = '<tr><td></td>';
		
		user.answers.forEach(element => {  
			
			if(user.answers.indexOf(element) == NAME) {
				row += '<td>'+ element.text + '</td>';
			}    
			if(user.answers.indexOf(element) == SURNAME) {
				row+= '<td>'+ element.text + '</td>';
			}    
			if(user.answers.indexOf(element) == MAIL) {  
				row+= '<td>Fecha</td>';  
				row+= '<td>Nacionalidad</td>';    
				row+= '<td>'+ element.email + '</td>';  
			}
			if(user.answers.indexOf(element) == FREECODE) {
				row+= '<td>Teléfono</td>'; 
				row+= '<td>'+ element.text + '</td>';
				//freeCodeCampId = element.text;
			} 
			if(user.answers.indexOf(element) == DESCRIPTION) { 
				//freeCodeCampPoints = await getPoints(freeCodeCampId);
				//freeCodeCampPoints = await getPoints('fcc86accbf5-9a37-4319-8de8-498906c33515');
				row+= '<td>' + freeCodeCampPoints + '</td>'; 
				row+= '<td>'+ element.text + '</td>';
				row+= '<td>Fecha registro</td>'; 
				row+= '<td>Promo id</td>'; 
				row+= '<td>Acciones</td></tr>'; 
			} 					
		}); 

		rowsCandidates.push(row);		
    });

	$('#tbody').append(rowsCandidates);
	return rowsCandidates;
}

showCandidatures();

/* async function getRows() {
	let data = await showCandidatures();

	$('#tbody').append(data);
} */

/* let pepe = getRows();

console.log(pepe); */

/* $('#tbody').append(pepe);

 */


//setInterval(async function() {showCandidatures()},30000);

/* setInterval(function() { 
	table.ajax.reload(function(){
	$(".paginate_button > a").on("focus",function(){
	$(this).blur();
	});
	}, false);
}, 3000); */


</script>

