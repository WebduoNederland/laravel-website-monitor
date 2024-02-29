<?php

namespace App\Http\Middleware;

use App\Models\Website;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class LaravelWebsiteMonitorClientMiddleware
{
    public function handle(Request $request, Closure $next): Response
    {
        /** @var ?string $apiToken */
        $apiToken = $request->bearerToken();

        if (! $apiToken) {
            return response()->json([
                'success' => false,
                'message' => 'No Bearer token supplied!',
            ], 401);
        }

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

        return $next($request);
    }
}
