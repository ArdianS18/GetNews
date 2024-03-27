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
use App\Http\Controllers\TagController;
use App\Http\Controllers\UserController;

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
// Route::get('/', [DashboardC ontroller::class,'home'])->name('home')->middleware('verified');

// Route::get('/', [App\Http\Controllers\NewsController::class, 'showViews'])->name('popular.news');

Route::get('navbar-user', [DashboardController::class, 'navbar'])->name('navbar');
Route::get('/', [DashboardController::class,'home'])->name('home');
Route::get('faq',[DashboardController::class,'faq'])->name('faq.dashboard');

Auth::routes();

Route::middleware(['role:admin|superadmin'])->group(function () {
    //Beranda *Admin*
    Route::get('dashboard',[DashboardController::class,'index'])->name('dashboard.admin'); //dashboard
    //Beranda *Admin*
    Route::get('author-admin', [AuthorController::class, 'index'])->name('author.admin'); //list author panding
    Route::get('list-author-admin', function(){
        return view('pages.admin.user.author-list');
    })->name('list.author.admin'); //list author approved

    Route::get('author-admin-list',[AuthorController::class,'listauthor'])->name('author.admin.list'); //list author approved

    Route::get('list-author-banned-admin', [AuthorController::class, 'listbanned'])->name('list.banned.author.admin'); //list banned author
    Route::put('banned-author/{author}', [AuthorController::class, 'banned'])->name('banned.author'); //fungsi banned author
    // Approved And Reject Author
    Route::patch('approved-user/{user}', [AuthorController::class, 'approved'])->name('user.approved'); //fungsi approved author
    Route::patch('reject-user/{user}', [AuthorController::class, 'reject'])->name('user.reject'); // fungsi reject author

    Route::post('createauthor', [AuthorController::class, 'store'])->name('author.create'); // fungsi create author dari admin -> langsung approve dan role : author
    // Sub Catgeory dan Category
    Route::resource('categories', CategoryController::class);
    Route::get('search', [CategoryController::class, 'search'])->name('search.category');
    Route::post('subcategories/{category}', [SubCategoryController::class, 'store'])->name('sub.category.store');
    Route::post('categories/{subcategory}', [SubCategoryController::class, 'update'])->name('sub.category.update');
    Route::delete('subcategories/{subcategory}', [SubCategoryController::class, 'destroy'])->name('sub.category.destroy');
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
    Route::get('faq-admin', [FaqController::class, 'index'])->name('faq.index');

    Route::get('faq-list', function(){
        return view('pages.admin.faq.faq');
    })->name('faq.admin');

    Route::post('faq', [FaqController::class, 'store'])->name('faq.store');
    Route::put('faq/{faq}', [FaqController::class, 'update'])->name('faq.update');
    Route::delete('faq/{faq}', [FaqController::class, 'destroy'])->name('faq.destroy');
    // Inbox
    Route::get('inbox', [ContactUsController::class, 'index'])->name('report.index');

    Route::get('contact', [ContactUsController::class, 'index'])->name('contact.index');
    Route::put('contact/{contact}', [ContactUsController::class, 'update'])->name('contact.update');
    Route::delete('contact/{contact}', [ContactUsController::class, 'destroy'])->name('contact.destroy');

    Route::get('tag-admin', [TagController::class, 'index'])->name('tag.detail');

    Route::get('list-tag', function(){
        return view('pages.admin.tag.index');
    })->name('tag.detail.list');

    Route::post('create-tag', [TagController::class, 'store'])->name('tag.create');
    Route::put('update-tag/{tag}', [TagController::class, 'update'])->name('tag.update');
    Route::delete('delete-tag/{tag}', [TagController::class, 'destroy'])->name('delete.tag');
});


Route::middleware(['auth','role:admin|author|superadmin'])->group(function (){
    //update news ===>
    // Route::patch('update-news-admin/{news}', [ProfileController::class, 'updateberita'])->name('update.news.admin');
    Route::put('update-news-profile/{news}', [ProfileController::class, 'updateberita'])->name('profile.berita.updated');
});

