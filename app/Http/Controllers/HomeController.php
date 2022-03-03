<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\School;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $schools = School::all();
        return view('home', ['schools' => $schools]);
    }

    public function register()
    {
        return view('auth.register');
    }
}
