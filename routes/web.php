<?php

use Illuminate\Support\Facades\Auth;
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
/** Frontend Routes **/

Route::get('/', function () {
    return view('welcome');
});
Route::resource('/', \App\Http\Controllers\FrontendHomeController::class);
Route::get('/contactformulier', 'App\Http\Controllers\ContactController@create');
Route::post('/contactformulier', 'App\Http\Controllers\ContactController@store');

Auth::routes(['verify' => true]);



/** Backend Routes **/

/** Only for Admin **/

Route::group(['prefix' => 'admin', 'middleware' => 'admin'], function () {
    Route::resource('users', \App\Http\Controllers\AdminUsersController::class);
    Route::get('users/restore/{user}', 'App\Http\Controllers\AdminUsersController@restore')->name('users.restore');
    Route::resource('postComments', \App\Http\Controllers\AdminPostCommentController::class);


});

/** Only when you are verified and active **/

Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'verified']], function () {
    Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->middleware('verified')->name('homebackend');
    Route::resource('posts', App\Http\Controllers\AdminPostsController::class);
    Route::resource('postCategories', App\Http\Controllers\AdminPostsCategoriesController::class);
    Route::get('postCategories/restore/{postCategory}', 'App\Http\Controllers\AdminPostsCategoriesController@restore')->name('postCategories.restore');
});

