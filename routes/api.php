<?php

use App\Http\Controllers\StudentController;
use App\Http\Controllers\TestController;
use Illuminate\Support\Facades\Route;

// Route::get('/users', function() {
//     return response()->json([
//         'message' => 'api is comming'
//     ]);
// });



Route::apiResource('students', StudentController::class);
