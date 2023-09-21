<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckAdminToken
{
    /**
     * Handle an incoming request.
     *
     */
    public function handle(Request $request, Closure $next): Response
    {
        if ($token = $request->session()->get('token')) {
            if($token_time=$request->session()->get('token_time')){
                if(time()-$token_time>3600){
                    $token=\Webservice::get_token();
                    $request->session()->put('token', $token);
                    $request->session()->put('token_time', time());
                }
            }
            return $next($request);
        } else {
            $token=\Webservice::get_token();
            if($token===null){
                die("boş");
            }
            else if($token ===false){

            }
            else {
                $request->session()->put('token', $token);
                $request->session()->put('token_time', time());
            }
            return $next($request);
        }
    }
}
