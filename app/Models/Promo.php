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

    public function school()
    {
        return $this->belongsToMany(School::class);
    }

    public function coder()
    {
        return $this->belongsToMany(Coder::class);
    }

    static function addToPivotTable($promo, $school_id)
    {
        // dd($promo);
        //dd($school_id['school_id']);
        $promo->school()->attach(School::getSchool($school_id['school_id']));

    }
}