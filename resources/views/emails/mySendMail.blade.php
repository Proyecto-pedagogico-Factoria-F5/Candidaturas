<!DOCTYPE html>
<html>
	<head>
		<title>{{ $email_detail['titulo'] }} </title>
		<style>
			body { font-family:roboto; font-size:1rem; }
			footer { padding:4%; background-color:#FC4702; height:140px; color:white; text-align:center; }
			#contenido { padding:4%; color:#222222; font-size:1.15rem; }
			.container_left { float:left; }
			.container_right { float:right; }
			img { width:70%; }
		</style>
	</head>
	<body>
		<div>
			<div id="contenido">
				{{-- Introducción al email (datos del candidato)--}}
				<p>Hola {{ $student_detail['nombre'] }} {{ $student_detail['apellidos'] }},</p>
				{{-- Contenido del email (editable en cada caso) --}}
				<p>{{ $email_detail['contenido'] }}</p>
			</div>
			<footer>
				{{-- Parte de la firma del email (Datos del admin/perfil de promo/escuela) --}}
				<div class="container_left">
					<img src="data:image/png;base64,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" 
					alt="logo_factoria_f5.jpg">
				</div>
				<div class="container_right">
					<p>
						{{ $admin_detail['nombre_admin'] }}, administradora de la 
						promoción {{ $promo_detail['nombre_promo'] }}; 
						escuela de {{ $promo_detail['nombre_escuela'] }}
					</p>
					<p>
						Nuestra dirección de correo es:
						{{ $admin_detail['email_admin'] }}
					</p>
					<p>
						Copyright © 2021 Factoría F5
						Todos los derechos reservados.
					</p>
				</div>
			</footer>
		</div>
	</body>


</html>
