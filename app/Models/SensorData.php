<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SensorData extends Model
{
    protected $table = 'sensor_data'; // nama tabel di database
    protected $fillable = ['temperature', 'humidity'];
}
