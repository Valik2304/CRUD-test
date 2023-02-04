<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductGroupController;
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


Route::redirect('/', 'products');//подивитись в доку про route redirect

Route::resource('products', ProductController::class);
Route::resource('groups', ProductGroupController::class);
