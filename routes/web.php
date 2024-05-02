<?php

use App\Http\Controllers\AdvertisementController;
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
use App\Http\Controllers\FollowersController;
use App\Http\Controllers\NewsCategoryController;
use App\Http\Controllers\NewsHasLikeController;
use App\Http\Controllers\NewsReportController;
use App\Http\Controllers\PaymentAdvertisementsController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\SubCategoryController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SubscribeController;
use App\Models\Category;

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

Route::get('navbar-user', [DashboardController::class, 'navbar'])->name('navbar');
Route::get('mobile-header-user', [DashboardController::class, 'mobileHeader'])->name('mobile.header');
Route::get('/', [DashboardController::class, 'home'])->name('home');
Route::get('faq', [DashboardController::class, 'faq'])->name('faq.dashboard');

Auth::routes(['verify' => true]);

Route::middleware(['auth', 'role:admin|superadmin', 'verified'])->group(function () {
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard.admin'); //dashboard
    // Route::get('author-admin', [AuthorController::class, 'index'])->name('author.admin');
    Route::get('author-admin-list', [AuthorController::class, 'listauthor'])->name('author.admin.list'); //list author approved
    Route::get('list-author', function () {
        return view('pages.admin.user.author-list');
    })->name('list.author.admin');

    // Author admin
    Route::get('author-admin-approve', [AuthorController::class, 'index'])->name('author.admin.index');
    Route::get('author-list', function () {
        return view('pages.admin.user.index');
    })->name('author.admin');

    Route::get('berlangganan', function () {
        return view('pages.admin.berlangganan.index');
    })->name('berlangganan');

    Route::delete('kategori/{category}', [CategoryController::class, 'destroy'])->name('author.admin.destroy');

    Route::get('list-author-banned-admin', [AuthorController::class, 'listbanned'])->name('list.banned.author.admin'); //list banned author
    Route::put('banned-author/{author}', [AuthorController::class, 'banned'])->name('banned.author'); //fungsi banned author
    // Approved And Reject Author
    Route::patch('approved-user/{user}', [AuthorController::class, 'approved'])->name('user.approved'); //fungsi approved author
    Route::patch('reject-user/{user}', [AuthorController::class, 'reject'])->name('user.reject'); // fungsi reject author

    Route::post('createauthor', [AuthorController::class, 'store'])->name('author.create'); // fungsi create author dari admin -> langsung approve dan role : author
    // Sub Catgeory dan Category
    // Route::resource('categories', CategoryController::class);
    Route::get('search', [CategoryController::class, 'search'])->name('search.category');
    Route::post('subcategories/{category}', [SubCategoryController::class, 'store'])->name('sub.category.store');
    Route::post('categories/{subcategory}', [SubCategoryController::class, 'update'])->name('sub.category.update');
    Route::get('subcategories/{subcategory}', [CategoryController::class, 'show'])->name('sub.category.show');
    Route::delete('subcategories/{subcategory}', [SubCategoryController::class, 'destroy'])->name('sub.category.destroy');
    Route::resource('categories', CategoryController::class);

    // Approved News And Reject News
    Route::get('approved-news', [NewsController::class, 'see'])->name('approved-news.index');
    Route::get('news-list', function () {
        return view('pages.admin.news_admin.index');
    })->name('news.list.admin');

    // list news
    Route::get('list-news-approved', [NewsController::class, 'listapproved'])->name('list.approved.index');

    Route::get('news-approved-list', function () {
        return view('pages.admin.news_admin.news-approve');
    })->name('news.approve.admin');

    Route::delete('news-approved/{news-approved}', [NewsController::class, 'destroy'])->name('news.approved.destroy');
    // Detail News
    Route::get('detail-news-admin/{news}', [NewsController::class, 'detailnews'])->name('detail.news.admin');
    // Approved All News
    Route::patch('approved-news-admin/{news}', [NewsController::class, 'approved'])->name('approved.news.admin');
    Route::put('approved-all', [NewsController::class, 'approvedall'])->name('approved-all.news');
    // Reject All News
    Route::patch('reject-news/{news}', [NewsController::class, 'reject'])->name('reject-news');
    Route::put('reject-all', [NewsController::class, 'rejectall'])->name('reject-all.news');
    // Filter and pin di halaman utama
    Route::get('option-editor-news/{news}', [NewsController::class, 'trending'])->name('news.option.editor');
    Route::get('filter-news-admin', [NewsController::class, 'filter'])->name('news.filter');
    // ===> Faq
    Route::get('faq-admin', [FaqController::class, 'index'])->name('faq.index');

    Route::get('faq-list', function () {
        return view('pages.admin.faq.faq');
    })->name('faq.admin');

    Route::post('faq', [FaqController::class, 'store'])->name('faq.store');
    Route::put('faq/{faq}', [FaqController::class, 'update'])->name('faq.update');
    Route::delete('faq/{faq}', [FaqController::class, 'destroy'])->name('faq.destroy');
    // ==== Kategori ====

    Route::get('kategori-admin', [CategoryController::class, 'index'])->name('kategori.index');

    Route::get('category', function () {
        return view('pages.admin.categories.index');
    })->name('kategori.admin');

    Route::post('kategori', [CategoryController::class, 'store'])->name('kategori.store');
    Route::put('kategori/{category}', [CategoryController::class, 'update'])->name('kategori.update');
    Route::delete('kategori/{category}', [CategoryController::class, 'destroy'])->name('kategori.destroy');

    // ==== Sub Kategori ====

    Route::get('SubKategori-admin/{category}', [SubCategoryController::class, 'index'])->name('subkategori.index');

    Route::get('sub-category/{category}', function ($category) {
        return view('pages.admin.categories.subcategories.index', compact('category'));
    })->name('sub.category.admin');

    Route::post('SubKategori', [SubCategoryController::class, 'store'])->name('subkategori.store');
    Route::put('SubKategori/{subcategory}', [SubCategoryController::class, 'update'])->name('subkategori.update');
    Route::delete('SubKategori/{subcategory}', [SubCategoryController::class, 'destroy'])->name('subkategori.destroy');

    // Inbox
    Route::get('inbox', [ContactUsController::class, 'index'])->name('report.index');
    Route::delete('contact/{contact}', [ContactUsController::class, 'destroy'])->name('contact.destroy');
    Route::get('contact-read/{contact}', [ContactUsController::class, 'read'])->name('contact.read');

    Route::delete('report/{report}', [ReportController::class, 'destroy'])->name('report.destroy.');
    Route::get('report-read/{report}', [ReportController::class, 'read'])->name('report.read');

    Route::delete('contact-recovery/{contact}', [ContactUsController::class, 'recovery'])->name('contact.recovery');
    Route::delete('report-recovery/{report}', [ReportController::class, 'recovery'])->name('report.recovery');

    Route::delete('contact-delete/{contact}', [ContactUsController::class, 'delete'])->name('contact.delete');
    Route::delete('report-delete/{report}', [ReportController::class, 'delete'])->name('report.delete');

    Route::get('tag-admin', [TagController::class, 'index'])->name('tag.detail');

    Route::get('list-tag', function () {
        return view('pages.admin.tag.index');
    })->name('tag.detail.list');

    Route::post('create-tag', [TagController::class, 'store'])->name('tag.create');
    Route::put('update-tag/{tag}', [TagController::class, 'update'])->name('tag.update');
    Route::delete('delete-tag/{tag}', [TagController::class, 'destroy'])->name('delete.tag');

    Route::get('account-list', [DashboardController::class, 'createAccount'])->name('account.admin.list');
    Route::post('create-account', [UserController::class, 'storeByAdmin'])->name('create.account.admin');

    Route::get('advertisement-list', [AdvertisementController::class, 'indexAdmin'])->name('iklan.admin.list');
    Route::get('detail-iklan', function () {
        return view('pages.admin.iklan.detail-iklan');
    })->name('admin.detail.iklan');
});


