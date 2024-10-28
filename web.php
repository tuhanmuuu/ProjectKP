<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CustomOrderController;
use App\Http\Controllers\MenController;
use App\Http\Controllers\WomenController;
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

//Route::get('/', function () {
//   return view('welcome');
//});
Route::middleware(['auth', 'role:user'])->group(
    function () {
        Route::get('/', [FrontController::class, 'index'])->name('front.home');
    }
);

Route::controller(AuthController::class)->group(function () {
    Route::get('register', 'register')->name('register');
    Route::post('register', 'registerSave')->name('register.save');

    Route::get('login', 'login')->name('login');
    Route::post('login', 'loginAction')->name('login.action');

    Route::get('logout', 'logout')->middleware('auth')->name('logout');
});

Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::controller(ProductController::class)->prefix('products')->group(function () {
        Route::get('', 'index')->name('products');
        Route::get('create', 'create')->name('products.create');
        Route::post('create', 'store')->name('products.store');
        Route::get('show/{id}', 'show')->name('products.show');
        Route::get('edit/{id}', 'edit')->name('products.edit');
        Route::put('edit/{id}', 'update')->name('products.update');
        Route::delete('destroy/{id}', 'destroy')->name('products.destroy');
    });

    Route::controller(OrderController::class)->prefix('orders')->group(function () {
        Route::get('', 'index')->name('orders');
        Route::get('create', 'create')->name('orders.create');
        Route::post('create', 'store')->name('orders.store');
        Route::get('show/{id}', 'show')->name('orders.show');
        Route::get('edit/{id}', 'edit')->name('orders.edit');
        Route::put('edit/{id}', 'update')->name('orders.update');
        Route::delete('destroy/{id}', 'destroy')->name('orders.destroy');
    });

    Route::controller(CustomerController::class)->prefix('customers')->group(function () {
        Route::get('', 'index')->name('customers');
        Route::get('create', 'create')->name('customers.create');
        Route::post('create', 'store')->name('customers.store');
        Route::get('show/{id}', 'show')->name('customers.show');
        Route::get('edit/{id}', 'edit')->name('customers.edit');
        Route::put('edit/{id}', 'update')->name('customers.update');
        Route::delete('destroy/{id}', 'destroy')->name('customers.destroy');
    });

    Route::get('/profile', [App\Http\Controllers\AuthController::class, 'profile'])->name('profile');
});




Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('dashboard');
Route::get('/product', [App\Http\Controllers\FrontProductController::class, 'index'])->name('product');
Route::get('/contact', [App\Http\Controllers\ContactController::class, 'index'])->name('contact');

Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('dashboard');
Route::get('/product', [App\Http\Controllers\FrontProductController::class, 'index'])->name('product');

Route::middleware('web')->group(function () {
    Route::post('/cart/add', [CartController::class, 'add'])->name('cart.add'); // Hanya POST untuk menambah item
    Route::get('/cart', [CartController::class, 'index'])->name('cart.index'); // Melihat isi cart
    Route::get('/cart/remove/{id}', [CartController::class, 'remove'])->name('cart.remove'); // Menghapus item dari cart
    Route::get('/checkout', [CheckoutController::class, 'index'])->name('cart.checkout'); // Halaman checkout
    Route::post('/checkout', [CheckoutController::class, 'submit'])->name('checkout.submit'); // Proses checkout
});



Route::get('/custom-order', [CustomOrderController::class, 'index'])->name('custom-order.index');
Route::post('/custom-order', [CustomOrderController::class, 'store'])->name('custom-order.store');

Route::get('/custom-order/men', [MenController::class, 'index'])->name('men.index');
Route::post('/custom-order/men', [MenController::class, 'store'])->name('men.store');
Route::get('/custom-order/women', [WomenController::class, 'index'])->name('custom-order.women');
