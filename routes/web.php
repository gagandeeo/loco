<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
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
    return view('welcome');
});

Route::post('/auth/save',[AdminController::class,'save'])->name('components.save');
Route::post('/auth/check',[AdminController::class,'check'])->name('components.check');
Route::get('/auth/logout',[AdminController::class,'logout'])->name('components.logout');


Route::group(['middleware'=>['AuthCheck']], function(){
    Route::get('/auth/register',[AdminController::class,'register'])->name('components.register');
    Route::get('/auth/login',[AdminController::class,'login'])->name('components.login');
    Route::get('/user/dashboard',[AdminController::class,'dashboard']);
});