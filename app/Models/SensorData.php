<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SensorData extends Model
{
    protected $table = 'sensors_data';

    protected $fillable = [
        'pm25',
        'co',
        'ozone',
        'temperature',
        'battery',
        'status',
    ];
}