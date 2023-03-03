<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\ProductController;
use App\Mail\Notification;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Mail;


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

Route::resource('post', PostController::class)->middleware('auth');

Route::resource('product', ProductController::class)->middleware('auth');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['middleware' => 'auth'], function(){
    Route::get('/', [PostController::class, 'index'])->name('home');
});

Route::get('/email', function(){
    // return (new Notification("Alvaro"))->render();
    $mensaje = new Notification("Alvaro");

    $response = Mail::to("alvaro.garvin@escuelaestech.es")->send($mensaje);

    dump($response);
});