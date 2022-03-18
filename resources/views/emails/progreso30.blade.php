<!DOCTYPE html>
<html>
<head>
    <title>Email Prueba</title>
</head>
<body>
    <div>
        <p>Hola {{ $student_detail['nombre'] }} {{ $student_detail['apellidos'] }},</p>
        <p>
            ¡Saludos desde Factoría F5!
            Has llegado a un {{ $student_detail[puntos]}} del proceso y queremos
            animarte a seguir completando los ejercicios.
            En caso de tener cualquier duda o pregunta, no dudes en contactarnos.
        </p>
        <p>¡Ánimo! Un saludo,</p>

		<img src="" alt="logo_factoria_f5.jpg">

            <p>{{ $current_school['nombre_escuela'] }}</p>
            <p>{{ $current_promo['nombre_promo'] }}</p>
            <p>Copyright © 2021 Factoría F5
            Todos los derechos reservados.
            Nuestra dirección de correo es:
            {{ $current_admin['email'] }}
            </p>
        </div>

</body>
</html>
