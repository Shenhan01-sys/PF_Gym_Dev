<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Title extends Model
{
    use HasFactory;
    protected $fillable = ['title_description'];

    protected $table = 'title__pf'; // pastikan sesuai dengan nama tabel di database
    protected $primaryKey = 'id_Title'; // pastikan sesuai dengan primary key tabel
    public $timestamps = true;

}
