<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class VendorMiddleware
{
    /**
     * Ensure the authenticated user is a vendor.
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user = $request->user();

        if (!$user || ($user->user_type !== 'vendor')) {
            return redirect()->route('login')
                ->with('error', 'You must be a vendor to access that area.');
        }

        return $next($request);
    }
}


