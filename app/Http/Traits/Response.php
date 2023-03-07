<?php


namespace App\Http\Traits;

use Illuminate\Http\JsonResponse;

trait Response
{
    protected function success( $message = 'Success' , $data = null , $status = 200 ): JsonResponse
    {
        return response() -> json( [
            'success' => true ,
            'message' => $message ,
            'data' => $data ,
        ] , $status );
    }

    protected function failure( $message = 'Error' , $status = 400 ): JsonResponse
    {
        return response() -> json( [
            'success' => false ,
            'message' => $message ,
        ] , $status );
    }
}
