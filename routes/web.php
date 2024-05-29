<?php

use App\Http\Controllers\AdvertisementController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\AuthorController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CoinController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\CommentReportController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ContactUsController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FollowersController;
use App\Http\Controllers\NewsCategoryController;
use App\Http\Controllers\NewsHasLikeController;
use App\Http\Controllers\NewsRejectController;
use App\Http\Controllers\NewsReportController;
use App\Http\Controllers\NewsTagController;
use App\Http\Controllers\NewsViewController;
use App\Http\Controllers\PaymentAdvertisementsController;
use App\Http\Controllers\PaymentNewsController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\SendMessageController;
use App\Http\Controllers\SubCategoryController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SubscribeController;
use App\Http\Controllers\ViewController;
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

Route::middleware(['auth', 'role:admin|superadmin'])->group(function () {
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard.admin'); //dashboard
    Route::get('/visitors/count', [ViewController::class, 'index']);
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
    Route::put('banned-author/{author}', [UserController::class, 'banned'])->name('banned.author'); //fungsi banned author
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

    Route::post('SubKategori/{category}', [SubCategoryController::class, 'store'])->name('subkategori.store');
    Route::put('SubKategori/{subcategory}', [SubCategoryController::class, 'update'])->name('subkategori.update');
    Route::delete('SubKategori/{subcategory}', [SubCategoryController::class, 'destroy'])->name('subkategori.destroy');

    // Inbox
    Route::get('inbox', [ContactUsController::class, 'index'])->name('report.index');

    Route::get('tag-admin', [TagController::class, 'index'])->name('tag.detail');

    Route::get('list-tag', function () {
        return view('pages.admin.tag.index');
    })->name('tag.detail.list');

    Route::post('create-tag', [TagController::class, 'store'])->name('tag.create');
    Route::put('update-tag/{tag}', [TagController::class, 'update'])->name('tag.update');
    Route::delete('delete-tag/{tag}', [TagController::class, 'destroy'])->name('delete.tag');

    Route::get('add-account',function(){
        return view('pages.admin.akun.index');
    })->name('account.admin.list');
    Route::get('account-list', [DashboardController::class, 'createAccount'])->name('account.admin');

    Route::post('create-account', [UserController::class, 'storeByAdmin'])->name('create.account.admin');
    Route::put('update-account/{user}', [UserController::class, 'update'])->name('update.account.admin');
    Route::delete('delete-account/{user}', [UserController::class, 'destroy'])->name('delete.account.admin');

    Route::get('advertisement-approved', [AdvertisementController::class, 'indexAdmin'])->name('iklan.admin.approved');
    Route::get('advertisement-list', function () {
        return view('pages.admin.iklan.index');
    })->name('iklan.admin.list');

    Route::get('detail-iklan', function () {
        return view('pages.admin.iklan.detail-iklan');
    })->name('admin.detail.iklan');

    Route::get('about-create', [DashboardController::class, 'aboutStore'])->name('create.about');
    Route::post('contact-about-create', [ContactController::class, 'store'])->name('contact.create.about');
    Route::put('contact-about-update/{contact}', [ContactController::class, 'update'])->name('contact.update.about');

    Route::get('account-user-list', function () {
        return view('pages.admin.akun.user');
    })->name('account.user.list');
    Route::get('account-user', [UserController::class, 'accountUserList'])->name('account.user');
});


