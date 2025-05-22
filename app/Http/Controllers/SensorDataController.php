<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SensorData;

class SensorDataController extends Controller
{
    public function index()
    {
        $allData = SensorData::all();  // ambil semua data sensor
        return view('sensor_data', ['allData' => $allData]);
    }

    public function store(Request $request)
    {
        try {
            $validated = $request->validate([
                'temperature' => 'required|numeric',
                'humidity' => 'required|numeric',
            ]);

            $data = SensorData::create([
                'temperature' => $validated['temperature'],
                'humidity' => $validated['humidity'],
            ]);

            return response()->json(['message' => 'Data saved successfully!', 'data' => $data], 200);
        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json([
                'message' => 'Validation failed',
                'errors' => $e->errors()
            ], 422);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Failed to save data',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    // Opsional, jika ingin implementasi latest dan all sebagai API JSON
    public function latest()
    {
        $latest = SensorData::orderBy('created_at', 'desc')->first();
        return response()->json($latest);
    }

    public function all()
    {
        $allData = SensorData::all();
        return response()->json($allData);
    }
}
