<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AuthCheck
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if(!session()->has('LoggedUser') && ($request->path() != 'auth/login' && $request->path() !='auth/register')){
            return redirect('auth/login')->with('fail', 'You must be logged in!');
        }

        if(session()->has('LoggedUser') && ($request->path() == 'auth/login' || $request->path() =='auth/register')){
            return back();
        }
        $headers = [
            'Access-Control-Allow-Origin'      => '*',
            // 'Access-Control-Allow-Methods'     => 'POST, GET, OPTIONS',
            // 'Access-Control-Allow-Credentials' => 'true',
            // 'Access-Control-Max-Age'           => '86400',
            // 'Access-Control-Allow-Headers'     => 'Content-Type, Authorization, X-Requested-With',
            // 'Content-Type' => ''
            'Cache-Control'=>'no-cache,no-store,max-age=0,must-revalidate',
            'Pragma'=>'no-cache',
            'Expires'=>'Sat 01 Jan 2000 00:00:00 GMT',
        ];
        $response = $next($request);
        foreach($headers as $key => $value) {
            $response->headers->set($key, $value);
        }
        return $response;
    }
}
