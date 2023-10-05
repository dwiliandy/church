<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\GroupController;

use App\Http\Controllers\Admin\FamilyController;
use App\Http\Controllers\Admin\YearController;
use App\Http\Controllers\Admin\IncomeController;
use App\Http\Controllers\Admin\ExpenditureController;
use App\Http\Controllers\Admin\FinancialController;

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
  // dashboard
  Route::get('/', function () {
    return view('backend.dashboard');
  })->name('admin_dashboard');

  // Resource Route
    // Master Data
  Route::resource('/users', UserController::class);
  Route::resource('/groups', GroupController::class)->only(['index','store']);
  Route::resource('/families', FamilyController::class);
  Route::resource('/years', YearController::class)->only(['index','store']);
  Route::resource('/incomes', IncomeController::class);
  Route::resource('/expenditures', ExpenditureController::class);

      // Admin Data
    Route::resource('/data-year/{year}/financials', FinancialController::class);

  // Single Route
    // Year
  Route::get('/years/{id}/incomes', [YearController::class,'getIncomes'])->name('get-incomes');
  Route::post('/years/incomes', [YearController::class,'updateIncomes'])->name('update-incomes');
  Route::get('/years/{id}/expenditures', [YearController::class,'getExpenditures'])->name('get-expenditures');
  Route::post('/years/expenditures', [YearController::class,'updateExpenditures'])->name('update-expenditures');
  Route::get('/years-data', [YearController::class,'yearData'])->name('year-data');
  Route::get('/get-finance-data/{data}/{year}', [FinancialController::class,'getFinance'])->name('get-finance-data');

});



require __DIR__.'/auth.php';
