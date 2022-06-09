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

Route::redirect('', 'dashboard');
Route::middleware('auth')->group(function(){
    Route::post('logout', 'AuthController@destroy')->name('logout');
    Route::get('dashboard', 'DashboardController@index')->name('dashboard.index');
    Route::resources([
        'students' => 'StudentController',
        'master_classes' => 'MasterClassController',
    ]);
    Route::get('bills', 'BillController@index')->name('bills.index');
    Route::put('bills/{student}', 'BillController@update')->name('bills.update');
    Route::put('students/{student}/update-password', 'StudentController@updatePassword')->name('students.update-password');
});

Route::middleware('guest')->group(function () {
    Route::get('login', 'AuthController@index')->name('auth.index');
    Route::post('login', 'AuthController@store')->name('auth.store');
});
Route::fallback(function(){
    return view('404');
});