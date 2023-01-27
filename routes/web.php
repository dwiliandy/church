<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\GroupController;

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

#Guest Root
Route::get('/', function () {
    return view('welcome');
})->name('homepage');

Route::get('/contact', function () {
    return view('contact');
})->name('contact');


#Admin Route
Route::group(['middleware' => 'auth', 'prefix' => 'admin'], function(){
  Route::get('/dashboard', function () {
    return view('backend.dashboard');
  })->name('admin_dashboard');

  Route::resource('/users', UserController::class);
  Route::resource('/groups', GroupController::class)->only(['index','store']);
});



require __DIR__.'/auth.php';
