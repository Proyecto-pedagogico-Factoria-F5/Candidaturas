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
        'first_name' =>  Candidatura::find($id)->name,
        'last_name' =>  Candidatura::find($id)->last_name,
		'email' => Candidatura::find($id)->email,
		];
	   Mail::to ($student_detail ['email'])->send(new MySendMail($student_detail));
	   
	   return 'Email has been sent';
	}
}

