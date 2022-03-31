<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
	use HasFactory;
	
    public $timestamps = true;

    protected $table = 'profiles';

    protected $fillable = [
        'name',
        'surnames',
        'email',
        'password',
        'job',
        'github',
        'birth_date',
        'image'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function user()
    {
        return $this->belongsToMany(User::class);

    }

    public function role()
    {
        return $this->belongsToMany(Role::class);
    }

    static function addToPivotTable($profile, $role_id)
    {
        // dd($profile);
        //dd($role_id['role_id']);
        $profile->role()->attach(Role::getRole($role_id['role_id']));

    }

   
   
}