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
                //'middleware'=>'auth:sanctum',
            ],
            function(){
                    Route::get('/stats', [StatController::class, 'index']);
                    Route::get('/stats/{id}', [StatController::class, 'show']);
                    Route::post('/stats', [StatController::class, 'create']);
                    Route::post('/stats/{id}', [StatController::class, 'update']);
                    Route::delete('/stats/{id}', [StatController::class, 'destroy']);


                    Route::get('/teachers', [TeacherController::class, 'index']);
                    Route::get('/teachers/{id}', [TeacherController::class, 'show']);
                    Route::post('/teachers', [TeacherController::class, 'create']);
                    Route::post('/teachers/{id}', [TeacherController::class, 'update']);
                    Route::delete('/teachers/{id}', [TeacherController::class, 'destroy']);


                    Route::get('/courses', [CourseController::class, 'index']);
                    Route::get('/courses/{id}', [CourseController::class, 'show']);
                    Route::post('/courses', [CourseController::class, 'create']);
                    Route::post('/courses/{id}', [CourseController::class, 'update']);
                    Route::delete('/courses/{id}', [CourseController::class, 'destroy']);


                    Route::get('/students', [StudentController::class, 'index']);
                    Route::get('/students/{id}', [StudentController::class, 'show']);
                    Route::post('/students', [StudentController::class, 'create']);
                    Route::post('/students/{id}', [StudentController::class, 'update']);
                    Route::delete('/students/{id}', [StudentController::class, 'destroy']);


                    Route::get('/attendances', [AttendanceController::class, 'index']);
                    Route::get('/attendances/{id}', [AttendanceController::class, 'show']);
                    Route::post('/attendances', [AttendanceController::class, 'create']);
                    Route::post('/attendances/{id}', [AttendanceController::class, 'update']);
                    Route::delete('/attendances/{id}', [AttendanceController::class, 'destroy']);
            }
            
        );



// Route::group(
//     [
//         'prefix'=>'v2',
//         //'middleware'=>'auth:sanctum',
//     ],
//     function(){
//             Route::get('/courses', [CourseController::class, 'index']);
//             Route::get('/courses/{id}', [CourseController::class, 'show']);
//             Route::post('/courses', [CourseController::class, 'create']);
//             Route::post('/courses/{id}', [CourseController::class, 'update']);
//             Route::delete('/courses/{id}', [CourseController::class, 'destroy']);
//     }
    
// );