<?php

namespace App\Http\Middleware;

use Closure;

class CorsMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    // public function handle($request, Closure $next)
    // {
    //     header("Access-Control-Allow-Origin: *");
    //     $response = $next($request);
    //     $allow = $response->headers->get('Allow');
    //     // ALLOW OPTIONS METHOD
    //     if($request->getMethod() == "OPTIONS") {
    //         $headers = [
    //             'Access-Control-Allow-Methods'=> $allow,
    //             'Access-Control-Allow-Headers'=> 'Content-Type, X-Auth-Token, Origin, Authorization'
    //         ];
    //         // The client-side application can set only headers allowed in Access-Control-Allow-Headers
    //         // return Response::make('OK', 200, $headers);
    //         return $response->withHeaders($headers);
    //     } else {
    //         return $response;
    //     }

    //     // return $next($request)->withHeaders($headers);
    // }

    public function handle($request, Closure $next) {
        // $response = $next($request);
        // $response->headers->set('Access-Control-Allow-Origin' , '*');
        // $response->headers->set('Access-Control-Allow-Methods', 'POST, GET, OPTIONS, PUT, DELETE');
        // $response->headers->set('Access-Control-Allow-Headers', 'Content-Type, Accept, Authorization, X-Requested-With, Application','ip');
        // return $response;

        header("Access-Control-Allow-Origin: *");
        $response = $next($request);
        // ALLOW OPTIONS METHOD
        $headers = [
            'Access-Control-Allow-Methods'=> 'POST, GET, OPTIONS, PUT, DELETE',
            'Access-Control-Allow-Headers'=> 'Content-Type, X-Auth-Token, Origin, x-password, x-username'
        ];
        if($request->getMethod() == "OPTIONS") {
            // The client-side application can set only headers allowed in Access-Control-Allow-Headers
            return $response->withHeaders($headers);
        }

        $response = $next($request);
        foreach($headers as $key => $value)
            $response->header($key, $value);
        return $response;
    }
}