Route::middleware(['auth','role:author'])->group(function () {
    // fungsi crud news
    Route::get('news', [NewsController::class, 'index'])->name('news.index');
    Route::post('news', [NewsController::class, 'store'])->name('news.store');
    Route::delete('news/{news}', [NewsController::class, 'destroy'])->name('news.destroy');
    // Profile Author
    Route::get('profile-create', [NewsController::class, 'createnews'])->name('profile.berita.create');
    Route::get('profile', [ProfileController::class, 'index'])->name('profile.index');
    Route::get('profile-status', [ProfileController::class, 'profilestatus'])->name('profile-status.author');
    Route::post('profilecreatenews', [ProfileController::class, 'store'])->name('profile.berita.store');
    //
    Route::get('profile-update', [ProfileController::class, 'profileupdate'])->name('profile.author.update');
    Route::post('update-profile/{user}', [ProfileController::class, 'updateprofile'])->name('update.author.profile');
    Route::post('profile-change-password/{user}', [ProfileController::class, 'changepassword'])->name('change.password.profile');
    // UpdateNews
    Route::put('update-news', [ProfileController::class, 'update'])->name('profile.berita.update');
    // Update And Delete News
    Route::get('edit-news-profile/{id}', [ProfileController::class, 'editnews'])->name('profile.news.edit');
    Route::delete('delete-news-profile/{news}', [NewsController::class, 'destroy'])->name('profile.news.delete');

    Route::get('sub-category-detail/{category}',[CategoryController::class,'getCategory'])->name('sub.category.id');

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
    Route::get('contact-us', [ContactUsController::class, 'contact'])->name('contact-us.user');
    Route::post('contact', [ContactUsController::class, 'store'])->name('contact.store');

    // Route::get('news-singgle-post/{news}/{page}', [NewsController::class, 'usernews'])->name('news.user');
    Route::get('news-like/{news}', [NewsHasLikeController::class, 'store'])->name('news.like.store');
    //comment
    Route::post('comment/{news}', [CommentController::class, 'store'])->name('comment.create');
    Route::post('reply-comment/{news}/{id}', [CommentController::class, 'reply'])->name('reply.comment.create');

    Route::get('author', [DashboardController::class, 'authoruser'])->name('author-index');
    Route::get('author-detail', [DashboardController::class, 'authordetail'])->name('author.detail');

    Route::get('aboutus', [DashboardController::class, 'aboutus'])->name('about.us.user');

    Route::get('news-post', [DashboardController::class, 'newspost'])->name('news.post');

    Route::get('privacy-policy', [DashboardController::class, 'privacypolicy'])->name('privacy.policy');
});

Route::middleware(['role:user'])->group(function () {
    Route::get('profile-user/{user}', [DashboardController::class, 'userProfile'])->name('profile.user');
    Route::put('user-author/{user}', [AuthorController::class, 'create'])->name('user.author');
    Route::get('user-beranda', function(){
        return view('pages.user.home');
    })->name('user.home');
});

Route::post('photo/{user}', [UserController::class, 'store'])->name('update-photo');



// Route::get('aboutnews', function(){
//     return view('pages.user.about.index');
// })->name('about.user');



Route::get('statistic', function(){
    return view('pages.author.statistic.index');
})->name('statistic.author');

Route::get('status', function(){
    return view('pages.author.status.index');
})->name('status.author');

Route::get('profile-user-update', function(){
    return view('pages.user.profile.update');
})->name('profile.user.update');

Route::get('news-singgle-post/{news}/{page}', [NewsController::class, 'usernews'])->name('news.user');

// Route::get('/news-singgle-post/{news}/{id}', [NewsHasLikeController::class, 'show'])->name('news.show');
// Route::post('/news-singgle-post/{news}/{id}/like', [NewsHasLikeController::class, 'like'])->name('news.singgle-post.like');
// Route::delete('/news-singgle-post/{news}/{id}/unlike', [NewsHasLikeController::class, 'unlike'])->name('news.singgle-post.unlike');

Route::get('admin-inbox', function(){
    return view('pages.admin.inbox.index');
})->name('admin.inbox');

// Inbox
Route::get('admin-report', [ReportController::class, 'index'])->name('admin.report');
Route::post('admin-store', [ReportController::class, 'index'])->name('report.store');

Route::get('detail-category/{category}', [NewsController::class, 'showCategories'])->name('categories.show.user');

Route::get('detail-subcategory/{subCategory}', [NewsController::class, 'showSubCategories'])->name('subcategories.show.user');



Route::get('confirm-email', function(){
    return view('pages.auth.passwords.email');
})->name('confirm.email');

Route::get('confirm-password',function(){
    return view('pages.auth.passwords.confirm');
})->name('confirm.password');

Route::get('tukar-coin', function(){
    return view('pages.user.coins.index');
})->name('tukar.coin');

Route::get('pengajuan-berita', function(){
    return view('pages.user.news.pengajuan');
})->name('pengajuan.berita');
?>
