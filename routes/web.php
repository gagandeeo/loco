<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PostController;
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


Route::group(['middleware'=>['AuthCheck']], function(){
    
    Route::get('/auth/register',[AdminController::class,'register'])->name('components.register');
    Route::get('/auth/login',[AdminController::class,'login'])->name('components.login');
    Route::get('/user/dashboard',[AdminController::class,'dashboard']);
    Route::get('/auth/logout',[AdminController::class,'logout'])->name('components.logout');

    Route::get('/post/upload-file',[PostController::class,'createForm'])->name('post.createForm');
    Route::post('/post/upload-file',[PostController::class,'uploadFile'])->name('post.uploadFile');

    // Route::get('/post/all-post',[PostController::class,'getAllPost'])->name('post.getAllPost');
    Route::get('/post/user-post',[PostController::class,'getUserPost'])->name('post.getUserPost');
    Route::get('/post/download/{post_id}',[PostController::class,'downloadPost'])->name('post.downloadPost');
    
    Route::get('/post/user-post/update/{post_id}',[PostController::class,'selectUserPost'])->name('post.selectUserPost');
    Route::post('/post/user-post/update/{post_id}',[PostController::class,'updateUserPost'])->name('post.updateUserPost');

    Route::get('/post/user-post/delete/{post_id}',[PostController::class,'deleteUserPost'])->name('post.deleteUserPost');
});