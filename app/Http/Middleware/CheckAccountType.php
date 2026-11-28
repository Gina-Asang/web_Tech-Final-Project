<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckAccountType
{
    public function handle(Request $request, Closure $next, string $accountType): Response
    {
        if ($request->user()->account_type !== $accountType) {
            abort(403, 'Unauthorized access.');
        }

        return $next($request);
    }
}