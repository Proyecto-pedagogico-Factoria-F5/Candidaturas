<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Profile extends Model
{
	use HasFactory;
	
    public $timestamps = true;

    protected $table = 'profiles';

    protected $fillable = ['name','email','password','phone','job','role_id','escuela_id','promo','image'];
    public function user()
    {
        return $this->belongsTo(User::class);

    }
    public function role()
    {
        return $this->belongsTo(Role::class);
    }
	
	
}
