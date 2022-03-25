<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    use HasFactory;
    public $timestamps = true;

    protected $table = 'admins';

    protected $fillable = [
        'regional',
        'provincial',
        'local',
    ];
	
    
}
