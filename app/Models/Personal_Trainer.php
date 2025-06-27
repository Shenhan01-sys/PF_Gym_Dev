<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Personal_Trainer extends Model
{
    use HasFactory;

    protected $fillable = 
    [
        'name_personal_trainer',
        'specialist',
        'expreience',
        'image'
    ];

    protected $table = 'personal_trainer';
    protected $primaryKey = 'id_personal_trainer';
    public $timestamps = true;
}
