<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
	use HasFactory;
	
    public $timestamps = true;

    protected $table = 'profiles';

    protected $fillable = ['nombre','email','password','teléfono','puesto','role','escuela','promo','imagen'];
	
}
