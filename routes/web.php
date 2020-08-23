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

Route::prefix('incomes')->group(function (){
    Route::get('/','IncomeController@getAll')->name('incomes.list');
    Route::get('/add','IncomeController@showFormAdd')->name('incomes.showFormAdd');
    Route::post('/add','IncomeController@add')->name('incomes.add');
});
