<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\GeolocationLatest;
use App\Models\GeolocationLog;

class GeolocationLatestController extends Controller
{
    public function createOrUpdate(Request $request)
    {
        // Validate the incoming request data
        $request->validate([
            'user_id' => 'required|integer',
            'latitude' => 'required|numeric',
            'longitude' => 'required|numeric',
            'battery_level' => 'required|integer',
            'status' => 'required|string',
        ]);

        // Find or create a GeolocationLatest record based on user_id
        $geolocationLatest = GeolocationLatest::updateOrCreate(
            ['user_id' => $request->user_id],
            [
                'latitude' => $request->latitude,
                'longitude' => $request->longitude,
                'battery_level' => $request->battery_level,
                'status' => $request->status,
            ]
        );

        // Create an entry in the GeolocationLog model
        GeolocationLog::create([
            'user_id' => $request->user_id,
            'latitude' => $request->latitude,
            'longitude' => $request->longitude,
            'battery_level' => $request->battery_level,
            'status' => $request->status,
        ]);

        return response()->json(['message' => 'Geolocation updated successfully', 'data' => $geolocationLatest]);
    }
}
