<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\ContragentController;
use App\Http\Controllers\OperationController;

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

Route::resource('accounts', AccountController::class);
Route::get('accounts_options', AccountController::class . '@options')->name('accounts.options');

Route::resource('contragents', ContragentController::class);
Route::get('contragents_options', ContragentController::class . '@options')->name('contragents.options');

Route::resource('operations', OperationController::class);

Route::get('/operations', OperationController::class . '@index')->name('operations.index');
