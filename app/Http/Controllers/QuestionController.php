<?php

namespace App\Http\Controllers;

use App\Http\Requests\QuestionRequest;
use App\Http\Resources\QuestionResource;
use App\Http\Resources\QuestionResourceForExam;
use App\Models\Answer;
use App\Models\Question;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class QuestionController extends Controller
{
    public function list(Request $request)
    {
        $questions = Question::with( [ 'answers'  ] ) -> get();

        return QuestionResource::collection( $questions );
    }

    public function listForExam(Request $request)
    {
        $questions = Question::with( [ 'answers'  ] ) -> get();

        return QuestionResourceForExam::collection( $questions );
    }

    public function create( QuestionRequest $request): JsonResponse
    {
        $created = DB::transaction(function () use($request) {

            $question = Question::create( $request -> validated() );

            foreach($request -> answers as $answer ) $question -> answers() -> save( new Answer( $answer ) );

            return $question;
        });

        return $this->success( 'Question created' , $created , 201 );
    }

    public function update( Question $question , QuestionRequest $request ): JsonResponse
    {
        DB::transaction(function () use($request,$question ) {
            $question->update( $request -> validated() );

            foreach($request -> answers as $answer )
            {
                if( isset( $answer[ 'id' ] ) ) {
                    $ans = Answer::find( $answer[ 'id' ] );

                    $ans -> update( $answer );
                }
                else{
                    $question -> answers() -> save( new Answer( $answer ) );
                }
            }

            return $question;
        });

        return $this->success( 'Question updated' , $question->load( ['answers'] ) );
    }

    public function delete( Request $request ): JsonResponse
    {
        foreach( $request -> get( 'ids' ) as $id )
        {
            Answer::where( 'question_id' , $id ) -> delete();
            Question::where( 'id' , $id ) -> delete();
        }

        return $this -> success( 'Questions deleted' );
    }
}
