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
        'nombre_escuela',
        'provincia',
        'imagen',
    ];
	
}
