<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\Auth\LoginController;
use App\Http\Controllers\ControllerProduct;
use App\Http\Controllers\CartController;

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

// danh cho user
Route::match(["get", "post"], "login", [LoginController::class, "login"])->name("login");


Route::middleware("auth")->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::get('/cart', [CartController::class, "cart"]);
//Route::get('/checkout', [CartController::class, "checkout"]);
Route::get('/checkout', function () {
    return view('spa_view');
});
Route::post('/checkout', [CartController::class, "placeOrder"]);


//api danh sach san pham
Route::get("/product-list", [ControllerProduct::class, "productList"]);
Route::get("/cart-items", [CartController::class, "cartItems"]);




