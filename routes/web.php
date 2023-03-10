<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Front\HomepageController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Admin\AdminController;


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
//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


//Auth::routes();


// Route::get('/login', [AuthController::class, 'index'])->name('home');


Route::controller(AuthController::class)
    ->group(function () {
        Route::match(array('GET','POST'),'/login', 'login')->name('login');
        Route::get('/register', 'login')->name('home_register');
    });


Route::controller(HomepageController::class)
    ->group(function () {
        Route::get('/', 'homepage')->name('home_page');
        Route::get('/category/{id}/{slug}', 'category')->name('category_page')->where('id', '[0-9]+');
        Route::get('/detail/{id}/{slug}', 'detail')->name('detail_page')->where('id', '[0-9]+');
        Route::get('/search', 'search')->name('search_page');
    });


// Route::middleware(['auth'])->prefix('admin')->group(function () {
//     Route::get('/dashboard', [AdminController::class,'adminDashboard'])->name('admin.dashboard');
// });

Route::get('/admin/{any}', [AdminController::class,'adminDashboard'])->name('admin.dashboard')->where('any', '.*');


