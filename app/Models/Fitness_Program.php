<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fitness_Program extends Model
{
    use HasFactory;

    protected $fillable =
    [
        'name_Program',
        'description_Program',
        'icon'
    ];

    protected $table = 'fitness_program';
    protected $primaryKey = 'id_program';
    public $timestamps = true;
}
