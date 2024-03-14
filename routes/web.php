<?php

use App\Http\Controllers\AuthorController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ContactUsController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\NewsHasLikeController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\SubCategoryController;

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


// Route::get('navbar-user', [DashboardController::class, 'navbar'])->name('navbar');
// Route::get('/', [DashboardController::class,'home'])->name('home')->middleware('verified');

// Route::get('/', [App\Http\Controllers\NewsController::class, 'showViews'])->name('popular.news');

Route::get('navbar-user', [DashboardController::class, 'navbar'])->name('navbar');
Route::get('/', [DashboardController::class,'home'])->name('home');

Auth::routes(['verify' => true]);

Route::middleware(['role:admin|superadmin'])->group(function () {
    //Beranda *Admin*
    Route::get('dashboard',[DashboardController::class,'index'])->name('dashboard.admin'); //dashboard
    Route::get('author-admin', [AuthorController::class, 'index'])->name('author.admin'); //list author panding
    Route::get('list-author-admin', [AuthorController::class, 'listauthor'])->name('list.author.admin'); //list author approved

    Route::get('list-author-banned-admin', [AuthorController::class, 'listbanned'])->name('list.banned.author.admin'); //list banned author
    Route::get('banned-author/{author}', [AuthorController::class, 'banned'])->name('banned.author'); //fungsi banned author
    // Approved And Reject Author
    Route::patch('approved-user/{user}', [AuthorController::class, 'approved'])->name('user.approved'); //fungsi approved author
    Route::patch('reject-user/{user}', [AuthorController::class, 'reject'])->name('user.reject'); // fungsi reject author

    Route::post('createauthor', [AuthorController::class, 'store'])->name('author.create'); // fungsi create author dari admin -> langsung approve dan role : author
    // Sub Catgeory dan Category
    Route::resource('categories', CategoryController::class);
    Route::post('subcategories/{category}', [SubCategoryController::class, 'store'])->name('sub.category.store');
    Route::post('categories/{subcategory}', [SubCategoryController::class, 'update'])->name('sub.category.update');
    Route::delete('subcategories/{subcategory}', [SubCategoryController::class, 'destroy'])->name('sub.category.destroy');
    Route::get('sub-category-detail/{category}',[CategoryController::class,'getCategory'])->name('sub.category.id');
    Route::resource('categories', CategoryController::class);

    // Approved News And Reject News
    Route::get('approved-news', [NewsController::class, 'see'])->name('approved-news.index');
    Route::get('list-news-approved', [NewsController::class, 'listapproved'])->name('list.approved');
    // Detail News
    Route::get('detail-news-admin/{news}', [NewsController::class, 'detailnews'])->name('detail.news.admin');
    // Approved All News
    Route::patch('approved-news/{news}', [NewsController::class, 'approved'])->name('approved-news');
    Route::put('approved-all', [NewsController::class, 'approvedall'])->name('approved-all.news');
    // Reject All News
    Route::patch('reject-news/{news}', [NewsController::class, 'reject'])->name('reject-news');
    Route::put('reject-all', [NewsController::class, 'rejectall'])->name('reject-all.news');
    // Filter and pin di halaman utama
    Route::get('option-editor-news/{news}', [NewsController::class, 'trending'])->name('news.option.editor');
    Route::get('filter-news-admin', [NewsController::class, 'filter'])->name('news.filter');
    // ===> Faq
    Route::get('faq', [FaqController::class, 'index'])->name('faq.index');
    Route::post('faq', [FaqController::class, 'store'])->name('faq.store');
    Route::put('faq/{faq}', [FaqController::class, 'update'])->name('faq.update');
    Route::delete('faq/{faq}', [FaqController::class, 'destroy'])->name('faq.destroy');
    // Inbox
    Route::get('inbox', [ContactUsController::class, 'index'])->name('report.index');

    Route::get('contact', [ContactUsController::class, 'index'])->name('contact.index');
    Route::put('contact/{contact}', [ContactUsController::class, 'update'])->name('contact.update');
    Route::delete('contact/{contact}', [ContactUsController::class, 'destroy'])->name('contact.destroy');
});

