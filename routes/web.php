<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Frontend\CartController;
use App\Http\Controllers\Frontend\CheckoutController;
use Illuminate\Routing\RouteGroup;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\FrontendController;
use App\Http\Controllers\Frontend\UserController;

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
Route::get('category',  [FrontendController::class, 'category'])->name('categoryall');
Route::get('view-category/{slug}', [FrontendController::class, 'viewcategory']);
Route::get('category/{cate_slug}/{prod_slug}', [FrontendController::class, 'productview']);


Route::get('product-list', [FrontendController::class, 'listproductajax']);
Route::post('searchproduct', [FrontendController::class, 'searchproduct']);

Auth::routes();


// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('cart-data', [CartController::class, 'cartcount'])->name('data-load');

Route::post('add-cart', [CartController::class, 'addProduct'])->name('add-cart');
Route::post('delete-cart-item', [CartController::class, 'deleteproduct'])->name('delete-cart');
Route::post('update-cart', [CartController::class, 'updatecart']);


Route::middleware(['auth'])->group(function () {
    Route::get('/cart', [CartController::class, 'cart'])->name('cart');
    Route::get('/Checout', [CheckoutController::class, 'index'])->name('checkout-product');
    Route::post('/place-order', [CheckoutController::class, 'placeorder'])->name('place-order');

    Route::get('/my-order', [UserController::class, 'index'])->name('order-product');
    Route::get('/view-order/{id}', [UserController::class, 'view'])->name('order-view');
});




Route::middleware(['auth', 'isAdmin'])->group(function () {
    Route::get('dashboard', [HomeController::class, 'index'])->name('dashboard');


    Route::get('/users', [DashboardController::class, 'Users'])->name('form.users');
    Route::get('/view-users/{id}', [DashboardController::class, 'viewusers'])->name('form.users.view');


    //route order
    Route::controller(OrderController::class,)->group(function () {
        Route::get('/orders', 'index')->name('orders-web');
        Route::get('admin/view-order/{id}', 'view')->name('admin.order.view');
        Route::put('update-order/{id}', 'updateorder')->name('update-order');
        Route::get('/order-history', 'orderhystory')->name('history-order');
    });


    //route categorys
    Route::controller(CategoryController::class)->group(function () {
        Route::get('/tcategory', 'index')->name('admin/category');
        Route::get('/category/create', 'create')->name('create');
        Route::post('/category', 'store')->name('category.store');
        Route::get('/category-edit/{category}', 'edit')->name('category.edit');
        Route::put('/category/{category}', 'update')->name('update.category');
        Route::get('/category/{category}', 'destroy')->name('cdelete');
    });

    //route product
    Route::controller(ProductController::class)->group(function () {
        Route::get('/product', 'index')->name('admin/product');
        Route::get('/product/create', 'create')->name('product.create');
        Route::post('/product', 'store');
        Route::get('/edit-product/{id}', 'edit')->name('product.edit');
        Route::put('update-product/{id}', 'update')->name('update.product');
        Route::get('delete-product/{id}', 'destroy')->name('product.delete');
    });
});
