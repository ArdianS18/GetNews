<?php

use App\Http\Controllers\AuthorController;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FaqController;
// use App\Http\Controllers\ProfileController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ContactUsController;
use App\Http\Controllers\NewsHasLikeController;
use App\Http\Controllers\NewsViewController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\SubCategoryController;
use App\Models\Author;
use App\Models\ContactUs;
use App\Models\News;
use App\Models\SubCategory;

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

//     return view('pages.index');
// });

Route::get('/', [App\Http\Controllers\NewsViewController::class, 'showPopularView'])->name('popular.news');

Auth::routes();

//Beranda
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Approved And Reject Author
Route::resource('user', AuthorController::class);
Route::patch('approved-user/{user}', [AuthorController::class, 'approved'])->name('user.approved');
Route::patch('reject-user/{user}', [AuthorController::class, 'reject'])->name('user.reject');

Route::post('createauthor', [AuthorController::class, 'store'])->name('author.create');

Route::middleware(['role:user'])->group(function () {

});
Route::resource('user', UserController::class);
Route::patch('approved-user/{user}', [UserController::class, 'approved'])->name('user.approved');
Route::patch('reject-user/{user}', [UserController::class, 'reject'])->name('user.reject');

// Category and SubCategory
Route::resource('categories', CategoryController::class);
Route::post('subcategories/{category}', [SubCategoryController::class, 'store'])->name('sub.category.store');
Route::post('categories/{subcategory}', [SubCategoryController::class, 'update'])->name('sub.category.update');
Route::delete('subcategories/{subcategory}', [SubCategoryController::class, 'destroy'])->name('sub.category.destroy');
Route::get('sub-category-detail/{category}',[CategoryController::class,'getCategory'])->name('sub.category.id');
Route::resource('categories', CategoryController::class);


Route::get('author',function () {
    return view('pages.user.author.index');
})->name('author.index');


// ===> Contact
Route::get('contact', [ContactUsController::class, 'index'])->name('contact.index');
Route::post('contact', [ContactUsController::class, 'store'])->name('contact.store');
Route::put('contact/{contact}', [ContactUsController::class, 'update'])->name('contact.update');
Route::delete('contact/{contact}', [ContactUsController::class, 'destroy'])->name('contact.destroy');

// ===> Faq
Route::get('faq', [FaqController::class, 'index'])->name('faq.index');
Route::post('faq', [FaqController::class, 'store'])->name('faq.store');
Route::put('faq/{faq}', [FaqController::class, 'update'])->name('faq.update');
Route::delete('faq/{faq}', [FaqController::class, 'destroy'])->name('faq.destroy');

// Approved News And Reject News
Route::get('approved-news', [NewsController::class, 'see'])->name('approved-news.index');
Route::patch('approved-news/{news}', [NewsController::class, 'approved'])->name('approved-news');
Route::put('approved-all', [NewsController::class, 'approvedall'])->name('approved-all.news');

Route::patch('reject-news/{news}', [NewsController::class, 'reject'])->name('reject-news');
Route::put('reject-all', [NewsController::class, 'rejectall'])->name('reject-all.news');

Route::get('news', [NewsController::class, 'index'])->name('news.index');
Route::post('news', [NewsController::class, 'store'])->name('news.store');
Route::delete('news/{news}', [NewsController::class, 'destroy'])->name('news.destroy');

//NewsHasLike
Route::post('news-like/{news}', [NewsHasLikeController::class, 'store'])->name('news.like.store');
Route::delete('news-unlike/{id}', [NewsHasLikeController::class, 'destroy'])->name('news.unlike.delete');

//trending ke-?
Route::get('option-editor-news/{news}', [NewsController::class, 'trending'])->name('news.option.editor');
Route::get('filter-news-admin', [NewsController::class, 'filter'])->name('news.filter');

// Inbox
Route::get('inbox', [ReportController::class, 'index'])->name('report.index');

// Route::get('profile', [ProfileController::class, 'index'])->name('profile.index');
// Profile Author
Route::get('profile-create', [NewsController::class, 'createnews'])->name('profile.berita.create');
Route::get('profile', [ProfileController::class, 'index'])->name('profile.index');
Route::get('profile-status', [ProfileController::class, 'profilestatus'])->name('profile-status.author');
Route::post('profilecreatenews', [ProfileController::class, 'store'])->name('profile.berita.store');
// Update Profile
Route::put('profileupdatenews', [ProfileController::class, 'update'])->name('profile.berita.update');

// Update And Delete News
Route::get('edit-news-profile/{id}', [ProfileController::class, 'editnews'])->name('profile.news.edit');
Route::put('update-news-profile/{news}', [ProfileController::class, 'updateberita'])->name('profile.berita.updated');
Route::delete('delete-news-profile/{news}', [NewsController::class, 'destroy'])->name('profile.news.delete');

// contact us
Route::get('contact-us', [ContactUsController::class, 'contact'])->name('contact-us.user');

// Singgle Post
// Route::get('news-singgle-post',function(){
//     return view('pages.user.news.singlepost');
// })->name('news.singgle-post');

Route::get('news-post', function(){
    return view('pages.user.news.news');
})->name('news.post');

Route::get('aboutnews', function(){
    return view('pages.user.about.index');
})->name('about.user');

Route::get('statistic', function(){
    return view('pages.author.statistic.index');
})->name('statistic.author');

Route::get('status', function(){
    return view('pages.author.status.index');
})->name('status.author');

Route::get('profile', function(){
    return view('pages.author.index');
})->name('profile.index');


Route::get('profileuser', function(){
    return view('pages.user.profile.index');
})->name('profile.user');

Route::get('news-singgle-post/{news}', [NewsController::class, 'usernews'])->name('news.user');
// Route::get('/news-singgle-post/{news}/{id}', [NewsHasLikeController::class, 'show'])->name('news.show');
// Route::post('/news-singgle-post/{news}/{id}/like', [NewsHasLikeController::class, 'like'])->name('news.singgle-post.like');
// Route::delete('/news-singgle-post/{news}/{id}/unlike', [NewsHasLikeController::class, 'unlike'])->name('news.singgle-post.unlike');

Route::get('aboutnews', [ProfileController::class, 'aboutuser'])->name('about.user');

//comment
Route::post('comment/{news}', [CommentController::class, 'store'])->name('comment.create');
Route::post('reply-comment/{news}/{id}', [CommentController::class, 'reply'])->name('reply.comment.create');

// Route::get('contact-us', function() {
//     return view('pages.user.contact.index');
// })->name('contact.user');
Route::get('dashboard', function(){
    return view('pages.user.index');
})->name('dashboard.user');

Route::get('author', function(){
    return view('pages.user.author.index');
})->name('author.user');

Route::get('author-detail', function(){
    return view('pages.user.author.detail-author');
})->name('author.detail');

Route::get('author-inbox', function(){
    return view('pages.author.inbox.index');
})->name('author.inbox');

?>
