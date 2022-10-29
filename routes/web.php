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


Route::get('/', [App\Http\Controllers\Controller::class, 'index'])->name('login');
Route::get('/dashboard', [App\Http\Controllers\Controller::class, 'dashboard'])->name('dashboard')->middleware('auth');
Route::get('/internal_hardware', [App\Http\Controllers\Controller::class, 'internal_hardware'])->name('internal_hardware')->middleware('auth');
Route::get('/external_hardware', [App\Http\Controllers\Controller::class, 'external_hardware'])->name('external_hardware')->middleware('auth');
Route::get('/internal_hardware/{hardwarename}', [App\Http\Controllers\Controller::class, 'internal_hardware_device'])->name('internal_hardware_device')->middleware('auth');
Route::get('/external_hardware/{hardwarename}', [App\Http\Controllers\Controller::class, 'external_hardware_device'])->name('external_hardware_device')->middleware('auth');
Route::get('/logout', [App\Http\Controllers\Controller::class, 'logout'])->name('logout')->middleware('auth');;
Route::post('/google/login', [App\Http\Controllers\Controller::class, 'googleLogin'])->name('googleLogin');