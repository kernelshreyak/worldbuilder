<?php

use Illuminate\Support\Facades\Route;


use App\Http\Controllers\LoginController;
use App\Http\Controllers\BuilderController;

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


Route::get('/createuser',[LoginController::class,'create_user']);


Route::get('/',[BuilderController::class,'index']);

Route::get('/worlds',[BuilderController::class,'worlds']);
Route::post('/worlds/save',[BuilderController::class,'world_save']);
Route::patch('/worlds/update',[BuilderController::class,'world_update']);
Route::get('/worlds/delete',[BuilderController::class,'world_delete']);

Route::get('/locations',[BuilderController::class,'locations']);
Route::post('/locations/save',[BuilderController::class,'location_save']);
Route::patch('/locations/update',[BuilderController::class,'location_update']);
Route::get('/locations/delete',[BuilderController::class,'location_delete']);


Route::get('/characters',[BuilderController::class,'characters']);


Route::get('/admin', function () {
    return view('admin/dashboard');
});
