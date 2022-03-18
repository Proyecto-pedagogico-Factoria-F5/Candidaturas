<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\MySendMail;
use App\Models\Candidatura;
use App\Models\Promo;
use App\Models\School;

class StudentController extends Controller
{
    public function mail($current_promo_id, $id)
	{
        //Comprobar si funciona el filtrado de datos	
		$student_detail = [
			'nombre' => Candidatura::find($id)->nombre,
			'apellidos' => Candidatura::find($id)->apellidos,
			'email' => Candidatura::find($id)->email,
		];
		
		$current_promo = Promo::find($id);
		$current_school_id = Promo::where('id', $current_promo_id)->escuela_id;
		
		foreach ($promo->admins as $table_admins) { 
			$table_admins = $table_admins->pivot->admin_id;
        } 
		
		$admin_name = Admin::find($table_admins)->name;
		$admin_email = Admin::find($table_admins)->email;

		$promo_detail = [
			'nombre_escuela' => School::where('id', $current_school_id)->nombre_escuela,
			'nombre_promo' => Promo::where('id', $current_promo_id)->nombre_promo,
			'email' => Admin::find($current_promo_id)->email,
		];

		$mail = new MySendMail($student_detail);
		Mail::to ($student_detail['email'])->send($mail);
		return 'Email has been sent';
		
		}
}

