<?php

use App\Models\AssignmentSubmission;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\GeneralController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ClassroomController;
use App\Http\Controllers\AssignmentController;
use App\Http\Controllers\AttachmentController;
use App\Http\Controllers\AssignmentSubmissionController;
use App\Http\Controllers\GradeController;
use App\Http\Controllers\IndustryWorkController;
use App\Models\IndustryWork;

Route::get('/', function () {
    return view('index');
})->middleware('guest');
Route::get('/dashboard', [GeneralController::class, 'index'])->middleware('auth');

Route::get('/login', [SessionController::class, 'create'])->name('login')->middleware('guest');
Route::post('/session', [SessionController::class, 'store'])->middleware('guest');
Route::post('/logout', [SessionController::class, 'destroy'])->middleware('auth');

Route::get('/register', [RegisterController::class, 'index'])->middleware('guest');
Route::post('/signup', [RegisterController::class, 'store']);

Route::get('/classroom/{classroom}', [ClassroomController::class, 'index'])->middleware('auth');
Route::get('/people/{classroom}', [ClassroomController::class, 'show'])->middleware('auth');
Route::post('/createClass', [ClassroomController::class, 'store'])->middleware('auth');
Route::post('/joinClass', [ClassroomController::class, 'joinClass'])->middleware('auth');

// Post
Route::post('/postSubmit', [PostController::class, 'store'])->middleware('auth');
Route::get('/classwork/{classroom}', [PostController::class, 'classwork'])->middleware('auth');
Route::get('/assignmentSubmitPage/{post}', [PostController::class, 'index'])->middleware('auth');

Route::get('/assignment/{classroom}', [AssignmentController::class, 'create'])->middleware('auth');
Route::post('/assignmentCreate', [AssignmentController::class, 'store'])->middleware('auth');
Route::get('/studentsWork/{post}', [AssignmentController::class, 'studentsAssignmentWorkCreate'])->middleware('auth');

Route::post('/assignmentSubmit/{assignment}', [AssignmentSubmissionController::class, 'store'])->middleware('auth');
Route::post('/gradeSubmit/{assignmentSubmission}', [GradeController::class, 'store'])->middleware('auth');


Route::get('{filename}', [AttachmentController::class, 'getFile'])->name('getfile');
Route::get('viewPdf/{submission}', [AttachmentController::class, 'getPdf']);

Route::get('/industry/industryWorkCreate', [IndustryWorkController::class, 'create'])->middleware('auth');
Route::post('/industryWork', [IndustryWorkController::class, 'store'])->middleware('auth');
Route::get('/industryWorkView/{classroom}', [IndustryWorkController::class, 'view'])->middleware('auth');
Route::get('/addedWorkView/{classroom}', [IndustryWorkController::class, 'addedWorkview'])->middleware('auth');

Route::get('/workAddToClass/{classroom}/{work}', [IndustryWorkController::class, 'workAddToClass'])->middleware('auth');




















// Route::post('logout', [SessionController::class, 'destroy'])->middleware('auth');
// Route::get('login', [SessionController::class, 'create'])->middleware('guest');
// Route::post('sessions', [SessionController::class, 'store'])->middleware('guest');
// General Registration


