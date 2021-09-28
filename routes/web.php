<?php

use Illuminate\Support\Facades\Route;
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

Route::get('/', function () {
    return view('welcome');
});
Route::get('dashboard', function () {
    return view('admin/dashboard');
});

// Category
Route::group(['prefix'=>'admin/category/'], function(){
    Route::get('category', [CategoryController::class, 'index']);
    Route::get('create',  [CategoryController::class, 'create']);
    Route::post('insert', [CategoryController::class, 'store']);
    Route::get('edit/{id}', [CategoryController::class, 'edit']);
    Route::post('update/{id}', [CategoryController::class, 'update']);


});

// Sub Category
Route::group(['prefix'=>'admin/subCategory/'], function(){
    Route::get('subCategory', [SubCategoryController::class, 'index']);
    Route::get('create', [SubCategoryController::class, 'create']);
    Route::post('insert', [SubCategoryController::class, 'store']);
});

// Route::get('admin/category', function () {
//     return view('admin.category.category');
// });
// Route::get('category/create', function () {
//     return view('admin.category.create');
// });
// Route::post('/category/insert', [CategoryController::class, 'store']);

