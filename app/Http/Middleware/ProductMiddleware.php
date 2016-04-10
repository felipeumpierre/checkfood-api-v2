<?php

namespace App\Http\Middleware;

use Closure;

class ProductMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $validate = \Validator::make($request->all(), [
            'ingredients' => 'required'
        ]);

        if ($validate->fails()) {
            return $validate->errors()->toJson();
        }

        return $next($request);
    }
}
