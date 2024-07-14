<?php

use App\Http\Controllers\AffiliateController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SettingController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
//danh muc
Route::prefix('category')->group(function () {
    Route::get('/list', [CategoryController::class,'list'])->name('category.list');
    Route::get('/create', [CategoryController::class,'create'])->name('category.create');
    Route::post('/insert', [CategoryController::class,'insert'])->name('category.insert');
    Route::get('/edit', [CategoryController::class,'edit'])->name('category.edit');
    Route::post('/update', [CategoryController::class,'update'])->name('category.update');
    Route::get('/delete', [CategoryController::class,'delete'])->name('category.delete');
    Route::get('/trash', [CategoryController::class,'trash'])->name('category.trash');
});
//link lien ket
Route::prefix('affiliate')->group(function () {
    Route::get('/list', [AffiliateController::class,'list'])->name('affiliate.list');
    Route::get('/create', [AffiliateController::class,'create'])->name('affiliate.create');
    Route::post('/insert', [AffiliateController::class,'insert'])->name('affiliate.insert');
    Route::get('/edit', [AffiliateController::class,'edit'])->name('affiliate.edit');
    Route::post('/update', [AffiliateController::class,'update'])->name('affiliate.update');
    Route::get('/delete', [AffiliateController::class,'delete'])->name('affiliate.delete');
    Route::get('/trash', [AffiliateController::class,'trash'])->name('affiliate.trash');
});
//san pham
Route::prefix('product')->group(function () {
    Route::get('/list', [ProductController::class,'list'])->name('product.list');
    Route::get('/create', [ProductController::class,'create'])->name('product.create');
    Route::post('/insert', [ProductController::class,'insert'])->name('product.insert');
    Route::get('/edit', [ProductController::class,'edit'])->name('product.edit');
    Route::post('/update', [ProductController::class,'update'])->name('product.update');
    Route::get('/delete', [ProductController::class,'delete'])->name('product.delete');
    Route::get('/trash', [ProductController::class,'trash'])->name('product.trash');
    Route::get('/detail', [ProductController::class,'detail'])->name('product.detail');
});
//cai dat
Route::prefix('setting')->group(function () {
    Route::get('/list', [SettingController::class,'list'])->name('setting.list');
    Route::get('/create', [SettingController::class,'create'])->name('setting.create');
    Route::post('/insert', [SettingController::class,'insert'])->name('setting.insert');
    Route::get('/edit', [SettingController::class,'edit'])->name('setting.edit');
    Route::post('/update', [SettingController::class,'update'])->name('setting.update');
    Route::get('/delete', [SettingController::class,'delete'])->name('setting.delete');
    Route::get('/trash', [SettingController::class,'trash'])->name('setting.trash');
});
