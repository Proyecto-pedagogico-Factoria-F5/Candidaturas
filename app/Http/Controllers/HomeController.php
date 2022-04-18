<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\School;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

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
        $user = Auth::user();
        //$userSchool = $user->location;
        $userRole = $user->roles->pluck('id', 'id')->all();

        $rolePermissions = DB::table('role_has_permissions')->where('role_has_permissions.role_id', $userRole)
            ->pluck('role_has_permissions.permission_id','role_has_permissions.permission_id')
            ->all();
       
        if (array_search(9, $rolePermissions)) {
            return view('schools-view');
        }
        else
        {
            $school = [];
            return view('promos-view', compact('school'));
        }
    }
}