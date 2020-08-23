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
    return view('wallet.html.index');
});
Route::prefix('admin')->group(function (){
    Route::prefix('incomes')->group(function (){
        Route::get('/','IncomeController@getAll')->name('incomes.list');
        Route::get('/add','IncomeController@showFormAdd')->name('incomes.showFormAdd');
        Route::post('/add','IncomeController@add')->name('incomes.add');
    });
    Route::prefix('categories')->group(function (){
        Route::get('/','CategoryController@getAll')->name('categories.list');
        Route::get('/add','CategoryController@showFormAdd')->name('categories.showFormAdd');
        Route::post('/add','CategoryController@addCategory')->name('categories.addCategory');
    });
    Route::prefix('outcomes')->group(function (){
        Route::get('/','OutcomeController@getAll')->name('outcomes.list');
        Route::get('/add','OutcomeController@showFormAdd')->name('outcomes.showFormAdd');
        Route::post('/add','OutcomeController@addOutcome')->name('outcomes.addOutcome');
        Route::get('/{id}/edit','OutcomeController@showFormEdit')->name('outcomes.showFormEdit');
        Route::post('/{id}/edit','OutcomeController@update')->name('outcomes.update');

    });
});