Route::middleware(['auth', 'role:admin|author|superadmin'])->group(function () {
    //update news ===>
    Route::get('update-news-admin/{news}', [ProfileController::class, 'updateberita'])->name('update.news.admin');
    Route::put('update-news-profile/{news}', [ProfileController::class, 'updateberita'])->name('profile.berita.updated');
    Route::post('delete-news-profile/{news}', [NewsController::class, 'destroy'])->name('profile.news.delete');

    Route::post('create-news', [NewsController::class, 'store'])->name('profile.berita.store');
    Route::get('profile-create', [NewsController::class, 'createnews'])->name('profile.berita.create');
});

Route::middleware(['auth', 'role:author'])->group(function () {
    // fungsi crud news
    Route::get('news', [NewsController::class, 'index'])->name('news.index');
    Route::post('news', [NewsController::class, 'store'])->name('news.store');
    Route::delete('news/{news}', [NewsController::class, 'destroy'])->name('news.destroy');

    Route::get('mynews', [NewsController::class, 'showmynews'])->name('my.news');
    Route::get('detail-news/{news}', [AuthorController::class, 'detailnews'])->name('detail.news');
    // Profile Author
    Route::get('profile', [ProfileController::class, 'index'])->name('profile.index');
    Route::get('profile-status', [ProfileController::class, 'profilestatus'])->name('profile-status.author');
    Route::post('create-news-draft', [NewsController::class, 'storeDraft'])->name('news.draft');
    Route::put('update-news-draft/{news}', [NewsController::class, 'updateDraft'])->name('news.update.draft');
    // Route::post('profilecreatenews', [NewsController::class, 'store'])->name('profile.berita.store');
    //
    Route::get('profile-update', [ProfileController::class, 'profileupdate'])->name('profile.author.update');
    Route::post('update-profile/{user}', [ProfileController::class, 'updateprofile'])->name('update.author.profile');
    Route::post('profile-change-password/{user}', [ProfileController::class, 'changepassword'])->name('change.password.profile');
    // UpdateNews
    Route::put('update-news', [ProfileController::class, 'update'])->name('profile.berita.update');
    Route::get('sub-category-detail/{category}', [CategoryController::class, 'getCategory'])->name('sub.category.id');
    // Update And Delete News
    Route::get('edit-news-profile/{id}', [ProfileController::class, 'editnews'])->name('profile.news.edit');

    Route::get('status-author', [NewsController::class, 'showstatusnews'])->name('status.news.author');

    Route::get('author-inbox', function () {
        return view('pages.author.inbox.index');
    })->name('author.inbox');

    Route::get('statistic', function () {
        return view('pages.author.statistic.index');
    })->name('statistic.author');

    Route::get('income-statistics', [AuthorController::class, 'incomestatistics'])->name('statistik.income');
    Route::get('news-statistics', [AuthorController::class, 'newsstatistics'])->name('statistik.news');
    Route::post('create-news-draft', [NewsController::class, 'storeDraft'])->name('news.draft');


    Route::get('status', function () {
        return view('pages.author.status.index');
    })->name('status.author');

});


