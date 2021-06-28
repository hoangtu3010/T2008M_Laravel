<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ControllerProduct;
use App\Http\Controllers\ControllerCategory;
use App\Http\Controllers\ControllerBrand;
use App\Http\Controllers\Admin\Auth\LoginController;

//Route::match(["get", "post"], "login", [LoginController::class, "login"])->name("login");

// Khu vuc admin
Route::middleware("auth:admin")->group(function (){
    Route::middleware("admin")->group(function (){
        Route::get('/', [ControllerProduct::class, "home"]);
    });

    Route::get('/list-product', [ControllerProduct::class, "listProduct"]);
    Route::get('/list-product/add-product', [ControllerProduct::class, "addProduct"]);
    Route::post('/list-product/save-product', [ControllerProduct::class, "saveProduct"]);
    Route::get('/list-product/edit-product/{id}', [ControllerProduct::class, "editProduct"]);
    Route::post('/list-product/update-product/{id}', [ControllerProduct::class, "updateProduct"]);
    Route::get('/list-product/delete-product/{id}', [ControllerProduct::class, "deleteProduct"]);

    Route::get('/list-category', [ControllerCategory::class, "listCategory"]);
    Route::get('/list-category/add-category', [ControllerCategory::class, "addCategory"]);
    Route::post('/list-category/save-category', [ControllerCategory::class, "saveCategory"]);
    Route::get('/list-category/edit-category/{id}', [ControllerCategory::class, "editCategory"]);
    Route::post('/list-category/update-category/{id}', [ControllerCategory::class, "updateCategory"]);
    Route::get('/list-category/delete-category/{id}', [ControllerCategory::class, "deleteCategory"]);

    Route::get('/list-brand', [ControllerBrand::class, "listBrand"]);
    Route::get('/list-brand/add-brand', [ControllerBrand::class, "addBrand"]);
    Route::post('/list-brand/save-brand', [ControllerBrand::class, "saveBrand"]);
    Route::get('/list-brand/edit-brand/{id}', [ControllerBrand::class, "editBrand"]);
    Route::post('/list-brand/update-brand/{id}', [ControllerBrand::class, "updateBrand"]);
    Route::get('/list-brand/delete-brand/{id}', [ControllerBrand::class, "deleteBrand"]);
});
