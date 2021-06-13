<?php

include_once '../database/databasepc.php';

use App\Http\Controllers\ControllerProduct;
use App\Http\Controllers\ControllerCategory;
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

Route::get('/', [ControllerProduct::class, "home"]);
Route::get('/list-product', [ControllerProduct::class, "listProduct"]);
Route::get('/add-product', [ControllerProduct::class, "addProduct"]);
Route::get('/save-product', [ControllerProduct::class, "saveProduct"]);
Route::get('/edit-product', [ControllerProduct::class, "editProduct"]);
Route::get('/list-category', [ControllerCategory::class, "listCategory"]);
Route::get('/add-category', [ControllerCategory::class, "addCategory"]);
Route::get('/edit-category', [ControllerCategory::class, "editCategory"]);
