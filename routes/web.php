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

    Route::get('/','DashboardController@createTimeStampAlias')->name('home');


    Route::prefix('dashboard')->group(function () {
        Route::get('/','DashboardController@createTimeStampAlias')->name('dashboard');
    });


    //user start
    Route::middleware(['adminOnly'])->prefix('user')->group(function () {


        Route::get('/','UserController@index')->name('users');
        Route::get('/delete/{id}','UserController@trash')->name('trash-users');

        Route::get('/create','UserController@create')->name('create-user');

        Route::get('/edit/{id}','UserController@edit')->name('edit-user');


        Route::post('/','UserController@store')->name('store-user');
        Route::post('/update','UserController@update')->name('update-user');

        Route::get('/profile','UserController@profile')->name('profile');
        Route::post('/changePhoto','UserController@changePhoto')->name('change-photo');
        Route::post('/profile','UserController@changePassword')->name('change-password');

    });
    //user end


    Route::get('/activity','UserController@showUsersActivity')->name('showUsersActivity');
    Route::get('/myActivity','UserController@showMyActivity')->name('showMyActivity');


    //supplier start
    Route::prefix('supplier')->group(function () {

        Route::get('/','SupplierController@index')->name('suppliers');
        Route::get('/delete/{id}','SupplierController@trash')->name('trash-supplier');

        Route::get('/create','SupplierController@create')->name('create-supplier');

        Route::get('/edit/{id}','SupplierController@edit')->name('edit-supplier');


        Route::post('/','SupplierController@store')->name('store-supplier');
        Route::post('/update','SupplierController@update')->name('update-supplier');


    });
    //supplier end


    //customer start
    Route::prefix('customer')->group(function () {

        Route::get('/','CustomerController@index')->name('customers');
        Route::get('/delete/{id}','CustomerController@trash')->name('trash-customer');

        Route::get('/create','CustomerController@create')->name('create-customer');

        Route::get('/edit/{id}','CustomerController@edit')->name('edit-customer');
        Route::get('/{id}','CustomerController@show')->name('view-customer');


        Route::post('/','CustomerController@store')->name('store-customer');
        Route::post('/update','CustomerController@update')->name('update-customer');

    });
    //customer end

    Route::prefix('parts')->group(function () {

        Route::get('/','PartController@index')->name('parts');
        //Route::get('/{id}','PartController@show')->name('parts');
        Route::get('/create','PartController@create')->name('create-parts');

        Route::get('/edit/{id}','PartController@edit')->name('edit-parts');


        Route::post('/','PartController@store')->name('store-parts');
        Route::post('/update','PartController@update')->name('update-parts');
        Route::get('/delete/{id}','PartController@trash')->name('trash-parts');

    });


    Route::prefix('vehicles')->group(function () {

         Route::get('/','VehicleController@index')->name('vehicles');
        // Route::get('/{id}','VehicleController@show')->name('parts');
        Route::get('/create','VehicleController@create')->name('create-vehicles');
        Route::get('/edit/{id}','VehicleController@edit')->name('edit-vehicles');
        Route::post('/','VehicleController@store')->name('store-vehicles');
        Route::post('/update','VehicleController@update')->name('update-vehicles');
        Route::get('/delete/{id}','VehicleController@trash')->name('trash-vehicles');

    });

    Route::prefix('part-types')->group(function () {

        Route::get('/','PartController@indexType')->name('part-types');
        Route::get('/create','PartController@createType')->name('create-part-types');
        Route::get('/edit/{id}','PartController@editType')->name('edit-part-types');
        Route::post('/','PartController@storeType')->name('store-part-types');
        Route::post('/update','PartController@updateType')->name('update-part-types');
        Route::get('/delete/{id}','PartController@trashType')->name('trash-part-types');


    });

    Route::prefix('transaction')->group(function () {

        Route::get('/transactions','TransactionController@index')->name('transactions');
        Route::get('/buy','TransactionController@loadBuyForm')->name('buy-parts');
        Route::get('/sell','TransactionController@loadSellForm')->name('sell-parts');

        Route::get('/edit/{transaction_id}','TransactionController@edit')->name('edit-transaction');

        Route::post('/buy','TransactionController@buyPart')->name('buy-parts-process');
        Route::post('/sell','TransactionController@sellPart')->name('sell-parts-process');

        Route::post('/update','TransactionController@update')->name('update-parts-process');


        Route::get('forms/{componentType}','TransactionController@loadFormComponent');
        Route::get('forms/{componentType}/{part_type_id}','TransactionController@loadFormComponent');

        Route::get('graphs/daily','TransactionController@loadDailyGraphData');
        Route::get('graphs/daily-sales','TransactionController@loadDailySalesGraphData');
        Route::get('graphs/sales/part-type','TransactionController@loadTopSellingPartTypeGraphData');

    });



    Route::get('/ammendments','AmmendmentTrackerController@index')->name('ammendments');
    Route::get('/report','ReportController@generateReport')->name('report');



    Route::get('/logout',function(){
        auth()->logout();
        return redirect('/login');
    });


});






//Route::get('/home', 'HomeController@index')->name('home');
