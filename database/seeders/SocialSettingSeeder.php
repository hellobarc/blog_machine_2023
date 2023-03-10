<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class SocialSettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('social_settings')->insert(
            [
                ['social_icon' => 'fab fa-facebook-f','social_name'=>'Facebook','social_url'=>'http://facebook.com/acazemy','status'=>'active'],
                ['social_icon' => 'fab fa-twitter','social_name'=>'Twitter','social_url'=>'http://twitter.com/acazemy','status'=>'active'],
                ['social_icon' => 'fab fa-instagram','social_name'=>'Instagram','social_url'=>'http://instagram.com/acazemy','status'=>'active'],
                ['social_icon' => 'fab fa-youtube','social_name'=>'Youtube','social_url'=>'http://youtube.com/acazemy','status'=>'active'],
                ['social_icon' => 'fas fa-rss','social_name'=>'RSS','social_url'=>'http://acazemy.com/rss','status'=>'active'],
                ['social_icon' => 'fab fa-linkedin-in','social_name'=>'Linked In','social_url'=>'http://linkedin.com/acazemy','status'=>'active'],
                ['social_icon' => 'fab fa-google-plus-g','social_name'=>'Google Plus','social_url'=>'http://googleplus.com/acazemy','status'=>'active'],
            ]
        );
    }
}
