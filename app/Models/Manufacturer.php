<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Manufacturer extends Model
{
    protected $fillable = [
        'name',
        'country',
        'status',
        'fleet_count',
        'fleet_trend',
    ];
}
