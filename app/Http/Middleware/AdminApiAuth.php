<?php

namespace App\Http\Middleware;

use App\Models\Admin;
use Closure;
use Illuminate\Http\Request;

class AdminApiAuth
{
    public function handle(Request $request, Closure $next)
    {
        $header = $request->header('Authorization', '');
        if (!preg_match('/Bearer\s+(.*)$/i', $header, $matches)) {
            return response()->json(['message' => 'Admin token szükséges.'], 401);
        }

        $token = trim($matches[1]);
        $admin = Admin::where('api_token', hash('sha256', $token))->first();
        if (!$admin) {
            return response()->json(['message' => 'Érvénytelen admin token.'], 401);
        }

        $request->attributes->set('admin', $admin);
        return $next($request);
    }
}
