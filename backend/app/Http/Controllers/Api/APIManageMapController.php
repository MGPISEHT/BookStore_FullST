<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class APIManageMapController extends Controller
{
    public function index()
    {
        // Example: Return some mock map data
        return response()->json([
            'message' => 'Map data loaded successfully.',
            'map_center' => ['lat' => 11.5564, 'lng' => 104.9282], // Phnom Penh, for example
            'zoom_level' => 13,
            'markers' => [
                ['id' => 1, 'lat' => 11.5564, 'lng' => 104.9282, 'title' => 'Marker 1'],
                ['id' => 2, 'lat' => 11.5623, 'lng' => 104.9200, 'title' => 'Marker 2']
            ]
        ]);
    }
}
