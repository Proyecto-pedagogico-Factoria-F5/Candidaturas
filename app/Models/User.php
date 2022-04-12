<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

//spatie
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
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

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function school()
    {
        return $this->belongsToMany(School::class);
    }

    public function promo()
    {
        return $this->belongsToMany(Promo::class);
    }

    static function addToPivotTableSchoolUser($user, $school_id)
    {
        $user->school()->attach(School::getSchool($school_id['school_id']));
    }

    static function addToPivotTablePromoUser($user, $promo_id)
    {
        $user->promo()->attach(Promo::getPromo($promo_id['promo_id']));
    }

}
