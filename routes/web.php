<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ContactUsController;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\NewsController;
// use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SubCategoryController;
use Spatie\Permission\Models\Role;

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

Auth::routes();


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('contact', ContactUsController::class)->except('show');
Route::resource('faq', FaqController::class)->except('show');
Route::resource('categories', CategoryController::class);
Route::resource('news', NewsController::class);


Route::post('subcategories/{category}', [SubCategoryController::class, 'store'])->name('sub.category.store');
Route::post('categories/{subcategory}', [SubCategoryController::class, 'update'])->name('sub.category.update');
Route::delete('subcategories/{subcategory}', [SubCategoryController::class, 'destroy'])->name('sub.category.destroy');
Route::resource('categories', CategoryController::class);

// Route::post('news/{news}', [NewsController::class, 'store'])->name('news.store');
// Route::post('news/{news}', [NewsController::class, 'update'])->name('news.update');
// Route::delete('news/{news}', [NewsController::class, 'destroy'])->name('news.destroy');

?>
