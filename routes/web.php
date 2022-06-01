<?php

use App\Models\listing;
use GuzzleHttp\Psr7\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ListingController;
use GuzzleHttp\Middleware;

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
Route::middleware('auth')->group(function () {
    Route::get('/listings/create',[ListingController::class,'create'])->name('listing.create');
    Route::post('/listings',[ListingController::class,'store'])->name('listing.store');
    Route::get('/listings/{listing}/edit',[ListingController::class,'edit'])->name('listing.edit');
    Route::put('/listings/{listing}',[ListingController::class,'update'])->name('listing.update');
    Route::delete('/listings/{listing}',[ListingController::class,'delete'])->name('listing.delete');
    Route::get('listings/manage',[ListingController::class,'manage'])->name('listing.manage');
    Route::put('/account/update',[UserController::class,'update'])->name('account.update');
    Route::get('/account',[UserController::class,'account'])->name('user.account');
});

Route::get('/login',[UserController::class,'login'])->name('login')->middleware('guest');
Route::get('/register',[UserController::class,'register'])->name('register')->middleware('guest');
Route::get('/',[ListingController::class,'index']);
Route::get('/listings/{listing}',[ListingController::class,'show']);
Route::post('/users',[UserController::class,'store'])->name('user.register');
Route::post('/users/authenticate',[UserController::class,'authenticate'])->name('user.login');
Route::post('/logout',[UserController::class,'logout']);

