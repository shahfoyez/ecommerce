<?php

use App\Http\Controllers\admin\GeneralController;
use App\Models\Category;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SubCategoryController;



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

// General Start
Route::get('/', [GeneralController::class, 'index']);
Route::get('/category/{category:slug}', [GeneralController::class, 'productByCategory']);
Route::get('/subCategory/{subCategory:slug}', [GeneralController::class, 'productBySubCategory']);
Route::get('/product/{product}', [GeneralController::class, 'productById']);
// General End

// Admin Start
Route::get('admin/dashboard', function () {
    return view('admin/dashboard');
});

// Category
Route::group(['prefix'=>'admin/category'], function(){
    Route::get('/category', [CategoryController::class, 'index']);
    Route::get('/create',  [CategoryController::class, 'create']);
    Route::post('/insert', [CategoryController::class, 'store']);
    Route::get('/edit/{category}', [CategoryController::class, 'edit']);
    Route::post('/update', [CategoryController::class, 'update']);
    Route::get('/delete/{category}', [CategoryController::class, 'destroy']);

});
// Sub Category
Route::group(['prefix'=>'admin/subCategory'], function(){
    Route::get('/subCategory', [SubCategoryController::class, 'index']);
    Route::get('/create', [SubCategoryController::class, 'create']);
    Route::post('/insert', [SubCategoryController::class, 'store']);
    Route::get('/edit/{subCategory}', [SubCategoryController::class, 'edit']);
    Route::post('/update', [SubCategoryController::class,'update']);
    Route::get('/delete/{subCategory}', [SubCategoryController::class, 'destroy']);
});
// Product
Route::group(['prefix'=>'admin/product'], function(){
    Route::get('/product', [ProductController::class, 'index']);
    Route::get('/create',  [ProductController::class, 'create']);
    Route::post('/insert', [ProductController::class, 'store']);
    Route::get('/edit/{product}', [ProductController::class, 'edit']);
    Route::post('/update', [ProductController::class, 'update']);
    Route::get('/delete/{product}', [ProductController::class, 'destroy']);

});
Route::get('/subcategories', [ProductController::class, 'subCategories']);

//Admin End

