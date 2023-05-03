<?php

use Illuminate\Support\Facades\Route;

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
                            VideoContentController,
                            AudioContentController,
                            TagsController,
                            CommentController,
                            UsersController,
                        };
use App\Http\Controllers\Quiz\{
                            QuizController,
                            QuizQuestionController,
                            QuizAddQuestionController,
                        };

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Front\{
                                    HomepageController,
                                    NewsLetterController,
                                };
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

Route::controller(HomepageController::class)->group(function () {
        Route::get('/', 'homepage')->name('home_page');
        Route::get('/category/{id}/{slug}', 'category')->name('category_page')->where('id', '[0-9]+');
        Route::get('/detail/{id}/{slug}', 'detail')->name('detail_page')->where('id', '[0-9]+');
        Route::get('/search', 'search')->name('search_page');
        Route::get('/tag/{id}/{slug}', 'tags')->name('tag_page');
        Route::post('/quiz-submission', 'quizSubmission')->name('quiz.submission');
        Route::get('/about', 'about')->name('about');
        Route::get('/contact', 'contact')->name('contact');
    });

Route::post('/newsletter', [NewsLetterController::class,'subcribtion'])->name('newsletter.subcribtion');
Route::post('/comment-submit', [NewsLetterController::class,'commentSubmission'])->name('comment.submission');
Route::post('/comment-reply/user', [NewsLetterController::class,'commentReply'])->name('comment.reply');
// Like Or Dislike
Route::post('save-likedislike',[NewsLetterController::class,'save_likedislike']);
//contact with us
Route::post('contact-with-us',[NewsLetterController::class,'contactWithUs'])->name('contact.with.us');

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
    Route::controller(TagsController::class)->group(function () {
        Route::get('/manage-tags','index')->name('tags');
        Route::get('/create-tags','create')->name('create.tags');
        Route::post('/store-tags','store')->name('store.tags');
        Route::get('/destroy-tags/{id}','destroy')->name('destory.tags');
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
        Route::get('/destroy-article-content/{id}/{content_type}','destroy')->name('admin.destory.article-content');
    });
    Route::controller(TextContentController::class)->group(function () {
        Route::get('/manage-text-content/{article_content_id}/{content_type}','index')->name('admin.text-content');
        Route::get('/create-text-content/{article_content_id}/{content_type}','create')->name('admin.create.text-content');
        Route::post('/store-text-content','store')->name('admin.store.text-content');
        Route::get('/show-text-content/{id}/{content_type}','show')->name('admin.show.text-content');
        Route::post('/update-text-content/{id}','update')->name('admin.update.text-content');
        Route::get('/destroy-text-content/{id}','destroy')->name('admin.destory.text-content');
    });
    Route::controller(ImageContentController::class)->group(function () {
        Route::get('/manage-image-content/{article_content_id}/{content_type}','index')->name('admin.image-content');
        Route::get('/create-image-content/{article_content_id}','create')->name('admin.create.image-content');
        Route::post('/store-image-content','store')->name('admin.store.image-content');
        Route::get('/show-image-content/{id}','show')->name('admin.show.image-content');
        Route::post('/update-image-content/{id}','update')->name('admin.update.image-content');
        Route::get('/destroy-image-content/{id}','destroy')->name('admin.destory.image-content');
    });
    Route::controller(LeftTextVideoController::class)->group(function () {
        Route::get('/manage-left-text-video/{article_content_id}/{content_type}','index')->name('admin.left-text-video');
        Route::get('/create-left-text-video','create')->name('admin.create.left-text-video');
        Route::post('/store-left-text-video','store')->name('admin.store.left-text-video');
        Route::get('/show-left-text-video/{id}','show')->name('admin.show.left-text-video');
        Route::post('/update-left-text-video/{id}','update')->name('admin.update.left-text-video');
        Route::get('/destroy-left-text-video/{id}','destroy')->name('admin.destory.left-text-video');
    });
    Route::controller(RightTextVideoController::class)->group(function () {
        Route::get('/manage-right-text-video/{article_content_id}/{content_type}','index')->name('admin.right-text-video');
        Route::get('/create-right-text-video','create')->name('admin.create.right-text-video');
        Route::post('/store-right-text-video','store')->name('admin.store.right-text-video');
        Route::get('/show-right-text-video/{id}','show')->name('admin.show.right-text-video');
        Route::post('/update-right-text-video/{id}','update')->name('admin.update.right-text-video');
        Route::get('/destroy-right-text-video/{id}','destroy')->name('admin.destory.right-text-video');
    });
    Route::controller(VideoContentController::class)->group(function () {
        Route::get('/manage-video-content/{article_content_id}/{content_type}','index')->name('admin.video-content');
        Route::get('/create-video-content/{article_content_id}/{content_type}','create')->name('admin.create.video-content');
        Route::post('/store-video-content','store')->name('admin.store.video-content');
        Route::get('/show-video-content/{id}','show')->name('admin.show.video-content');
        Route::post('/update-video-content/{id}','update')->name('admin.update.video-content');
        Route::get('/destroy-video-content/{id}','destroy')->name('admin.destory.video-content');
    });
    Route::controller(AudioContentController::class)->group(function () {
        Route::get('/manage-audio-content/{article_content_id}/{content_type}','index')->name('admin.audio-content');
        Route::get('/create-audio-content/{article_content_id}/{content_type}','create')->name('admin.create.audio-content');
        Route::post('/store-audio-content','store')->name('admin.store.audio-content');
        Route::get('/show-audio-content/{id}','show')->name('admin.show.audio-content');
        Route::post('/update-audio-content/{id}','update')->name('admin.update.audio-content');
        Route::get('/destroy-audio-content/{id}','destroy')->name('admin.destory.audio-content');
    });
    Route::controller(CommentController::class)->group(function () {
        Route::get('/manage-comments','index')->name('admin.comments');
        Route::post('/change-status-comment','changeStatus')->name('admin.comment.change-status');
        
    });
    //Quiz routes
    Route::controller(QuizController::class)->group(function () {
        Route::get('/manage-quiz','index')->name('admin.quiz');
        Route::get('/create-quiz/{article_id}','create')->name('admin.create.quiz');
        Route::get('/all-article','createArticle')->name('admin.create.quiz.article');
        Route::post('/store-quiz','store')->name('admin.store.quiz');
        Route::get('/show-quiz/{id}/{article_id}','show')->name('admin.show.quiz');
        Route::post('/update-quiz/{id}','update')->name('admin.update.quiz');
        Route::get('/destroy-quiz/{id}/{quiz_type}/{question_type}','destroy')->name('admin.destory.quiz');
    });
    Route::controller(QuizQuestionController::class)->group(function () {
        Route::get('/manage-quiz-question','index')->name('admin.quiz-question');
        Route::get('/create-quiz-question','create')->name('admin.create.quiz-question');
        Route::post('/store-quiz-question','store')->name('admin.store.quiz-question');
        Route::get('/show-quiz-question/{id}','show')->name('admin.show.quiz-question');
        Route::post('/update-quiz-question/{id}','update')->name('admin.update.quiz-question');
        Route::get('/destroy-quiz-question/{id}/{question_type}','destroy')->name('admin.destory.quiz-question');
    });
    Route::controller(QuizAddQuestionController::class)->group(function () {
        Route::get('/manage-quiz-add-question/{quiz_id}/{question_type}','index')->name('admin.manage.quiz-add-question');
        Route::get('/create-quiz-add-question/{quiz_id}/{question_type}','create')->name('admin.create.quiz-add-question');
        Route::post('/store-quiz-add-question','store')->name('admin.store.quiz-add-question');
        Route::post('/store/quiz-fill-blank','storeFillBlank')->name('admin.store.quiz-fill-blank');
        Route::get('/destroy-quiz-add-question/{id}/{question_type}','destroy')->name('admin.destory.quiz-add-question');
    });
    Route::controller(UsersController::class)->group(function () {
        Route::get('/all-user','users')->name('admin.user');
        Route::get('/contacted-user','contactedUser')->name('admin.contact.user');
    });
});




Auth::routes(['register' => false,'login' => false]);

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/admin',[LoginController::class,'showAdminLoginForm'])->name('admin.login-view');
Route::post('/admin',[LoginController::class,'adminLogin'])->name('admin.login');

Route::get('/admin/register',[RegisterController::class,'showAdminRegisterForm'])->name('admin.register-view');
Route::post('/admin/register',[RegisterController::class,'createAdmin'])->name('admin.register');

Route::get('/login/user',[LoginController::class,'showCustomLoginForm'])->name('custom.login-view');
Route::post('/login/user',[LoginController::class,'customLogin'])->name('custom.login');

Route::get('/user/register',[RegisterController::class,'showCustomRegisterForm'])->name('custom.register-view');
Route::post('/user/register',[RegisterController::class,'createCustomUser'])->name('custom.register');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/custom-user/dashboard',function(){
    return view('custom-user');
})->middleware('auth:customLogin');
Route::get('/testing/{url}',[LoginController::class,'test'])->name('test.testing-purpose');