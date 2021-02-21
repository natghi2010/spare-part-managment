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

// Route::get('/', function () {
//     return view('welcome');
// });


Auth::routes();


Route::middleware(['auth'])->group(function(){

    Route::get('/', function () {
        return view('dashboard');
    })->name('home');


    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');


    //user start
    Route::prefix('user')->group(function () {

        Route::get('/','UserController@index')->name('users');

        Route::get('/create','UserController@create')->name('create-user');

        Route::get('/edit/{id}','UserController@edit')->name('edit-user');

        Route::get('/activity','UserController@showUsersActivity')->name('showUsersActivity');
        Route::get('/myActivity','UserController@showMyActivity')->name('showMyActivity');


        Route::post('/','UserController@store')->name('store-user');
        Route::post('/update','UserController@update')->name('update-user');
    });
    //user end


    //supplier start
    Route::prefix('supplier')->group(function () {

        Route::get('/','supplierController@index')->name('suppliers');

        Route::get('/create','supplierController@create')->name('create-supplier');

        Route::get('/edit/{id}','supplierController@edit')->name('edit-supplier');


        Route::post('/','supplierController@store')->name('store-supplier');
        Route::post('/update','supplierController@update')->name('update-supplier');




    });
    //supplier end


    //customer start
    Route::prefix('customer')->group(function () {

        Route::get('/','customerController@index')->name('customers');

        Route::get('/create','customerController@create')->name('create-customer');

        Route::get('/edit/{id}','customerController@edit')->name('edit-customer');


        Route::post('/','customerController@store')->name('store-customer');
        Route::post('/update','customerController@update')->name('update-customer');

    });
    //customer end

    Route::prefix('parts')->group(function () {

        Route::get('/','PartController@index')->name('parts');
        //Route::get('/{id}','PartController@show')->name('parts');
        Route::get('/create','PartController@create')->name('create-parts');

        Route::get('/edit/{id}','PartController@edit')->name('edit-parts');


        Route::post('/','PartController@store')->name('store-parts');
        Route::post('/update','PartController@update')->name('update-parts');


    });

    Route::prefix('vehicles')->group(function () {

         Route::get('/','VehicleController@index')->name('vehicles');
        // Route::get('/{id}','VehicleController@show')->name('parts');
        Route::get('/create','VehicleController@create')->name('create-vehicles');
        Route::get('/edit/{id}','VehicleController@edit')->name('edit-vehicles');
        Route::post('/','VehicleController@store')->name('store-vehicles');
        Route::post('/update','VehicleController@update')->name('update-vehicles');

    });

    Route::prefix('part-types')->group(function () {

        Route::get('/','PartController@indexType')->name('part-types');
        Route::get('/create','PartController@createType')->name('create-part-types');
        Route::get('/edit/{id}','PartController@editType')->name('edit-part-types');
        Route::post('/','PartController@storeType')->name('store-part-types');
        Route::post('/update','PartController@updateType')->name('update-part-types');

    });

    Route::prefix('transaction')->group(function () {

        Route::get('/buy','TransactionController@loadBuyForm')->name('buy-parts');
        Route::get('/sell','TransactionController@loadSellForm')->name('sell-parts');

        Route::post('/buy','TransactionController@buyPart')->name('buy-parts-process');
        Route::post('/sell','TransactionController@sellPart')->name('sell-parts-process');

        Route::get('forms/{componentType}','TransactionController@loadFormComponent');
        Route::get('forms/{componentType}/{part_type_id}','TransactionController@loadFormComponent');


    });





    Route::get('/logout',function(){
        auth()->logout();
        return redirect('/login');
    });


});






//Route::get('/home', 'HomeController@index')->name('home');
