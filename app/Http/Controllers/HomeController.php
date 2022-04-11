<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\School;
use Illuminate\Support\Facades\Auth;

//dependencias Spatie
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
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
        //$roles = Role::pluck('name', 'name')->all();
        $userRole = $user->roles->pluck('id', 'id')->all();

        $rolePermissions = DB::table('role_has_permissions')->where('role_has_permissions.role_id', $userRole)
            ->pluck('role_has_permissions.permission_id','role_has_permissions.permission_id')
            ->all();
        
        //$permission = Permission::find($rolePermissions);
       
        if (array_search(5, $rolePermissions)) {
            return view('schools-view');
        }
        else
        {
            return view('promos-view');
        }
        
    }

    // public function register()
    // {
    //     return view('auth.register');
    // }

    // public function profile()
    // {
    //     return view('user.profile');
    // }
}
