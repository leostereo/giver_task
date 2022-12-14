<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ReportController;

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



Route::middleware(['auth'])->group(function () {

Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');


Route::get('/admin', function () {
    return view('admin');
})->name('admin');


Route::get('/charts', [ReportController::class, 'charts'])->name('charts');

Route::resource('report', ReportController::class);

Route::get('/features', function () {
    return view('features');
})->name('features');
});


require __DIR__.'/auth.php';

Route::get('{any}', function () {
    return view('vue');
})->where('any', '.*');
