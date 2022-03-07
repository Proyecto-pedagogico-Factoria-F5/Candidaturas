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
        'nombre_promo',
        'ubicación',
        'escuela_id',
        'fecha_de_inicio',
        'duración',
        'url',
        'imagen',
        'código'
    ];

}