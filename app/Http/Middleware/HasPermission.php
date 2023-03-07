<?php

namespace App\Http\Middleware;

use App\Http\Traits\Response;
use Closure;
use Illuminate\Http\Request;

class HasPermission
{
    use Response;

    /**
     * Handle an incoming request.
     *
     * @param Request $request
     * @param Closure $next
     * @param $permissions
     * @return mixed
     */
    public function handle( Request $request , Closure $next , $permissions )
    {


        return $next( $request );

    }
}
