<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class PlatformChargeMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if (auth('student')->user() == null) {
            # code...
            return redirect()->to(route('login'));
        }
        if(!(auth('student')->user()->hasPaidPlatformCharges())) {

            return redirect(route('student.platform_charge.pay'))->with('message', "Pay platform charges to continue");

        }
        
        return $next($request);
    }
}
