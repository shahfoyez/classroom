<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PdfController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\GradeController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\GeneralController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ClassroomController;
use App\Http\Controllers\AssignmentController;
use App\Http\Controllers\AttachmentController;
use App\Http\Controllers\IndustryWorkController;
use App\Http\Controllers\IndustryWorkSubmitController;
use App\Http\Controllers\AssignmentSubmissionController;

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
Route::get('/viewPdf/{submission}', [AttachmentController::class, 'getPdf']);
Route::get('/viewWorkPdf/{submission}', [AttachmentController::class, 'getWorkPdf']);


Route::get('/industry/industryWorkCreate', [IndustryWorkController::class, 'create'])->middleware('auth');
Route::post('/industryWork', [IndustryWorkController::class, 'store'])->middleware('auth');
Route::get('/industryWorkView/{classroom}', [IndustryWorkController::class, 'view'])->middleware('auth');
Route::get('/relatedWorkView/{classroom}', [IndustryWorkController::class, 'relatedWorkview'])->middleware('auth');

Route::get('/workAddToClass/{classroom}/{work}', [IndustryWorkController::class, 'workAddToClass'])->middleware('auth');

Route::get('/industryWorkIndustryView/{industryWork}', [IndustryWorkSubmitController::class, 'industryView'])->middleware('auth');
Route::get('/industryWorkTeacherView/{industryWork}/{classroom}', [IndustryWorkSubmitController::class, 'create'])->middleware('auth');

Route::get('/industryWorkSubmit/{industryWork}/{classroom}', [IndustryWorkSubmitController::class, 'create'])->middleware('auth');
Route::post('/industryWorkSubmit/{industryWork}/{classroom}', [IndustryWorkSubmitController::class, 'store'])->middleware('auth');
Route::get('/industryWork/{industryWork}/{classroom}', [IndustryWorkSubmitController::class, 'index'])->middleware('auth');
Route::post('/industryGradeSubmit/{industryWorkSubmit}', [IndustryWorkSubmitController::class, 'industryGradeSubmit'])->middleware('auth');
Route::post('/assignmentComment/{assignment}/{classroom}', [CommentController::class, 'store'])->middleware('auth');

Route::get('/assignmentMark/{post}', [PdfController::class, 'assignmentMark'])->middleware('auth');








