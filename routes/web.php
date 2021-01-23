<?php

use Illuminate\Support\Facades\Route;

use App\models\Customer;

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
})->name('dashboard');


//user start
Route::prefix('user')->group(function () {
    
    Route::get('/','UserController@index')->name('users');

    Route::get('/create','UserController@create')->name('create-user');

    Route::get('/edit/{id}','UserController@edit')->name('edit-user');
 
    
    Route::post('/','UserController@store')->name('store-user');
    Route::post('/update','UserController@update')->name('update-user');


 
    
});
//user end






Route::get('/home', 'HomeController@index')->name('home');
