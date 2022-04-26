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

    Route::resource('products', App\Http\Controllers\AdminProductsController::class);
    Route::resource('productCategories', App\Http\Controllers\AdminProductCategoriesController::class);
    Route::get('productCategories/restore/{productCategory}', 'App\Http\Controllers\AdminBrandsController@restore')->name('productCategories.restore');
    Route::resource('brands', App\Http\Controllers\AdminBrandsController::class);
    Route::get('brands/restore/{brand}', 'App\Http\Controllers\AdminBrandsController@restore')->name('brands.restore');
    Route::resource('colors', App\Http\Controllers\AdminColorController::class);
    Route::get('colors/restore/{color}', 'App\Http\Controllers\AdminColorController@restore')->name('colors.restore');
    Route::resource('shoe-sizes', App\Http\Controllers\AdminShoeSizeController::class);
    Route::resource('cloth-sizes', App\Http\Controllers\AdminClothSizesController::class);
    Route::get('cloth-size/restore/{cloth-size}', 'App\Http\Controllers\AdminClothSizeController@restore')->name('cloth-size.restore');
    Route::resource('genders', App\Http\Controllers\AdminGendersController::class);

});

