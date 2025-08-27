<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fare extends Model
{
    use HasFactory;

    protected $fillable = [
        'vehicle_type',
        'base_fare',
        'per_km',
        'per_minute',
        'waiting_charges',
        'status',
    ];
}