Route::middleware(['role:author|admin'])->group(function () {
    // Author ===<
    // fungsi crud news
    Route::get('news', [NewsController::class, 'index'])->name('news.index');
    Route::post('news', [NewsController::class, 'store'])->name('news.store');
    Route::delete('news/{news}', [NewsController::class, 'destroy'])->name('news.destroy');
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

    Route::get('author-inbox', function(){
        return view('pages.author.inbox.index');
    })->name('author.inbox');

    Route::get('statistic', function(){
        return view('pages.author.statistic.index');
    })->name('statistic.author');

    Route::get('status', function(){
        return view('pages.author.status.index');
    })->name('status.author');

    Route::get('profile', function(){
        return view('pages.author.index');
    })->name('profile.index');
});


// Route::resource('user', AuthorController::class);
// Route::resource('user', UserController::class);

Route::middleware(['role:user|author|admin|superadmin'])->group(function () {
    Route::post('contact', [ContactUsController::class, 'store'])->name('contact.store');

    Route::get('news-like/{news}', [NewsHasLikeController::class, 'store'])->name('news.like.store');

    Route::get('contact-us', [ContactUsController::class, 'contact'])->name('contact-us.user');

    Route::get('news-singgle-post/{news}', [NewsController::class, 'usernews'])->name('news.user');
    //comment
    Route::post('comment/{news}', [CommentController::class, 'store'])->name('comment.create');
    Route::post('reply-comment/{news}/{id}', [CommentController::class, 'reply'])->name('reply.comment.create');

    Route::get('author',function () {
        return view('pages.user.author.index');
    })->name('author.index');

    Route::get('news-post', function(){
        return view('pages.user.news.news');
    })->name('news.post');

    Route::get('author-detail', function(){
        return view('pages.user.author.detail-author');
    })->name('author.detail');

    Route::get('privacy-policy', function(){
        return view('pages.user.privacy-policy.index');
    })->name('privacy-policy');
});

Route::middleware(['role:user'])->group(function () {

    Route::get('profile-user/{user}', [DashboardController::class, 'userProfile'])->name('profile.user');
    Route::put('user-author/{user}', [AuthorController::class, 'create'])->name('user.author');
});


// ===> Contact


//NewsHasLike

//trending ke-?


// Route::get('profile', [ProfileController::class, 'index'])->name('profile.index');


// contact us

// Singgle Post
// Route::get('news-singgle-post',function(){
//     return view('pages.user.news.singlepost');
// })->name('news.singgle-post');



Route::get('aboutnews', function(){
    return view('pages.user.about.index');
})->name('about.user');


Route::get('statistic', function(){
    return view('pages.author.statistic.index');
})->name('statistic.author');

Route::get('status', function(){
    return view('pages.author.status.index');
})->name('status.author');

Route::get('profile', [ProfileController::class, 'index'])->name('profile.index');

Route::get('aboutnews', [ProfileController::class, 'aboutuser'])->name('about.user');

Route::get('profile-update', function(){
    return view('pages.user.profile.update');
})->name('profile.user');

Route::get('news-singgle-post/{news}', [NewsController::class, 'usernews'])->name('news.user');

// Route::get('/news-singgle-post/{news}/{id}', [NewsHasLikeController::class, 'show'])->name('news.show');
// Route::post('/news-singgle-post/{news}/{id}/like', [NewsHasLikeController::class, 'like'])->name('news.singgle-post.like');
// Route::delete('/news-singgle-post/{news}/{id}/unlike', [NewsHasLikeController::class, 'unlike'])->name('news.singgle-post.unlike');



// // Route::get('contact-us', function() {
// //     return view('pages.user.contact.index');
// // })->name('contact.user');
// Route::get('dashboard', function(){
//     return view('pages.user.index');
// })->name('dashboard.user');

Route::get('admin-inbox', function(){
    return view('pages.admin.inbox.index');
})->name('admin.inbox');
// Inbox
Route::get('admin-report', [ReportController::class, 'index'])->name('admin.report');
Route::post('admin-store', [ReportController::class, 'index'])->name('report.store');
?>
