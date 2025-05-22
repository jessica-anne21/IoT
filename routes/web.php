<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/sens', function () {
    return view('sensor_data');
});

use App\Http\Controllers\SensorDataController;

Route::get('/sensor-data', [SensorDataController::class, 'index']);  // tampilkan view
Route::post('/sensor-data/store', [SensorDataController::class, 'store']); // simpan data POST dari Arduino

// Kalau ingin juga buat API JSON:
Route::get('/sensor-data/latest', [SensorDataController::class, 'latest']); 
Route::get('/sensor-data/all', [SensorDataController::class, 'all']);
