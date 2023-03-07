<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class PreventCORS
{
    /**
     * Handle an incoming request.
     *
     * @param Request $request
     * @param Closure $next
     * @return mixed
     */
    public function handle( Request $request , Closure $next )
    {
        $response = $next( $request );

        if( ! $request -> request -> get( 'export' ) )
        {
            $response -> header( 'Access-Control-Allow-Origin' , '*' );
            $response -> header( 'Access-Control-Allow-Headers' , '*' );
            $response -> header( 'Access-Control-Allow-Credentials' , 'true' );
            $response -> header( 'Access-Control-Allow-Methods' , 'GET, POST, PUT, DELETE, OPTIONS' );
        }

        $response->headers->set('Access-Control-Expose-Headers', 'Content-Disposition');

        return $response;
    }
}
