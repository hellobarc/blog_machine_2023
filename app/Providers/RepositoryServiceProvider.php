<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use App\Interfaces\CategoryRepositoryInterface;
use App\Repositories\CategoryRepository;
use App\Interfaces\ModuleRepositoryInterface;
use App\Repositories\ModuleRepository;
use App\Interfaces\ArticleRepositoryInterface;
use App\Repositories\ArticleRepository;
use App\Interfaces\ArticleContentRepositoryInterface;
use App\Repositories\ArticleContentRepository;
use App\Interfaces\TextContentRepositoryInterface;
use App\Repositories\TextContentRepository;
use App\Interfaces\ImageContentRepositoryInterface;
use App\Repositories\ImageContentRepository;
use App\Interfaces\VideoContentRepositoryInterface;
use App\Repositories\VideoContentRepository;
use App\Interfaces\CommentRepositoryInterface;
use App\Repositories\CommentRepository;
use App\Interfaces\RatingRepositoryInterface;
use App\Repositories\RatingRepository;
use App\Interfaces\HitCounterRepositoryInterface;
use App\Repositories\HitCounterRepository;
use App\Interfaces\RightTextVideoRepositoryInterface;
use App\Repositories\RightTextVideoRepository;
use App\Interfaces\LeftTextVideoRepositoryInterface;
use App\Repositories\LeftTextVideoRepository;
use App\Interfaces\AudioContentRepositoryInterface;
use App\Repositories\AudioContentRepository;

use App\Interfaces\Quiz\QuizRepositoryInterface;
use App\Repositories\Quiz\QuizRepository;
use App\Interfaces\Quiz\QuizQuestionRepositoryInterface;
use App\Repositories\Quiz\QuizQuestionRepository;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
                        CategoryRepositoryInterface::class, 
                        CategoryRepository::class
                        );
        $this->app->bind(
                        ModuleRepositoryInterface::class, 
                        ModuleRepository::class
                        );
        $this->app->bind(
                        ArticleRepositoryInterface::class, 
                        ArticleRepository::class
                        );
        $this->app->bind(
                        ArticleContentRepositoryInterface::class, 
                        ArticleContentRepository::class
                        );
        $this->app->bind(
                        TextContentRepositoryInterface::class, 
                        TextContentRepository::class
                        );
        $this->app->bind(
                        ImageContentRepositoryInterface::class, 
                        ImageContentRepository::class
                        );
        $this->app->bind(
                        VideoContentRepositoryInterface::class, 
                        VideoContentRepository::class
                        );
        $this->app->bind(
                        CommentRepositoryInterface::class, 
                        CommentRepository::class
                        );
        $this->app->bind(
                        RatingRepositoryInterface::class, 
                        RatingRepository::class
                        );
        $this->app->bind(
                        HitCounterRepositoryInterface::class, 
                        HitCounterRepository::class
                        );
        $this->app->bind(
                        RightTextVideoRepositoryInterface::class, 
                        RightTextVideoRepository::class
                        );
        $this->app->bind(
                        LeftTextVideoRepositoryInterface::class, 
                        LeftTextVideoRepository::class
                        );
        $this->app->bind(
                        AudioContentRepositoryInterface::class, 
                        AudioContentRepository::class
                        );
        // for Quiz
        $this->app->bind(
                        QuizRepositoryInterface::class, 
                        QuizRepository::class
                        );
        $this->app->bind(
                        QuizQuestionRepositoryInterface::class, 
                        QuizQuestionRepository::class
                        );
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
