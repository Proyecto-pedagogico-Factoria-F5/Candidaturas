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
    public function mail()
	{
		$id=1;		
	  $student_detail = [
        'nombre' =>  Candidatura::find($id)->nombre,
        'apellidos' =>  Candidatura::find($id)->apellidos,
		'email' => Candidatura::find($id)->email,
		];
	   Mail::to ($student_detail['email'])->send(new MySendMail($student_detail));
	   $id=3;
	   $student_detail = [
        'nombre' =>  Candidatura::find($id)->nombre,
        'apellidos' =>  Candidatura::find($id)->apellidos,
		'email' => Candidatura::find($id)->email,
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