Route::middleware(['auth', 'role:admin|author|superadmin|user','check.banned'])->group(function () {
    //update news ===>
    Route::get('update-news-admin/{news}', [ProfileController::class, 'updateberita'])->name('update.news.admin');
    Route::put('update-news-profile/{news}', [ProfileController::class, 'updateberita'])->name('profile.berita.updated');
    Route::post('delete-news-profile/{news}', [NewsController::class, 'destroy'])->name('profile.news.delete');

    Route::post('create-news', [NewsController::class, 'store'])->name('profile.berita.store');
    Route::get('profile-create', [NewsController::class, 'createnews'])->name('profile.berita.create');

    Route::delete('delete-iklan/{id}', [AdvertisementController::class, 'destroy'])->name('destroy.iklan');
    Route::delete('delete-iklan-admin/{id}', [AdvertisementController::class, 'delete'])->name('admin.destroy.iklan');

    Route::delete('contact/{contact}', [ContactUsController::class, 'destroy'])->name('contact.destroy');
    Route::get('contact-read/{contact}', [ContactUsController::class, 'read'])->name('contact.read');

    Route::delete('report/{report}', [ReportController::class, 'destroy'])->name('report.destroy.');
    Route::get('report-read/{report}', [ReportController::class, 'read'])->name('read.report');

    Route::delete('contact-recovery/{contact}', [ContactUsController::class, 'recovery'])->name('contact.recovery');
    Route::delete('report-recovery/{report}', [ReportController::class, 'recovery'])->name('report.recovery');

    Route::delete('contact-delete/{contact}', [ContactUsController::class, 'delete'])->name('contact.delete');
    Route::delete('report-delete/{report}', [ReportController::class, 'delete'])->name('report.delete');

    Route::get('send-read/{send}', [SendMessageController::class, 'read'])->name('send.message.read');
    Route::delete('send/{send}', [SendMessageController::class, 'destroy'])->name('send.message.destroy');
    Route::delete('send-recovery/{send}', [SendMessageController::class, 'recovery'])->name('send.message.recovery');
    Route::delete('send-delete/{send}', [SendMessageController::class, 'delete'])->name('send.message.delete');

    Route::delete('reject-news/{reject}', [NewsRejectController::class, 'destroy'])->name('news.reject.destroy');
    Route::delete('reject-recovery/{reject}', [NewsRejectController::class, 'recovery'])->name('news.reject.recovery');
    Route::delete('reject-delete/{reject}', [NewsRejectController::class, 'delete'])->name('news.reject.delete');

    Route::post('send-message', [SendMessageController::class, 'store'])->name('send.message');
});

Route::middleware(['auth', 'role:author', 'verified','check.banned'])->group(function () {
    // fungsi crud news
    Route::post('author-news-store', [NewsController::class, 'store'])->name('news.store');
    Route::delete('news/{news}', [NewsController::class, 'destroy'])->name('news.destroy');

    Route::get('mynews', [NewsController::class, 'showmynews'])->name('my.news');
    Route::get('detail-news/{news}', [AuthorController::class, 'detailnewsauthor'])->name('detail.news');
    // Profile Author
    Route::get('profile', [ProfileController::class, 'index'])->name('profile.index');
    Route::get('profile-status', [ProfileController::class, 'profilestatus'])->name('profile-status.author');
    Route::post('create-news-draft', [NewsController::class, 'storeDraft'])->name('news.draft');
    Route::put('update-news-draft/{news}', [NewsController::class, 'updateDraft'])->name('news.update.draft');
    // UpdateNews
    Route::put('update-news', [ProfileController::class, 'update'])->name('profile.berita.update');
    // Update And Delete News
    Route::get('edit-news-profile/{newsId}', [ProfileController::class, 'editnews'])->name('profile.news.edit');

    Route::get('status-author', function(){
        return view('pages.author.status.index');
    })->name('status.news.author');

    Route::get('list-status-author', [NewsController::class, 'showstatusnews'])->name('list.news.author');

    Route::get('author-inbox', [AuthorController::class, 'inboxauthor'])->name('author.inbox');

    Route::get('statistic', function () {
        return view('pages.author.statistic.index');
    })->name('statistic.author');

    Route::get('income-statistics', [AuthorController::class, 'incomestatistics'])->name('statistik.income');
    Route::get('news-statistics', [AuthorController::class, 'newsstatistics'])->name('statistik.news');
    Route::get('chart-statistics-news', [NewsViewController::class, 'newsstatistics']);


    Route::get('status', function () {
        return view('pages.author.status.index');
    })->name('status.author');


});

