<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\User;
use App\Http\Controllers\ProductInfo;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [ProductInfo::class, 'getProductinfo']);

Route::post('/add_product_info_anyname', [ProductInfo::class, 'index'])->name('add_product_info'); 
Route::post('/add_product_info_ajax', [ProductInfo::class, 'add_product_info_ajaxanyname'])->name('add_product_info_ajax'); 