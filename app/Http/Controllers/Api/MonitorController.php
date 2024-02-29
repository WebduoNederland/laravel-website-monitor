<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Website;
use Illuminate\Http\Request;

class MonitorController extends Controller
{
    public function save(Request $request)
    {
        /** @var string $apiToken */
        $apiToken = $request->bearerToken();

        /** @var ?Website $website */
        $website = Website::query()
            ->where('api_key', '=', $apiToken)
            ->first();

        if (! $website) {
            return response()->json([
                'success' => false,
                'message' => 'Invalid Bearer token supplied!',
            ], 403);
        }

        if (! $request->has('data') || ! $request->has('timestamp')) {
            return response()->json([
                'success' => false,
                'message' => 'Invalid request!',
            ], 400);
        }

        $data = $request->input('data');

        $website->monitorEntries()->create([
            'data' => $data,
        ]);

        return response()->json([
            'success' => true,
            'message' => '',
        ]);
    }
}
