<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Facilites extends Model
{
    use HasFactory;

    protected $fillable =
    [
        'facility_name',
        'facility_description',
        'icon_facility'
    ];

    protected $table = 'facilites__pf';
    protected $primaryKey = 'id_facility';
    public $timestamps = true;
}
