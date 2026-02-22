<?php

use App\Http\Controllers\TestController;
use App\Http\Controllers\CrudController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;


// one way                   //anonymous function
Route::get('/', function () {
    return view('welcome');
});




//two way      // url              // controller         // method
Route::get('testing',[TestController::class,'index']);


//CRUD OPERATION WAY   //url               // controller
// Route::resource('test', TestController::class);

Route::resource('users', UserController::class);




