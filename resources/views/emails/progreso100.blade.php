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
            ¡Enhorabuena! Has completado todos los ejercicios del proceso y queremos
            animarte a seguir completando los ejercicios.
            En caso de tener cualquier duda o pregunta, no dudes en contactarnos.
        </p>
        <p>¡Ánimo! Un saludo,</p>

		<img src="" alt="logo_factoria_f5.jpg">

            <p>{{ $promo_detail['nombre_escuela'] }}</p>
            <p>{{ $promo_detail['nombre_promo'] }}</p>
            <p>Copyright © 2021 Factoría F5
            Todos los derechos reservados.
            Nuestra dirección de correo es:
            {{ $promo_detail['email'] }}
            </p>
        </div>

</body>
</html>
