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

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::group(['namespace' => 'App\Http\Controllers', 'middleware' => ['web']], function () {

    Route::group(['prefix' => 'aircraft', 'as' => 'aircrafts.'], function () {
        Route::resource('', 'AircraftController')->parameters(['' => 'aircraft']);
     
     Route::post('/create', [
                'as'         => 'create',
                'uses'       => 'AircraftController@store',
            ]);
     
     Route::get('/edit/{id}', [
                'as'         => 'edit',
                'uses'       => 'AircraftController@show',
            ]);
     
     Route::get('/boot/1', [
                'as'         => 'boot',
                'uses'       => 'AircraftController@boot',
            ]);
     Route::get('/dequeueelement/1', [
                'as'         => 'dequeueelement',
                'uses'       => 'AircraftController@remove',
            ]);
     Route::post('/update', [
                'as'         => 'update',
                'uses'       => 'AircraftController@update',
            ]);
     
     Route::get('/delete/{id}', [
                'as'         => 'delete',
                'uses'       => 'AircraftController@destroy',
            ]);
     
     });
});