// Route::resource('user', AuthorController::class);
// Route::resource('user', UserController::class);

Route::middleware(['role:user|author|admin|superadmin'])->group(function () {
    Route::get('tukar-coin', function () {
        return view('pages.user.coins.index');
    })->name('tukar.coin');
    Route::get('tukarkan-coin', function () {
        return view('pages.user.coins.tukar-coin');
    })->name('user.tukar.coin');
    Route::get('riwayat-tukar-coin', function () {
        return view('pages.user.coins.history');
    })->name('user.history.coin');

    Route::post('contact', [ContactUsController::class, 'store'])->name('contact.store');
    // Route::get('news-singgle-post/{news}/{page}', [NewsController::class, 'usernews'])->name('news.user');
    Route::post('news-like/{news}', [NewsHasLikeController::class, 'store'])->name('news.like.store');
    Route::delete('news-unlike/{news}', [NewsHasLikeController::class, 'destroy'])->name('news.like.delete');
    //comment
    Route::post('comment/{news}', [CommentController::class, 'store'])->name('comment.create');
    Route::post('reply-comment/{news}/{id}', [CommentController::class, 'reply'])->name('reply.comment.create');
    //author
    Route::post('follow/{author}', [FollowersController::class, 'store'])->name('follow.author');
    Route::delete('unfollow/{author}', [FollowersController::class, 'destroy'])->name('unfollow.author');

    Route::get('author-detail/{id}', [DashboardController::class, 'authordetail'])->name('author.detail');
    Route::get('privacy-policy', [DashboardController::class, 'privacypolicy'])->name('privacy.policy');

    Route::post('update-profile/{user}', [ProfileController::class, 'updateprofile'])->name('update.author.profile');
    Route::post('profile-change-password/{user}', [ProfileController::class, 'changepassword'])->name('change.password.profile');
    Route::post('photo/{user}', [UserController::class, 'store'])->name('update-photo');

    Route::get('profile-user-update', function () {
        return view('pages.user.profile.update');
    })->name('profile.user.update');
    Route::get('sub-category-detail/{category}', [CategoryController::class, 'getCategory'])->name('sub.category.id');
    Route::get('pengajuan-berita', [NewsController::class, 'createUserNews'])->name('pengajuan.berita');
    Route::post('create-news-user', [NewsController::class, 'store'])->name('user.berita.store');

});

