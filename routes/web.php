<?php

use App\Http\Controllers\MollieController;
use App\Http\Controllers\FrontendPostController;
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
Route::get('/', [App\Http\Controllers\FrontendHomeController::class, 'index'])->name('webshop');
Route::resource('shop', \App\Http\Controllers\FrontendShopController::class);
Route::get('/addToCart/{id}', 'App\Http\Controllers\FrontendShopController@addToCart')->name('addToCart');
Route::get('/removeFromCart/{id}', 'App\Http\Controllers\FrontendShopController@removeFromCart')->name('removeFromCart');
Route::get('/removeAllFromCart/{id}', 'App\Http\Controllers\FrontendShopController@removeAllFromCart')->name('removeAllFromCart');
Route::get('product/color/{id}/{name}', 'App\Http\Controllers\FrontendShopController@productsPerColor')->name('productsPerColor');
Route::get('cart','App\Http\Controllers\FrontendShopController@shoppingCart')->name('shoppingCart');
Route::post('orderAdress','App\Http\Controllers\FrontendShopController@orderAdress')->name('orderAdress');

Route::get('thanks','App\Http\Controllers\FrontendShopController@thanksPage')->name('thanksPage');

/** MailContact Frontend **/
Route::resource('contact', \App\Http\Controllers\ContactController::class);


/** BLOG **/

Route::resource('blogs', FrontendPostController::class);
Route::get('blog/{post:slug}', '\App\Http\Controllers\AdminPostsController@post')->name('blogs.post');
Route::get('blog/category/{id}', '\App\Http\Controllers\FrontendPostController@blogsPerCategory')->name('blogsPerCategory');

/** Mollie **/
Route::get('mollie-payment',[MollieController::Class,'preparePayment'])->name('mollie.payment');
Route::get('payment-success',[MollieController::Class, 'paymentSuccess'])->name('payment.success');


Auth::routes(['verify' => true]);

/** Backend Routes **/

/** Only for Admin **/

Route::group(['prefix' => 'admin', 'middleware' => 'admin'], function () {
    Route::resource('users', \App\Http\Controllers\AdminUsersController::class);
    Route::get('users/restore/{user}', 'App\Http\Controllers\AdminUsersController@restore')->name('users.restore');

    Route::resource('postComments', \App\Http\Controllers\AdminPostCommentController::class);

    Route::resource('posts', App\Http\Controllers\AdminPostsController::class);

    Route::resource('products', App\Http\Controllers\AdminProductsController::class);
    Route::get('products/restore/{product}', 'App\Http\Controllers\AdminProductsController@restore')->name('products.restore');
    Route::get('products/brand/{id}', 'App\Http\Controllers\AdminProductsController@productsPerBrand')->name('productsPerBrand');
    Route::get('product/{id}/colors', 'App\Http\Controllers\AdminProductsController@selectProductColor')->name('productColor');
    Route::post('product/{id}/colors/store', 'App\Http\Controllers\AdminProductsController@selectProductColorStore')->name('productColorStore');
    Route::get('product/{id}/productDetails/{name}', 'App\Http\Controllers\AdminProductsController@createProductDetails')->name('productDetails.create');
    Route::post('product/{id}/productDetails/store', 'App\Http\Controllers\AdminProductsController@storeProductDetails')->name('productDetails.store');
    Route::get('product/{id}/images', 'App\Http\Controllers\AdminProductsController@createProductDetailsImages')->name('productDetailsImages.create');
    Route::post('product/{id}/images/store', 'App\Http\Controllers\AdminProductsController@storeProductDetailsImages')->name('productDetailsImages.store');
    Route::get('product/{id}/images/edit', 'App\Http\Controllers\AdminProductsController@editProductDetailsImages')->name('productDetailsImages.edit');
    Route::post('product/{id}/images/update', 'App\Http\Controllers\AdminProductsController@updateProductDetailsImages')->name('productDetailsImages.update');

    Route::resource('productsDetails', App\Http\Controllers\AdminProductDetailsController::class);

    Route::resource('productCategories', App\Http\Controllers\AdminProductCategoriesController::class);
    Route::get('productCategories/restore/{productCategory}', 'App\Http\Controllers\AdminProductCategoriesController@restore')->name('productCategories.restore');

    Route::resource('brands', App\Http\Controllers\AdminBrandsController::class);
    Route::get('brands/restore/{brand}', 'App\Http\Controllers\AdminBrandsController@restore')->name('brands.restore');

    Route::resource('colors', App\Http\Controllers\AdminColorController::class);
    Route::get('colors/restore/{color}', 'App\Http\Controllers\AdminColorController@restore')->name('colors.restore');

    Route::resource('cloth-sizes', App\Http\Controllers\AdminClothSizesController::class);
    Route::get('cloth-size/restore/{cloth-size}', 'App\Http\Controllers\AdminClothSizesController@restore')->name('cloth-size.restore');

    Route::resource('genders', App\Http\Controllers\AdminGendersController::class);
    Route::get('gender/restore/{gender}', 'App\Http\Controllers\AdminGendersController@restore')->name('gender.restore');

    Route::resource('discounts', App\Http\Controllers\AdminDiscountsController::class);
    Route::get('discounts/restore/{discounts}', 'App\Http\Controllers\AdminDiscountsController@restore')->name('discounts.restore');

    Route::resource('postCategories', App\Http\Controllers\AdminPostsCategoriesController::class);
    Route::get('postCategories/restore/{postCategory}', 'App\Http\Controllers\AdminPostsCategoriesController@restore')->name('postCategories.restore');

});

/** Only when you are verified and active **/

Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'verified']], function () {

    Route::get('checkout','App\Http\Controllers\FrontendShopController@checkout')->name('checkout');
    Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->middleware('verified')->name('homebackend');

    Route::get('users/settings/{user}', 'App\Http\Controllers\AdminUsersController@changeSettings')->name('users.settings');
    Route::patch('users/settings/{user}/update', 'App\Http\Controllers\AdminUsersController@settingsUpdate')->name('users.settingsUpdate');

    Route::resource('orders', App\Http\Controllers\AdminOrderController::class);
    Route::get('orderList', 'App\Http\Controllers\AdminOrderController@index_user')->name('index.user');



});

