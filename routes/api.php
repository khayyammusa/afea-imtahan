<?php

use App\Http\Controllers\{
    ExamController,
    QuestionController
};

// Question
Route::prefix('question')
    ->controller(QuestionController::class)
    ->group(function () {
        Route::get('list', 'list');
        Route::get('list-for-exam', 'listForExam');
        Route::post('create', 'create');
        Route::put('update/{question}', 'update');
        Route::delete('delete', 'delete');
    });

// Exam
Route::prefix('exam')
    ->controller(ExamController::class)
    ->group(function () {
        Route::post('calculate', 'calculateExamResult');
    });
