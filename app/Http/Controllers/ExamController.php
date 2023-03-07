<?php

namespace App\Http\Controllers;

use App\Models\Answer;
use App\Models\Question;
use Carbon\Carbon;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redis;
use Maatwebsite\Excel\Facades\Excel;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

class ExamController extends Controller
{
    public function calculateExamResult( Request $request ): JsonResponse
    {
        $result = 0;

        foreach( $request -> answers as $answer ) $result += intval( Answer::where( 'question_id' , $answer[ 'question_id' ] ) -> where( 'id' , $answer[ 'answer_id' ] ) -> value( 'is_correct' ) );

        return $this -> success( 'Exam result' , $result );
    }
}
