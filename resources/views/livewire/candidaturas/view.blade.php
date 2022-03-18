@section('title', __('Candidaturas'))

<div class="container-fluid">
	<div class="row justify-content-center">
		<div class="col-md-12">
			<div class="card admin-card">
				<div class="card-header admin-card-header">
					<div style="display: flex; justify-content: space-between; align-items: center;">
						<div class="float-left">
							<h4>
								<i class="fas fa-user-graduate text-info"></i> Candidaturas
							</h4>
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
				<div class="card-body admin-card-body">
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

/* var userPoints = [];

async function getPoints(id, i){

    var myHeaders = new Headers();
    myHeaders.append("Cookie", "_csrf=XgWIagMZB3DIJKmiNWw2_yBX; csrf_token=CJzGy40i-Yn-nkwiiJx3JjVtrhFBioB91v_8; connect.sid=s%3AOYbepHrYbtwH5AdlKH_z1IiVBjGdhbMo.YuGP9bE7xSFH9UMpfUx5eREwD2PWGitHqJH315CrPqo");

    var requestOptions = {
    method: 'GET',
    headers: myHeaders,
    redirect: 'follow',
    };

    let response = await fetch(urlFreeCodeCamp+id, requestOptions);
    let result = await response.json();

	userPoints.push(result.entities.user[id].points);

} */


var userPoints;

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

	userPoints = await result.entities.user[id].points;
    //let freeCodePoints = await result.entities.user[id].points;
    //console.log('FreeCodeCamp: Actualmente tiene ' + freeCodePoints + ' puntos')
    //return freeCodePoints;
}




// TYPEFORM

const urlTypeFormPromos = 'https://api.typeform.com/forms';
const tokenTypeForm = 'tfp_8vtaPeZuDzHFE4wfX6dpUVKGkbZxfiYwSpREdTyf9SCU_3ss54XXT7bF7yV';


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



var arrayFreeCodeIds = [];

async function getFreeCodeIds(){

	const idPromo = 'pY7hQ52y'  //Este dato se puede sacar de TypeForm
	const FREECODE = 3;

	let typeFormPromos = await getCandidatures(idPromo);

	typeFormPromos.forEach(user => {   

		user.answers.forEach(element => {  
			
			if(user.answers.indexOf(element) == FREECODE) {
				arrayFreeCodeIds.push(element.text);
			} 				
		}); 	
	});
}




async function showCandidatures(){

    const idPromo = 'pY7hQ52y'  //Este dato se puede sacar de TypeForm

    const NAME = 0;
    const SURNAME = 1;
    const MAIL = 2;
    const FREECODE = 3;
    const DESCRIPTION = 4;

    let typeFormPromos = await getCandidatures(idPromo);

	var row;
	var rowsCandidates = [];
	var contIdPoints = 0;
	
	typeFormPromos.forEach(user => {   
	
		row = '<tr><td></td>';
		
		user.answers.forEach(element => {  
					
			if(user.answers.indexOf(element) == NAME) {
				row+= '<td>'+ element.text + '</td>';
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
			} 
			if(user.answers.indexOf(element) == DESCRIPTION) { 				
				row+= '<td id="points'+contIdPoints+'">Points</td>';
				contIdPoints++;
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





/* async function pepe(){
	await getFreeCodeIds();
	luis = 0;
	
	arrayFreeCodeIds.forEach(element => {
		async function jose(){
			
			await getPoints(element, luis);
			console.log(userPoints);

			console.log('FreeCodeId '+ luis + ':' + element);
			console.log('Points user '+ luis + ':' + userPoints[luis]);
			document.getElementById('points'+luis).innerHTML=userPoints[luis];
						
			luis++;
		};
		jose();
	});

	
}
pepe(); */

async function pepe(){
	await getFreeCodeIds();
	let i=0;
	arrayFreeCodeIds.forEach(element => {
		async function jose(){
			await getPoints(element);
			console.log('FreeCodeId '+ i + ':' + element);
			console.log('Points user '+ i + ':' + userPoints);

			document.getElementById('points'+i).innerHTML=userPoints;
			i++;
		};
		jose();
	});
}
pepe();


</script>

