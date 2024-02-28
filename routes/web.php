<?php

use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FaqController;
// use App\Http\Controllers\ProfileController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ContactUsController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\SubCategoryController;
use App\Models\ContactUs;

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
    return view('pages.index');
});

Auth::routes();


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('categories', CategoryController::class);
Route::resource('user', UserController::class);

Route::patch('approved-user/{user}', [UserController::class, 'approved'])->name('user.approved');
Route::patch('reject-user/{user}', [UserController::class, 'reject'])->name('user.reject');

Route::post('subcategories/{category}', [SubCategoryController::class, 'store'])->name('sub.category.store');
Route::post('categories/{subcategory}', [SubCategoryController::class, 'update'])->name('sub.category.update');
Route::delete('subcategories/{subcategory}', [SubCategoryController::class, 'destroy'])->name('sub.category.destroy');
Route::resource('categories', CategoryController::class);

Route::get('contact', [ContactUsController::class, 'index'])->name('contact.index');
Route::post('contact', [ContactUsController::class, 'store'])->name('contact.store');
Route::put('contact/{contact}', [ContactUsController::class, 'update'])->name('contact.update');
Route::delete('contact/{contact}', [ContactUsController::class, 'destroy'])->name('contact.destroy');

Route::get('faq', [FaqController::class, 'index'])->name('faq.index');
Route::post('faq', [FaqController::class, 'store'])->name('faq.store');
Route::put('faq/{faq}', [FaqController::class, 'update'])->name('faq.update');
Route::delete('faq/{faq}', [FaqController::class, 'destroy'])->name('faq.destroy');

Route::get('approved-news', [NewsController::class, 'see'])->name('approved-news.index');

Route::patch('approved-news/{news}', [NewsController::class, 'approved'])->name('approved-news');
Route::post('approved-all', [NewsController::class, 'approvedall'])->name('approved-all.news');

Route::patch('reject-news/{news}', [NewsController::class, 'reject'])->name('reject-news');

Route::get('news', [NewsController::class, 'index'])->name('news.index');
Route::post('news', [NewsController::class, 'store'])->name('news.store');
Route::put('news/{news}', [NewsController::class, 'update'])->name('news.update');
Route::delete('news/{news}', [NewsController::class, 'destroy'])->name('news.destroy');

//trending ke-?
Route::get('option-editor-news/{news}', [NewsController::class, 'trending'])->name('news.option.editor');
Route::get('filter-news-admin', [NewsController::class, 'filter'])->name('news.filter');

Route::get('inbox', [ReportController::class, 'index'])->name('report.index');
Route::get('profile', [ProfileController::class, 'index'])->name('profile.index');
Route::get('profilecreate', [ProfileController::class, 'createberita'])->name('profile.berita.create');
Route::post('profilecreatenews', [ProfileController::class, 'store'])->name('profile.berita.store');

Route::get('news-singgle-post', [NewsController::class, 'usernews'])->name('news.user');
?>
