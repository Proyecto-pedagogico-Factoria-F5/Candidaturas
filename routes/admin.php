 <?php
 use Illuminate\Support\Facades\Route;
 use Illuminate\Support\Facades\Auth;
 
 use App\Http\Controllers\HomeController;
 use App\Http\Controllers\SchoolController;
 use App\Http\Controllers\PromoController;
 use App\Http\Controllers\CandidaturaController;
 use App\Http\Controllers\UserController;

 
 Route::get('/users', [UserController::class, 'index'])->name('admin-users');


 