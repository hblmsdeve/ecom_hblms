<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Frontend\FrontendController;
use App\Http\Controllers\Frontend\CartController;
use App\Http\Controllers\Frontend\CheckoutController;
use App\Http\Controllers\Frontend\UserController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Frontend\WishlistController;
use App\Http\Controllers\Frontend\RatingController;
use App\Http\Controllers\Frontend\ReviewController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Admin\ProfilController;



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
Route::get('/', [FrontendController::class, 'index']);

Route::get('category', [FrontendController::class, 'category']);
Route::get('category/{slug}', [FrontendController::class, 'viewCategory']);
Route::get('category/{cate_slug}/{prod_slug}', [FrontendController::class, 'productView']);

Auth::routes();

Route::get('load-cart-data', [CartController::class, 'cartCount']);
Route::get('load-wishlist-data', [WishlistController::class, 'wishlistCount']);

Route::post('add-to-cart', [CartController::class, 'addProduct']);
Route::post('/delete-cart-item', [CartController::class, 'deleteProduct']);
Route::post('update-cart', [CartController::class, 'updateCart']);

Route::post('/add-to-wishlist', [WishlistController::class, 'add']);
Route::post('delete-wishlist-item', [WishlistController::class, 'deleteItem']);

Route::middleware(['auth'])->group(function () {
    Route::get('cart', [CartController::class, 'viewCart']);
    Route::get('checkout', [CheckoutController::class, 'index']);
    Route::post('place-order', [CheckoutController::class, 'placeOrder']);

    Route::get('my-orders', [UserController::class, 'index']);
    Route::get('view-order/{id}', [UserController::class, 'view']);

    Route::get('wishlist', [WishlistController::class, 'index']);

    Route::post('add-rating', [RatingController::class, 'add']);

    Route::get('add-review/{product_slug}/user-review', [ReviewController::class, 'add']);
    Route::post('/add-review', [ReviewController::class, 'Create']);
    Route::get('edit-review/{product_slug}/user-review', [ReviewController::class, 'edit']);
    Route::put('update-review', [ReviewController::class, 'update']);
});

Route::middleware(['auth', 'isAdmin'])->group(function () {
    
    Route::get('admin/dashboard', 'Admin\FrontendController@index');

    Route::get('admin/categories', 'Admin\CategoryController@index');
    Route::get('admin/add-category', 'Admin\CategoryController@add');
    Route::post('admin/insert-category', 'Admin\CategoryController@insert');
    Route::get('admin/edit-category/{id}', [CategoryController::class, 'edit']);
    Route::put('admin/update-category/{id}', [CategoryController::class, 'update']);
    Route::get('admin/delete-category/{id}', [CategoryController::class, 'destroy']);

    Route::get('admin/products', [ProductController::class, 'index']);
    Route::get('admin/add-product', [ProductController::class, 'add']);
    Route::post('admin/insert-product', [ProductController::class, 'insert']);
    Route::get('admin/edit-product/{id}', [ProductController::class, 'edit']);
    Route::put('admin/update-product/{id}', [ProductController::class, 'update']);
    Route::get('admin/delete-product/{id}', [ProductController::class, 'destroy']);
    
    Route::get('admin/orders', [OrderController::class, 'index']);
    Route::get('admin/view-order/{id}', [OrderController::class, 'view']);
    Route::put('admin/update-order/{id}', [OrderController::class, 'updateOrder']);
    Route::get('admin/order-history', [OrderController::class, 'history']);

    Route::get('admin/customers', [DashboardController::class, 'users']);
    Route::get('admin/customers/{id}', [DashboardController::class, 'view']);

    Route::get('admin/sliders', [SliderController::class, 'index']);
    Route::get('admin/add-slider', [SliderController::class, 'add']);
    Route::post('admin/insert-slider', [SliderController::class, 'insert']);
    Route::get('admin/edit-slider/{id}', [SliderController::class, 'edit']);
    Route::put('admin/update-slider/{id}', [SliderController::class, 'update']);
    Route::get('admin/delete-slider/{id}', [SliderController::class, 'destroy']);

    Route::get('admin/load-notification', 'Admin\FrontendController@notification');

    Route::get('admin/profil/{id}', [ProfilController::class, 'index']);
    Route::put('admin/update/{id}', [ProfilController::class, 'update']);

    Route::get('admin/settings', [ProfilController::class, 'admin']);
    Route::get('admin/settings/add', [ProfilController::class, 'add']);
    Route::put('admin/settings/update', [ProfilController::class, 'privelege']);
    Route::get('admin/settings/delete/{id}', [ProfilController::class, 'destroy']);
    Route::get('admin/settings/details/{id}', [ProfilController::class, 'details']);

});
