<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\MySendMail;
use App\Models\Admin;
use App\Models\Candidatura;
use App\Models\Promo;
use App\Models\School;

class StudentController extends Controller
{
    public function mail(/* $student_id */)
	{	
		//Falta filtrar el $student_id de los seleccionados y pasarlo como parámetro en mail()
		$student_id =3;

		$promo_id = Candidatura::find($student_id)->promo_id;
		$school_id = Promo::find($promo_id)->escuela_id;
		
		// Datos del admin de la promoción (comprobar código comentado)
				/* foreach ($promo->admins as $table_admins) {
				   $table_admins = $table_admins->pivot->admin_id; 
				   }  */
		$admin_detail = [
			'nombre_admin' => 'Carla', /*  Admin::find($table_admins)->name, */
			'email_admin' => 'factoriaf5@gmail.com' /*  Admin::find($table_admins)->email */
		];
		
		// Datos de la promoción
		$promo_detail = [
			'nombre_escuela' => School::find($school_id)->nombre_escuela,
			'nombre_promo' => Promo::find($promo_id)->nombre_promo
		];

     	// Datos del candidato
		$student_detail = [
			'nombre' => Candidatura::find($student_id)->nombre,
			'apellidos' => Candidatura::find($student_id)->apellidos,
			'email' => Candidatura::find($student_id)->email,
		];

		/* Esta parte la tiene que poder introducir Alí */
		$email_detail = [
			'titulo' => 'Título del email',
			'contenido' => 'Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum ',
			'asunto' => 'Este es el asunto del email',
		];

		// Envío del email como componente
		$mail = new MySendMail($email_detail, $promo_detail, $admin_detail, $student_detail);
		Mail::to ($student_detail['email'])->send($mail);

		// Redirección (corregir ruta cuando se compruebe que funciona)
		return 'Email enviado con éxito!! Revisa la bandeja de Mailtrap';
		// return redirect(url('/candidaturas'));
		
		}
}

