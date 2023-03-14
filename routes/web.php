<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Front\HomepageController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\{
                            CategoryController,
                            ArticleController,
                            AuthorController,
                            ArticleContentController,
                            TextContentController,
                            ImageContentController,
                            LeftTextVideoController,
                            RightTextVideoController,
                        };

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
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


Route::controller(HomepageController::class)
    ->group(function () {
        Route::get('/', 'homepage')->name('home_page');
        Route::get('/category/{id}/{slug}', 'category')->name('category_page')->where('id', '[0-9]+');
        Route::get('/detail/{id}/{slug}', 'detail')->name('detail_page')->where('id', '[0-9]+');
        Route::get('/search', 'search')->name('search_page');
    });


Route::middleware(['auth:admin'])->prefix('admin')->group(function () {
    Route::get('/dashboard', [AdminController::class,'adminDashboard'])->name('admin.dashboard');
    // Create Author
    Route::controller(AuthorController::class)->group(function () {
        Route::get('/manage-author','index')->name('author');
        Route::get('/create-author','create')->name('create.author');
        Route::post('/store-author','store')->name('store.author');
        Route::get('/destroy-author/{id}','destroy')->name('destory.author');
    });
    //category routes
    Route::controller(CategoryController::class)->group(function () {
        Route::get('/manage-category','index')->name('admin.category');
        Route::get('/create-category','create')->name('admin.create.category');
        Route::post('/store-category','store')->name('admin.store.category');
        Route::get('/show-category/{id}','show')->name('admin.show.category');
        Route::post('/update-category/{id}','update')->name('admin.update.category');
        Route::get('/destroy-category/{id}','destroy')->name('admin.destory.category');
    });
   
    // Article routes
    Route::controller(ArticleController::class)->group(function () {
        Route::get('/manage-article','index')->name('admin.article');
        Route::get('/create-article','create')->name('admin.create.article');
        Route::post('/store-article','store')->name('admin.store.article');
        Route::get('/show-article/{id}','show')->name('admin.show.article');
        Route::post('/update-article/{id}','update')->name('admin.update.article');
        Route::get('/destroy-article/{id}','destroy')->name('admin.destory.article');
    });
    // Article content routes
    Route::controller(ArticleContentController::class)->group(function () {
        Route::get('/manage-article-content','index')->name('admin.article-content');
        Route::get('/create-article-content','create')->name('admin.create.article-content');
        Route::post('/store-article-content','store')->name('admin.store.article-content');
        Route::get('/show-article-content/{id}','show')->name('admin.show.article-content');
        Route::post('/update-article-content/{id}','update')->name('admin.update.article-content');
        Route::get('/destroy-article-content/{id}','destroy')->name('admin.destory.article-content');
    });
    Route::controller(TextContentController::class)->group(function () {
        Route::get('/manage-text-content','index')->name('admin.text-content');
        Route::get('/create-text-content/{content_type}','create')->name('admin.create.text-content');
        Route::post('/store-text-content','store')->name('admin.store.text-content');
        Route::get('/show-text-content/{id}/{content_type}','show')->name('admin.show.text-content');
        Route::post('/update-text-content/{id}','update')->name('admin.update.text-content');
        Route::get('/destroy-text-content/{id}','destroy')->name('admin.destory.text-content');
    });
    Route::controller(ImageContentController::class)->group(function () {
        Route::get('/manage-image-content','index')->name('admin.image-content');
        Route::get('/create-image-content','create')->name('admin.create.image-content');
        Route::post('/store-image-content','store')->name('admin.store.image-content');
        Route::get('/show-image-content/{id}','show')->name('admin.show.image-content');
        Route::post('/update-image-content/{id}','update')->name('admin.update.image-content');
        Route::get('/destroy-image-content/{id}','destroy')->name('admin.destory.image-content');
    });
    Route::controller(LeftTextVideoController::class)->group(function () {
        Route::get('/manage-left-text-video','index')->name('admin.left-text-video');
        Route::get('/create-left-text-video','create')->name('admin.create.left-text-video');
        Route::post('/store-left-text-video','store')->name('admin.store.left-text-video');
        Route::get('/show-left-text-video/{id}','show')->name('admin.show.left-text-video');
        Route::post('/update-left-text-video/{id}','update')->name('admin.update.left-text-video');
        Route::get('/destroy-left-text-video/{id}','destroy')->name('admin.destory.left-text-video');
    });
    Route::controller(RightTextVideoController::class)->group(function () {
        Route::get('/manage-right-text-video','index')->name('admin.right-text-video');
        Route::get('/create-right-text-video','create')->name('admin.create.right-text-video');
        Route::post('/store-right-text-video','store')->name('admin.store.right-text-video');
        Route::get('/show-right-text-video/{id}','show')->name('admin.show.right-text-video');
        Route::post('/update-right-text-video/{id}','update')->name('admin.update.right-text-video');
        Route::get('/destroy-right-text-video/{id}','destroy')->name('admin.destory.right-text-video');
    });
});




Auth::routes();

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/admin',[LoginController::class,'showAdminLoginForm'])->name('admin.login-view');
Route::post('/admin',[LoginController::class,'adminLogin'])->name('admin.login');

Route::get('/admin/register',[RegisterController::class,'showAdminRegisterForm'])->name('admin.register-view');
Route::post('/admin/register',[RegisterController::class,'createAdmin'])->name('admin.register');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

