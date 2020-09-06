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
Route::get('FormRegister','AuthController@showFormRegister')->name('auth.showFormRegister');
Route::post('FormRegister','AuthController@register')->name('auth.register');
Route::get('FormLogin','AuthController@showFormLogin')->name('login');
Route::post('FormLogin','AuthController@login')->name('auth.login');
Route::get('logout','AuthController@logout')->name('auth.logout');
Route::middleware('auth')->prefix('admin')->group(function (){
    Route::prefix('categories')->group(function (){
        Route::get('/','CategoryController@getAll')->name('categories.list');
        Route::get('/add','CategoryController@showFormAdd')->name('categories.showFormAdd');
        Route::post('/add','CategoryController@addCategory')->name('categories.addCategory');
    });
Route::prefix('transactions')->group(function (){
    Route::get('/','TransactionController@getAll')->name('transactions.list');
    Route::get('/add','TransactionController@showFormAdd')->name('transactions.showFormAdd');
    Route::post('/add','TransactionController@addTransaction')->name('transactions.addTransaction');
    Route::get('/{id}/edit','TransactionController@showFormEdit')->name('transactions.showFormEdit');
    Route::post('/{id}/edit','TransactionController@Edit')->name('transactions.Edit');
    Route::get('/{id}/delete','TransactionController@delete')->name('transactions.delete');
    Route::get('/chart','TransactionController@getChart')->name('transactions.chart');

});
});

