<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class schedule extends Model
{
    use HasFactory;

    protected $fillable = [
        'day',
        'label',
        'time',
        'color',
        'icon'
    ];

    protected $table = 'schedule__pf';
    protected $primaryKey = 'id_schedule';
    public $timestamps = true;
}
