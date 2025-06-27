<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Membership_packages extends Model
{
    use HasFactory;

    protected $fillable = [
        'name_package',
        'price_amount',
        'price_unit',
        'features',
        'is_popular',
    ];

    protected $casts = [
        'features'   => 'array',     // otomatis decode JSON jadi array
        'is_popular' => 'boolean',
    ];

    protected $table = 'membership_packages';
    protected $primaryKey = 'id_packages';
}