Route::middleware(['auth','role:user|author|admin|superadmin','check.banned'])->group(function () {

    Route::get('news-liked', [NewsHasLikeController::class, 'index'])->name('news.author.liked');

    Route::get('tukar-coin', function () {
        return view('pages.user.coins.index');
    })->name('tukar.coin');
    Route::get('tukarkan-coin', function () {
        return view('pages.user.coins.tukar-coin');
    })->name('user.tukar.coin');
    Route::get('riwayat-tukar-coin', function () {
        return view('pages.user.coins.history');
    })->name('user.history.coin');

    Route::get('profile-update', [ProfileController::class, 'profileupdate'])->name('profile.author.update');

    Route::post('report-news/{news}', [ReportController::class, 'store'])->name('report.store');
    Route::post('contact', [ContactUsController::class, 'store'])->name('contact.store');
    // Route::get('news-singgle-post/{news}/{page}', [NewsController::class, 'usernews'])->name('news.user');
    Route::post('news-like/{news}', [NewsHasLikeController::class, 'store'])->name('news.like.store');
    Route::delete('news-unlike/{news}', [NewsHasLikeController::class, 'destroy'])->name('news.like.delete');
    //comment
    Route::post('comment/{news}', [CommentController::class, 'store'])->name('comment.create');
    Route::post('reply-comment/{news}/{id}', [CommentController::class, 'reply'])->name('reply.comment.create');
    Route::post('comment-report/{comment}', [CommentReportController::class, 'store'])->name('comment.report');
    Route::post('comment-edit/{comment}', [CommentController::class, 'update'])->name('comment.update');
    Route::get('comment-delete/{comment}', [CommentController::class, 'destroy'])->name('comment.delete');

    //author
    Route::post('follow/{author}', [FollowersController::class, 'store'])->name('follow.author');
    Route::delete('unfollow/{author}', [FollowersController::class, 'destroy'])->name('unfollow.author');

    Route::get('privacy-policy', [DashboardController::class, 'privacypolicy'])->name('privacy.policy');
    Route::post('profile-change-password/{user}', [ProfileController::class, 'changepassword'])->name('change.password.profile');
    Route::post('photo/{user}', [UserController::class, 'store'])->name('update-photo');

    Route::get('profile-user-update', function () {
        return view('pages.user.profile.update');
    })->name('profile.user.update');

    Route::post('update-profile/{user}', [ProfileController::class, 'updateprofile'])->name('update.author.profile');

    Route::get('sub-category-detail/{category}', [CategoryController::class, 'getCategory'])->name('sub.category.id');
    Route::get('pengajuan-berita', [NewsController::class, 'createUserNews'])->name('pengajuan.berita');
    Route::post('create-news-user', [NewsController::class, 'store'])->name('user.berita.store');
});

