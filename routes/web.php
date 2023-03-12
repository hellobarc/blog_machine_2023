<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Front\HomepageController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\{
                            CategoryController,
                            ArticleController,
                            AuthorController,
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
});




Auth::routes();

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/admin',[LoginController::class,'showAdminLoginForm'])->name('admin.login-view');
Route::post('/admin',[LoginController::class,'adminLogin'])->name('admin.login');

Route::get('/admin/register',[RegisterController::class,'showAdminRegisterForm'])->name('admin.register-view');
Route::post('/admin/register',[RegisterController::class,'createAdmin'])->name('admin.register');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
// Route::get('/admin/dashboard',function(){
//     return view('admin');
// })->middleware('auth:admin');
