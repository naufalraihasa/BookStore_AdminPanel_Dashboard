<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BooksController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\StoreController;
use App\Http\Controllers\AnalyticsController;
use App\Http\Controllers\CategoriesController;

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
//     return view('login');
// });

Route::get('/', [LoginController::class,'login'])->name('login');
Route::post('/authentication', [LoginController::class,'authentication'])->name('authentication');
Route::get('/logout', [LoginController::class,'logout'])->name('logout');


Route::group(['middleware' => ['auth','hakakses:master']], function(){
    Route::get('/analytics', [AnalyticsController::class, "index"])->name("analytics");
    Route::get('/analytics/filter', [AnalyticsController::class, "index"])->name('analytics.filter');
    Route::get('/stores', [StoreController::class, "index"])->name("stores");
    Route::get('/categories', [CategoriesController::class, "index"])->name("categories");
    Route::get('/addcategories', [CategoriesController::class, "addcategories"])->name("addcategories");
    Route::post('/insertcategories', [CategoriesController::class, "insertcategories"])->name("insertcategories");
    Route::get('/editcategories/{id}', [CategoriesController::class, "editcategories"])->name("editcategories");
    Route::post('/updatecategories/{id}', [CategoriesController::class, "updatecategories"])->name("updatecategories");
    Route::get('/deletecategories/{id}', [CategoriesController::class, "deletecategories"])->name("deletecategories");
    Route::get('/books', [BooksController::class, "index"])->name("books");
    Route::get('/addbooks', [BooksController::class, "addbooks"])->name("addbooks");
    Route::post('/insertbooks', [BooksController::class, "insertbooks"])->name("insertbooks");
    Route::get('/editbooks/{id}', [BooksController::class, "editbooks"])->name("editbooks");
    Route::post('/updatebooks/{id}', [BooksController::class, "updatebooks"])->name("updatebooks");
    Route::get('/deletebooks/{id}', [BooksController::class, "deletebooks"])->name("deletecategories");
});

Route::group(['middleware' => ['auth','hakakses:userA']], function(){
    Route::get('/analytics_store_A', [AnalyticsController::class, "analyticsA"])->name("analyticsA");
    Route::get('/books_store_A', [BooksController::class, "booksA"])->name("booksA");
});

Route::group(['middleware' => ['auth','hakakses:userB']], function(){
    Route::get('/analytics_store_B', [AnalyticsController::class, "analyticsB"])->name("analyticsB");
    Route::get('/books_store_B', [BooksController::class, "booksB"])->name("booksB");
});




Route::get('/add_user', [LoginController::class,'add_user'])->name('add_user');
Route::post('/add_user_input', [LoginController::class,'add_user_input'])->name('add_user_input');


