Route::middleware(['role:user'])->group(function () {
    Route::get('profile-user', [DashboardController::class, 'userProfile'])->name('profile.user');
    Route::put('user-author/{user}', [AuthorController::class, 'create'])->name('user.author');
    Route::get('ketentuan-dan-persyaratan', function () {
        return view('pages.user.home');
    })->name('user.home');
    Route::get('user-inbox', function () {
        return view('pages.user.inbox.index');
    })->name('user.inbox');

    Route::get('berita-upload', function () {
        return view('pages.user.news.upload');
    })->name('berita.upload');

    Route::get('status-berita', function () {
        return view('pages.user.news.status');
    })->name('status.berita');

    Route::get('riwayat-berita', function () {
        return view('pages.user.news.history');
    })->name('user.history.news');
    Route::get('iklan-upload', function () {
        return view('pages.user.iklan.pengajuan');
    })->name('iklan.pengajuan');
    Route::get('status-iklan', function () {
        return view('pages.user.iklan.status');
    })->name('iklan.status');


    Route::get('iklan-biodata', function () {
        return view('pages.user.iklan.upload');
    })->name('iklan.biodata');


    Route::get('status-detail-iklan', function () {
        return view('pages.user.iklan.status-iklan');
    })->name('status.detail.iklan');
    Route::get('status-detail-berita', function () {
        return view('pages.user.news.status-berita');
    })->name('status.detail.berita');
    Route::post('iklan-upload', [AdvertisementController::class, 'store'])->name('advertisement.store');

    // Route::get('payment-upload', function(){
    //     return view('pages.user.iklan.pembayaran');
    // })->name('payment.index');

    Route::get('payment-upload/{advertisement}', [AdvertisementController::class, 'show'])->name('payment.advertisement.show');

    Route::post('payment-upload', [PaymentAdvertisementsController::class, 'store'])->name('payment.store');

    Route::get('iklan-ajukan', function () {
        return view('pages.user.iklan.ajukan');
    })->name('iklan.ajukan');



    Route::get('status-selesai-iklan', function () {
        return view('pages.user.iklan.status-selesa');
    })->name('status.selesai.iklan');


    Route::get('user-berlangganan', [SubscribeController::class, 'index'])->name('user.berlangganan');

    Route::get('pembayaran-iklan', function () {
        return view('pages.user.iklan.pembayaran');
    })->name('user.pembayaran.iklan');

    Route::get('rincian-pembayaran-iklan', function () {
        return view('pages.user.iklan.rincian-pembayaran');
    })->name('user.rincian-pembayaran.iklan');

    Route::get('load-coin', function () {
        return view('pages.user.load-coin.load');
    });





    // Route::get('/news-singgle-post/{news}/{id}', [NewsHasLikeController::class, 'show'])->name('news.show');
    // Route::post('/news-singgle-post/{news}/{id}/like', [NewsHasLikeController::class, 'like'])->name('news.singgle-post.like');
    // Route::delete('/news-singgle-post/{news}/{id}/unlike', [NewsHasLikeController::class, 'unlike'])->name('news.singgle-post.unlike');

    Route::get('admin-inbox', function () {
        return view('pages.admin.inbox.index');
    })->name('admin.inbox');

    // Inbox
    Route::get('admin-report', [ReportController::class, 'index'])->name('admin.report');
    Route::post('report-news/{news}', [ReportController::class, 'store'])->name('report.store');







    // Route::get('pengajuan-berita', function () {
    //     return view('pages.user.news.pengajuan');
    // })->name('pengajuan.berita');

});

Route::get('author', [DashboardController::class, 'authoruser'])->name('author-index');
Route::get('contact-us', [ContactUsController::class, 'contact'])->name('contact-us.user');
Route::get('aboutus', [DashboardController::class, 'aboutus'])->name('about.us.user');
Route::get('all-news-post', [DashboardController::class, 'newspost'])->name('news.post');
Route::get('{category}', [NewsController::class, 'showCategories'])->name('categories.show.user');
Route::get('{category}/{subCategory}', [NewsController::class, 'showSubCategories'])->name('subcategories.show.user');
Route::get('{news}', [NewsController::class, 'usernews'])->name('news.user');



Route::get('confirm-email', function () {
    return view('pages.auth.passwords.email');
})->name('confirm.email');

Route::get('confirm-password', function () {
    return view('pages.auth.passwords.confirm');
})->name('confirm.password');

Route::get('all-news-post', [DashboardController::class, 'newspost'])->name('news.post');
