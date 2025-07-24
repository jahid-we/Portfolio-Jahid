<?php

namespace App\Http\Controllers\Admin;

use App\Helper\ResponseHelper;
use App\Http\Controllers\Controller;
use App\Models\MapUrl;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LocationController extends Controller
{
    // Map Url Create Start***********************************
    public function createMapUrl(Request $request)
    {
        $request->validate([
            'map_url' => 'required|string|max:65535',
        ]);

        if (Auth::check()) {
            $existing = MapUrl::first();

            if ($existing) {
                $existing->update([
                    'map_url' => $request->map_url,
                ]);
            } else {
                MapUrl::create([
                    'map_url' => $request->map_url,
                ]);
            }

            return ResponseHelper::Out(true, 'Map URL saved successfully', 200);

        } else {
            return ResponseHelper::Out(false, 'Unauthorized', 401);
        }

    }
    // Map Url Create End***********************************

    // Get Map Url Start***********************************
    public function getMapUrl(Request $request)
    {
        if (Auth::check()) {

            $mapUrl = MapUrl::first();

            if (! $mapUrl) {
                return ResponseHelper::Out(false, 'Map URL not found', 404);
            }

            return ResponseHelper::Out(true, $mapUrl, 200);
        } else {
            return ResponseHelper::Out(false, 'Unauthorized', 401);
        }
    }
    // Get Map Url End***********************************

    // Delete Map Url Start***********************************
    public function deleteMapUrl(Request $request)
    {

        if (Auth::check()) {
            $mapUrl = MapUrl::first();

            if (! $mapUrl) {
                return ResponseHelper::Out(false, 'Map URL not found', 404);
            }

            $mapUrl::truncate();

            return ResponseHelper::Out(true, 'Map URL deleted successfully', 200);
        }

    }
    // Delete Map Url End***********************************

}
