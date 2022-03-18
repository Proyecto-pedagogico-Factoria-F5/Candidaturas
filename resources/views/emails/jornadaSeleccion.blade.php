<!DOCTYPE html>
<html>
<head>
    <title>Email Prueba</title>
</head>
<body>
    <div>
	 <p>Hola {{ $student_detail['nombre'] }} {{ $student_detail['apellidos'] }},</p>
	 <p>{{ $student_detail['email'] }}</p>
 	<p>
		¡Te invitamos a la jornada de selección!
		Has llegado a la última etapa del proceso de selección para la formación 6 meses de Desarrollo Web Fullstack.
		Te esperamos el martes  28 de septiembre de 14h a 17h  vía Zoom.
		
		Confírmanos tu participación haciendo clic al nombre de:
		Rebeca Rodríguez
		
		¡Entra aquí, a la jornada de selección!
		Imprescindible: 
		
			> Conexión a internet
			> Cámara y Audio
			> Ordenador para conectarse
		
		En caso de no poder disponer de este material, te pedimos que te pongas en contacto directo con Rebeca Rodríguez, nuestra responsable de Escuela Gijón F5.
		
		Te informamos que la fecha prevista para el comienzo de esta formación será el miércoles 6 de octubre, pero te pedimos que estés disponible el lunes 4 octubre para la presentación de la documentación en caso de confirmarse que estás selecionad@.
		Imprescindible: 

		> Conexión a internet
		> Cámara y Audio
		> Ordenador para conectarse

		En caso de no poder disponer de este material, te pedimos que te pongas en contacto directo con Rebeca Rodríguez, nuestra responsable de Escuela Gijón F5.
		Te informamos que la fecha prevista para el comienzo de esta formación será el miércoles 6 de octubre, pero te pedimos que estés disponible el lunes 4 octubre para la presentación de la documentación en caso de confirmarse que estás selecionad@.
	</p>
	 <p>Un saludo,</p>

		<img src="" alt="logo_factoria_f5.jpg">
        <p>{{ $current_school['nombre_escuela'] }}</p>
	    <p>{{ $current_promo['nombre_promo'] }}</p>
	    <p>Copyright © 2021 Factoría F5
		Todos los derechos reservados.
		Nuestra dirección de correo es:
		{{ $current_admin['email'] }}</p>
      </div>

</body>
</html>
