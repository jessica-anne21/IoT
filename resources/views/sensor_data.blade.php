<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Data Sensor</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
</head>
<body>
<div class="container mt-4">
    <h2>Data Sensor Temperature & Humidity</h2>
    <table class="table table-bordered table-striped mt-3">
        <thead>
            <tr>
                <th>ID</th>
                <th>Temperature (°C)</th>
                <th>Humidity (%)</th>
                <th>Created At</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($allData as $data)
                <tr>
                    <td>{{ $data->id }}</td>
                    <td>{{ $data->temperature }}</td>
                    <td>{{ $data->humidity }}</td>
                    <td>{{ $data->created_at->format('Y-m-d H:i:s') }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="4" class="text-center">No sensor data found.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
</body>
</html>
