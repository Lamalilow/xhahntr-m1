<?php

use App\Http\Controllers\OrderController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

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

Route::middleware('UserControll')->group(function (){
    Route::get('/account', [UserController::class, 'accountView'])->name('acc');
    Route::post('/account', [UserController::class, 'accountPost'])->name('accPost');
    Route::get('/create', [OrderController::class,'addView'])->name('add');
    Route::get('/logout',[UserController::class, 'logout'])->name('logout');
    Route::get('/update/{order}', [OrderController::class, 'updateView'])->name('update');
    Route::get('/delete/{order}', [OrderController::class, 'deleteView'])->name('delete');
    Route::get('/main', [UserController::class, 'mainView'])->name('/');

    Route::get('/admin', [UserController::class, 'adminView'])->name('admin')->middleware('AdminControll');
    Route::post('/create', [OrderController::class,'addPost']);
    Route::post('/delete/{order}', [OrderController::class, 'deletePost']);
    Route::post('/update/{order}', [OrderController::class, 'updatePost']);
    Route::post('/admin', [UserController::class, 'adminPost'])->middleware('AdminControll');


});

Route::get('/registration', [UserController::class, 'registrationView'])->name('reg');
Route::post('/registration', [UserController::class, 'registrationPost'])->name('regPost');
Route::get('/authorization', [UserController::class, 'authorizationView'])->name('auth');
Route::post('/authorization', [UserController::class, 'authorizationPost'])->name('authPost');


Route::get('/warning', [UserController::class, 'warningView'])->name('warning');
