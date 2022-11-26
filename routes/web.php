<?php

use App\Http\Controllers\ExamController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\StudentExamController;
use App\Http\Controllers\SubjectController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
})->middleware('guest');



Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
    Route::get('student', [StudentController::class,'create'])->name('student.create');
    Route::post('student', [StudentController::class,'store'])->name('student.create');
    Route::resource('subject', SubjectController::class);
    Route::resource('question',QuestionController::class);
    Route::resource('exam',ExamController::class);
    Route::get('exam.active/{id}',[ExamController::class,'active'])->name('exam.active');
    Route::get('exam.inactive/{id}',[ExamController::class,'inactive'])->name('exam.inactive');

    Route::resource('studentExam', StudentExamController::class);
    Route::get('student_exam/{exam_id}/{subject_id}', [StudentExamController::class,'registration'])->name('student_exam.registration');
    Route::get('exam-page/{subject_id}', [StudentExamController::class,'exam_page'])->name('student_exam.examPage');
    Route::post('exam-page', [StudentExamController::class,'result'])->name('student_exam.result');

    Route::get('remaining-time/{eid}/{sid}/{time}', [StudentExamController::class,'remaining']);
});
