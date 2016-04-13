<?php

namespace App\Http\Middleware;

use Closure;

class CheckoutMiddleware
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
            'products.*.quantity' => 'required',
            'products.*.id' => 'required',
        ], [
            'products.*.quantity.required' => 'You must inform the quantity',
        ]);
        
        if ($validate->fails()) {
            return $validate->errors()->toJson();
        }

        return $next($request);
    }
}
