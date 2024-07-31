<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Listabsen extends Model
{
    use HasFactory;

    protected $table = 'listabsen';

    protected $fillable = [
        'userid',
        'typetime',
        'time',
        'longitude',
        'latitude',
        'kantorid',
    ];
}
