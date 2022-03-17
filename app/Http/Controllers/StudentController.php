<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\MySendMail;
use App\Models\Candidatura;

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
	   Mail::to ($student_detail ['email'])->send(new MySendMail($student_detail));
	   
	   return 'Email has been sent';
	}
}

