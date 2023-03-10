<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSiteSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('site_settings', function (Blueprint $table) {
            $table->id();
            $table->string('logo_file')->default('logo.png');
            $table->string('homepage_title')->default('Home page Title');
            $table->string('homepage_description')->default('Home page description');
            $table->string('site_email')->default('tariq.barc@gmail.com');
            $table->smallInteger('featured_post_count');
            $table->smallInteger('pagination_post_count');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('site_settings');
    }
}
