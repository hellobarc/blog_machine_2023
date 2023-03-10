<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ModuleController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\ArticleContentController;
use App\Http\Controllers\TextContentController;
use App\Http\Controllers\ImageContentController;
use App\Http\Controllers\VideoContentController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\RatingController;
use App\Http\Controllers\HitCounterController;
use App\Http\Controllers\RightTextVideoController;
use App\Http\Controllers\LeftTextVideoController;
use App\Http\Controllers\frontend\ArticleFrontController;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });
Route::group(['middleware' => 'api', 'prefix'=> 'auth'], function ($routes) {

    Route::post('/register', [AuthController::class, 'register']);
    Route::post('/login', [AuthController::class, 'login'])->name('login');
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::post('/refresh', [AuthController::class, 'refresh']);
    Route::get('/user', [AuthController::class, 'me']);

});

//admin panel routes
//category routes
Route::get('category', [CategoryController::class, 'index']);
Route::group(['middleware' => 'adminAuth', 'prefix'=> 'auth'], function ($routes) {
    Route::get('category/create', [CategoryController::class, 'create']);
    Route::post('category/store', [CategoryController::class, 'store']);
    Route::get('category/show/{id}', [CategoryController::class, 'show']);
    Route::post('category/update/{id}', [CategoryController::class, 'update']);
    Route::delete('category/delete/{id}', [CategoryController::class, 'destroy']);

    //Module routes
    Route::get('module/create', [ModuleController::class, 'create']);
    Route::post('module/store', [ModuleController::class, 'store']);
    Route::get('module/show/{id}', [ModuleController::class, 'show']);
    Route::post('module/update/{id}', [ModuleController::class, 'update']);
    Route::delete('module/delete/{id}', [ModuleController::class, 'destroy']);

    //article admin routes
    Route::get('article/create', [ArticleController::class, 'create']);
    Route::post('article/store', [ArticleController::class, 'store']);
    Route::get('article/show/{id}', [ArticleController::class, 'show']);
    Route::post('article/update/{id}', [ArticleController::class, 'update']);
    Route::delete('article/delete/{id}', [ArticleController::class, 'destroy']);

    //article content routes
    Route::get('article-content/create', [ArticleContentController::class, 'create']);
    Route::post('article-content/store', [ArticleContentController::class, 'store']);
    Route::get('article-content/show/{id}', [ArticleContentController::class, 'show']);
    Route::post('article-content/update/{id}', [ArticleContentController::class, 'update']);
    Route::delete('article-content/delete/{id}', [ArticleContentController::class, 'destroy']);

    //text content routes
    Route::get('text-content/create', [TextContentController::class, 'create']);
    Route::post('text-content/store', [TextContentController::class, 'store']);
    Route::get('text-content/show/{id}', [TextContentController::class, 'show']);
    Route::post('text-content/update/{id}', [TextContentController::class, 'update']);
    Route::delete('text-content/delete/{id}', [TextContentController::class, 'destroy']);

    //image content routes
    Route::get('image-content/create', [ImageContentController::class, 'create']);
    Route::post('image-content/store', [ImageContentController::class, 'store']);
    Route::get('image-content/show/{id}', [ImageContentController::class, 'show']);
    Route::post('image-content/update/{id}', [ImageContentController::class, 'update']);
    Route::delete('image-content/delete/{id}', [ImageContentController::class, 'destroy']);

    //video content routes
    Route::get('video-content/create', [VideoContentController::class, 'create']);
    Route::post('video-content/store', [VideoContentController::class, 'store']);
    Route::get('video-content/show/{id}', [VideoContentController::class, 'show']);
    Route::post('video-content/update/{id}', [VideoContentController::class, 'update']);
    Route::delete('video-content/delete/{id}', [VideoContentController::class, 'destroy']);

    //right text video content routes
    Route::post('right-text-video/store', [RightTextVideoController::class, 'store']);
    Route::get('right-text-video/show/{id}', [RightTextVideoController::class, 'show']);
    Route::post('right-text-video/update/{id}', [RightTextVideoController::class, 'update']);
    Route::delete('right-text-video/delete/{id}', [RightTextVideoController::class, 'destroy']);

    //right text video content routes
    Route::post('left-text-video/store', [LeftTextVideoController::class, 'store']);
    Route::get('left-text-video/show/{id}', [LeftTextVideoController::class, 'show']);
    Route::post('left-text-video/update/{id}', [LeftTextVideoController::class, 'update']);
    Route::delete('left-text-video/delete/{id}', [LeftTextVideoController::class, 'destroy']);

    //article_content using article_id
    Route::get('article-content/get/{id}', [ArticleContentController::class, 'articleContentByArticleId']);
    //quotes content
    Route::get('quoutes-content/get/{id}', [ArticleContentController::class, 'quotesContentById']);
    //Text Content by Content id
    Route::get('text-content/get/{id}', [TextContentController::class, 'textContentByArticleContentId']);
    //image Content by Content id
    Route::get('image-content/get/{id}', [ImageContentController::class, 'imageContentByArticleContentId']);
    //video Content by Content id
    Route::get('video-content/get/{id}', [VideoContentController::class, 'videoContentByArticleContentId']);


});

Route::group(['middleware' => 'auth', 'prefix'=> 'user'], function ($routes) {
    //comment route
    Route::post('comment/store', [CommentController::class, 'store']);
    Route::get('comment/show/{id}', [CommentController::class, 'show']);

    //rating route
    Route::post('rating/store', [RatingController::class, 'store']);
    Route::get('rating/show/{id}', [RatingController::class, 'show']);
});

Route::group(['middleware' => 'api'], function ($routes) {
    //hit counter route
    Route::post('hit-counter/store', [HitCounterController::class, 'store']);

    //article routes
    Route::get('article', [ArticleController::class, 'index']);
    Route::get('article/featured-post', [ArticleFrontController::class, 'getFeaturedPost'])->name('featured_post');
    Route::get('article/latest-post', [ArticleFrontController::class, 'getLatestPost']);
    Route::get('article/post-details/{id}', [ArticleFrontController::class, 'getDetailsPost']);
    Route::get('article/related-post/{id}', [ArticleFrontController::class, 'getRelatedPost']);
    Route::get('article/premium-post', [ArticleFrontController::class, 'getPremiumPost']);

    //popular article routes
    Route::get('article/popular-post', [ArticleFrontController::class, 'getPopularPost']);

    //search article routes
    Route::post('article/search-post', [ArticleFrontController::class, 'getSearchPost']);

    //category wise article
    Route::get('category/article/{category_id}', [ArticleFrontController::class, 'categoryWiseArticle']);

});


