<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class School extends Model
{
	use HasFactory;
	
    public $timestamps = true;

    protected $table = 'schools';

    protected $fillable = [
        'name',
        'province',
        'image'
    ];
	
    public function promo()
    {
        return $this->belongsToMany(Promo::class);
    }

    static function getSchool($id)
    {
        return School::findOrFail($id);
    }

    public function getName()
    {
        return $this->name;
    }

    /**
     * @return mixed
     */
    public function getProvince()
    {
        return $this->province;
    }

    public function getImage()
    {
        return $this->image;
    }
}