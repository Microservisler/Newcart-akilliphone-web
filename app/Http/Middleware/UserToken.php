<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class UserToken
{
    /**
     * Handle an incoming request.
     *
     */
    public function handle(Request $request, Closure $next): Response
    {

        if ($userToken = $request->session()->get('userToken')) {

            if($user_token_time=$request->session()->get('user_token_time')){

                if(time()-$user_token_time>3600){

                    $token=\Webservice::get_token();
                    $request->session()->put('userToken', $userToken);
                    $request->session()->put('user_token_time', time());
                }
            }

                return $next($request);


        } else {
            $userToken=\Webservice::admin_token();
            if($userToken===null){
            die("boş");
            }
            else if($userToken ===false){

            }
            else {
                $request->session()->put('userToken', $userToken);
                $request->session()->put('user_token_time', time());

            }
            return $next($request);
        }
    }
}
