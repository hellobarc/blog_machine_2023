<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\SiteSetting;

class SiteSettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        SiteSetting::create(
                        [
                            'logo_file'=>'logo.pnp',
                            'homepage_title'=>'Blog Site',
                            'homepage_description'=>'Home page description Meta Tag',
                            'site_email'=>'tariq.barc@gmail.com',
                            'featured_post_count'=>3,
                            'pagination_post_count'=>10
                        ]);
    }
}

