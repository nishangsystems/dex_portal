<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Session;

class ServiceBlocker extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    protected function redirectTo($request)
    {
        
        return redirect(route('login'))->with('error', 'Service is currently disabled. Please contact support.');

    }
}
