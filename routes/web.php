<?php

use App\Http\Controllers\product\ProductsController;
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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/',[ProductsController::class,'index']);
Route::post('/products',[ProductsController::class,'store']);
Route::get('/fetch-product',[ProductsController::class,'fetchProduct']);
Route::get('/edit-product/{id}',[ProductsController::class,'edit']);
Route::post('/update-product',[ProductsController::class,'update']);
Route::get('/delete-product/{id}',[ProductsController::class,'destroy']);
