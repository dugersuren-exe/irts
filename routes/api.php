<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
//Controller-уудыг оруулж ирэх

use App\Http\Controllers\StatController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\AttendanceController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
//     return $request->user();
// });

// Route::get('/statuses', [StatController::class, 'index']);
// Route::post('/status', [StatController::class, 'create']);
// Route::get('/status/{id}', [StatController::class, 'show']);


// Route::get('/greeting', function () {
//     return 'Hello World';
// });

// Route::get('/teachers', [TeacherController::class, 'index']);
// Route::get('/teacher/{id}', [TeacherController::class, 'show']);
// Route::post('/teachers', [TeacherController::class, 'create']);

// Route::group(
//     [
//         'prefix'=>'v1',
//         //'middleware'=>'auth:sanctum'
//     ],
//     function(){
//         Route::apiResource('/stats',StatController::class);
//         Route::apiResource('/students',StudentController::class);
//     }
    
//);


    // Route::get('/courses', [CourseController::class, 'index']);
    // Route::get('/courses/{id}', [CourseController::class, 'show']);
    // Route::post('/courses', [CourseController::class, 'create']);
    // Route::post('/courses/{id}', [CourseController::class, 'update']);
    // Route::delete('/courses/{id}', [CourseController::class, 'destroy']);


    Route::group(
            [
                'prefix'=>'v1',
                //'middleware'=>'auth:sanctum'
            ],
            function(){
                    Route::get('/courses', [CourseController::class, 'index']);
                    Route::get('/courses/{id}', [CourseController::class, 'show']);
                    Route::post('/courses', [CourseController::class, 'create']);
                    Route::post('/courses/{id}', [CourseController::class, 'update']);
                    Route::delete('/courses/{id}', [CourseController::class, 'destroy']);
            }
            
        );

