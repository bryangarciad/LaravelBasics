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

/*
|When u want to rertun a view quick you can use this shorcut, much cleaner
*/
Route::view('/about', 'about');

/*
|Passing some data to a view; Never use logic in routes use controllers
*/

// RESTfull Controller
// Route::get('/customers', 'App\Http\Controllers\CustomersController@index'); //index
// Route::post('/customers', 'App\Http\Controllers\CustomersController@store'); //store
// Route::get('/customers/create', 'App\Http\Controllers\CustomersController@create'); //create
// Route::get('customers/{customer}', 'App\Http\Controllers\CustomersController@show'); //show
// Route::get('customers/{customer}/edit', 'App\Http\Controllers\CustomersController@edit'); //edit
// Route::patch('customers/{customer}', 'App\Http\Controllers\CustomersController@update'); //update
// Route::delete('customers/{customer}', 'App\Http\Controllers\CustomersController@destroy'); //update

/*
|SESSION 18 you can make a restfull with a single line; just rememebr to follow the laravel rules fo rREST
*/
//its possible to apply midddleware at the route level
// Route::resource('customers', 'App\Http\Controllers\CustomersController')->middleware('auth');
Route::resource('customers', 'App\Http\Controllers\CustomersController');

Route::get('contact', 'App\Http\Controllers\ContactFormController@create')->name('contact.create');
Route::post('contact', 'App\Http\Controllers\ContactFormController@store')->name('contact.store');
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
