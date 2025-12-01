<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AppLisenseMiddleware
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

        if(!empty($lisense = \App\Models\AppLisense::first())){
            if(!$lisense->is_active()){
                $url = '';
                if(auth('student')->check()){
                    $url = route('student.home');
                }elseif(!empty($user = auth()->user())){
                    $url = route('admin.home');
                }
                auth('student')->logout();
                auth()->logout();
                session()->flush();
                return redirect(route('login'))->with('error', "LISENSE EXPIRED. CONTACT YOUR SOFTWARE SERVICE PROVIDER.");
                return redirect()->to($url);
            }
        }
        return $next($request);
    }
}
