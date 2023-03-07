<?php

namespace App\Console\Commands;

use App\Http\Services\ExamService;
use App\Models\Answer;
use App\Models\Assignment;
use App\Models\CandidateExam;
use App\Models\CandidateExamQuestion;
use App\Models\CandidateExamQuestionRead;
use App\Models\Competence;
use App\Models\Question;
use App\Models\Quiz;
use App\Models\Subject;
use App\Models\Topic;
use App\Models\User;
use App\Models\Variant;
use App\Models\VariantQuestion;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class Test extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'test';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Test';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $input = [ 1 , -2 , 3 , 4 , -5 , 6 , 7 , -8 , 9 , -10 , 11 ];

        $start = -1;

        $end = -1;

        $maxLength = 0;

        $currentStart = -1;

        $currentLength = 0;

        $n = count( $input );

        foreach( $input as $key => $value )
        {
            if( $value > 0 )
            {
                if( $currentStart === -1 ) $currentStart = $key;

                $currentLength++;
            }

            else
            {
                if( $currentLength > $maxLength )
                {
                    $start = $currentStart;

                    $end = $key - 1;

                    $maxLength = $currentLength;
                }

                $currentStart = $currentLength = -1;
            }

            if( $currentLength > $maxLength )
            {
                $start = $currentStart;

                $end = $n - 1;

                $maxLength = $currentLength;
            }
        }

        print_r( [ $start , $end ] );

        echo "\n";

        return 'success';
    }
}
