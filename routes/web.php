<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    HomeController,
    MajorController,
    ClassesController,
    StudentController,
    TeacherController,
    ViolationController,
    CounselorController,
    ClassesAttendanceController,
    CounselingController,
    StudentDetailController,
};

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
Route::get('/', function(){
    return redirect('/home');
});

Route::get('/login', function(){
    return view('login.login');
})->name('login');

Route::middleware(['authenticated'])->group(function() {
    
    //admin
    Route::get('/home',                                [HomeController::class, 'index'])->name('home');
    Route::middleware(['admin'])->group(function(){
        Route::get('/majors',                          [MajorController::class, 'index']);
        Route::get('/classes',                         [ClassesController::class, 'index']);
        Route::get('/students',                        [StudentController::class, 'index']);
        Route::get('/teachers',                        [TeacherController::class, 'index']);
        Route::get('/violations',                      [ViolationController::class, 'index']);
        Route::get('/counselors',                      [CounselorController::class, 'index']);
        Route::get('/counselors/{id?}/edit',           [CounselorController::class, 'edit'])->name('counselors.edit');
        Route::get('/classes-attendances',             [ClassesAttendanceController::class, 'index']);
        Route::get('/counselings',                     [CounselingController::class, 'index']);
        Route::get('/student-details',                 [StudentDetailController::class, 'index']);
        // Route::resource('majors',                      MajorController::class);

        // Route::resource('classes',                     ClassesController::class);
        // Route::resource('students',                    StudentController::class);
        // Route::resource('teachers',                    TeacherController::class);
        // Route::resource('violations',                  ViolationController::class);
        // Route::resource('counselors',                  CounselorController::class);
        // Route::resource('classes-attendances',         ClassesAttendanceController::class);
        // Route::resource('counselings',                 CounselingController::class);
        // Route::resource('student-details',             StudentDetailController::class);
    });

    //student
    Route::middleware(['student'])->group(function(){
        // Route::get('/violations',                   [ViolationController::class, 'index']);
        // Route::get('/classes-attendances',          [ClassesAttendanceController::class, 'index']);
        // Route::get('/counselings',                  [CounselingController::class, 'index']);
        Route::get('/student-details',              [StudentDetailController::class, 'index']);
    });

    //counselor
    Route::middleware(['counselor'])->group(function(){
        // Route::get('/violations',                   [ViolationController::class, 'index']);
        // Route::get('/classes-attendances',          [ClassesAttendanceController::class, 'index']);
        // Route::get('/counselings',                  [CounselingController::class, 'index']);
        Route::get('/student-details',              [StudentDetailController::class, 'index']);
    });
});
