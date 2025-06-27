<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class motivation_pf extends Model
{
    use HasFactory;
    protected $fillable =
    [
        'motivation_letter',
        'author'
    ];

    protected $table = 'motivation__pf';
    protected $primaryKey = 'id_Motivation';
    public $timestamps = true;
}
