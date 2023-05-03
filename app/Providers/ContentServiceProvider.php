<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Category;
use App\Models\SocialSetting;
use App\Models\SiteSetting;

class ContentServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */



    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->menuItems = ["Home", "About Us", "Contact"];
        $this->category =  Category::all();
        $this->socialS_setting =  SocialSetting::all();
        $this->site_logo =  SiteSetting::pluck('logo_file')->first();
        $this->theme_name = env('SITE_THEME');

        view()->composer('theme.'.$this->theme_name.'.master', function($view) {
            $view->with(['contents' =>  $this->category, 'social_setting'=>$this->socialS_setting,'site_logo'=>$this->site_logo ]);
        });
    }
}
