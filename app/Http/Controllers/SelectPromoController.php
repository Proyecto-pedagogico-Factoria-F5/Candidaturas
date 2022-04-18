<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Validator;
use Response;
use Redirect;
use App\Models\School;
use App\Models\Promo;

class SelectPromoController extends Controller
{
    public function index()
    {
        $data['schools'] = School::get(["name", "id"]);
        return view('welcome', $data);
    }
        

    public function fetchPromo(Request $request)
    {
        $data['promos'] = Promo::where("country_id",$request->country_id)->get(["name", "id"]);
        return response()->json($data);
    }
    
}
