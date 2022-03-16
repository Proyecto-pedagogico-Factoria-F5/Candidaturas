<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\MySendMail;

class StudentController extends Controller
{
    public function mail()
	{
	 $student_detail = [
        'first_name' => 'test',
        'last_name' => 'xyz',
        'address' => 'test xyz'
		];
	   Mail::to('test@gmail.com')->send(new MySendMail($student_detail));
	   
	   return 'Email has been sent';
	}
}

