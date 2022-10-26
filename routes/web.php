<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

Route::get('/index',[\App\Http\Controllers\HomeController::class,'index'])->name('index')->middleware(['auth']);

Route::get('/ishchilar',[\App\Http\Controllers\HomeController::class,'ishchilar'])->name('ishchilar')->middleware(['auth']);

Route::get('/newemployee',[\App\Http\Controllers\HomeController::class,'newemployee'])->middleware(['auth']);

Route::get('/service',[\App\Http\Controllers\HomeController::class,'service'])->name('service')->middleware(['auth']);

Route::resource('/customers',\App\Http\Controllers\CustomersController::class);

Route::resource('/employees',\App\Http\Controllers\EmployeesController::class);

Route::resource('/prices',\App\Http\Controllers\PricesController::class);
