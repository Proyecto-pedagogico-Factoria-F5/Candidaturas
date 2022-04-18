<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Promo extends Model
{
	use HasFactory;
	
    public $timestamps = true;

    protected $table = 'promos';

    protected $fillable = [
        'name',
        'ubication',
        'start_date',
        'duration',
        'image',
        'url',
        'code'
    ];

    public function user()
    {
        return $this->belongsToMany(User::class);
    }

    public function school()
    {
        return $this->belongsToMany(School::class)
                    ->withPivot('school_id');
    }

    public function coder()
    {
        return $this->belongsToMany(Coder::class);
    }

    static function addToPivotTable($promo, $school_id)
    {
        $promo->school()->attach(School::getSchool($school_id['school_id']));
    }

    static function getPromo($id)
    {
        return Promo::findOrFail($id);
    }

    public function getName()
    {
        return $this->name;
    }

    public function getCode()
    {
        return $this->code;
    }

    public function getDuration()
    {
        return $this->duration;
    }

}