<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Candidatura extends Model
{
	use HasFactory;
	
    public $timestamps = true;

    protected $table = 'candidaturas';

    protected $fillable = ['nombre','apellidos','email','teléfono','cuenta_usuario','descripción','fecha_de_registro','fecha_de_nacimiento','nacionalidad'];
	
}