Route::middleware(['role:user', 'verified','check.banned'])->group(function () {
    Route::get('profile-user', [DashboardController::class, 'userProfile'])->name('profile.user');
    Route::put('user-author/{user}', [AuthorController::class, 'create'])->name('user.author');

    Route::get('ketentuan-dan-persyaratan', function () {
        return view('pages.user.home');
    })->name('user.home');
    Route::get('user-inbox', [UserController::class, 'index'])->name('user.inbox');

    Route::get('berita-upload', function () {
        return view('pages.user.news.upload');
    })->name('berita.upload');

    Route::post('payment-news', [PaymentNewsController::class, 'store'])->name('user.payment.news');

    Route::get('status-berita', function () {
        return view('pages.user.news.status');
    })->name('status.berita');

    Route::get('riwayat-berita', function () {
        return view('pages.user.news.history');
    })->name('user.history.news');

    Route::get('iklan-upload', function () {
        return view('pages.user.iklan.pengajuan');
    })->name('iklan.pengajuan');

    Route::post('iklan-upload', [AdvertisementController::class, 'store'])->name('advertisement.store');
    Route::get('status-iklan', [AdvertisementController::class, 'advertisementStore'])->name('iklan.status');

    Route::get('iklan-biodata', function () {
        return view('pages.user.iklan.upload');
    })->name('iklan.biodata');


    Route::get('status-detail-iklan', function () {
        return view('pages.user.iklan.status-iklan');
    })->name('status.detail.iklan');
    Route::get('status-detail-berita', function () {
        return view('pages.user.news.status-berita');
    })->name('status.detail.berita');

    Route::get('payment-upload/{advertisement}', [AdvertisementController::class, 'show'])->name('payment.advertisement.show');

    Route::post('payment-upload', [PaymentAdvertisementsController::class, 'store'])->name('payment.store');

    Route::get('iklan-ajukan', function () {
        return view('pages.user.iklan.ajukan');
    })->name('iklan.ajukan');

    Route::get('status-selesai-iklan', function () {
        return view('pages.user.iklan.status-selesa');
    })->name('status.selesai.iklan');

    Route::get('pembayaran-iklan', function () {
        return view('pages.user.iklan.pembayaran');
    })->name('user.pembayaran.iklan');

    Route::get('rincian-pembayaran-iklan', function () {
        return view('pages.user.iklan.rincian-pembayaran');
    })->name('user.rincian-pembayaran.iklan');

    Route::get('load-coin', function () {
        return view('pages.user.load-coin.load');
    });

    Route::get('admin-inbox', function () {
        return view('pages.admin.inbox.index');
    })->name('admin.inbox');

    // Inbox
    Route::get('admin-report', [ReportController::class, 'index'])->name('admin.report');

    Route::get('berlangganan-user', function(){
        return view('pages.user.berlangganan.news');
    })->name('user.paket-berlangganan');
});

Route::middleware(['auth'])->group(function () {
    Route::get('user/subscribers', [SubscribeController::class, 'index'])->name('user.berlangganan');
});

Route::get('author', [DashboardController::class, 'authoruser'])->name('author-index');
Route::get('author/{id}', [DashboardController::class, 'authordetail'])->name('author.detail');
Route::get('contact-us', [ContactUsController::class, 'contact'])->name('contact-us.user');
Route::get('aboutus', [DashboardController::class, 'aboutus'])->name('about.us.user');
Route::get('all-news-post', [DashboardController::class, 'newspost'])->name('news.post');
Route::get('{category}', [NewsController::class, 'showCategories'])->name('categories.show.user');
Route::get('{year}/{month}/{day}/{news:slug}', [NewsController::class, 'usernews'])->name('news.user');
Route::get('search',[DashboardController::class,'searchNews'])->name('search');

Route::get('tag/{tag:slug}', [NewsTagController::class, 'show'])->name('tag.show.user');
Route::get('{category:slug}/{subCategory:slug}', [NewsController::class, 'showSubCategories'])->name('subcategories.show.user');

Route::prefix('tag')->name('tag.')->group(function(){
    Route::get('{tag:slug}/', [NewsTagController::class, 'show'])->name('show.user');
});

Route::prefix('{category:slug}')->name('subcategories.')->group(function(){
    Route::get('{subCategory:slug}', [NewsController::class, 'showSubCategories'])->name('show.user');
});

Route::get('load-coin', function () {
    return view('pages.user.load-coin.load');
});

Route::get('all/{slug}/{data}', [NewsController::class, 'showAllCategories'])->name('category.all');
Route::get('allsub/{subslug}/{data}', [NewsController::class, 'showAllSubCategories'])->name('subCategory.all');

Route::get('verifikasi/email/{id}', [RegisterController::class, 'verifikasi'])->name('verisikasi.account');
Route::post('coin-add', [CoinController::class, 'store'])->name('coin.add');
