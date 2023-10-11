<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BooksController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/categories', [CategoriesController::class, "index"])->name("categories");

Route::get('/books', [BooksController::class, "index"])->name("books");

Route::get('/addcategories', [CategoriesController::class, "addcategories"])->name("addcategories");
Route::post('/insertcategories', [CategoriesController::class, "insertcategories"])->name("insertcategories");

Route::get('/editcategories/{id}', [CategoriesController::class, "editcategories"])->name("editcategories");
Route::post('/updatecategories/{id}', [CategoriesController::class, "updatecategories"])->name("updatecategories");

Route::get('/deletecategories/{id}', [CategoriesController::class, "deletecategories"])->name("deletecategories");