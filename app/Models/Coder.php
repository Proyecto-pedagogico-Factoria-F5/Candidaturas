<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coder extends Model
{
	use HasFactory;
	
    public $timestamps = true;

    protected $table = 'coders';

    protected $fillable = ['nombre','apellidos','email','phone','fecha_de_nacimiento','github','promo_id'];
	
}
