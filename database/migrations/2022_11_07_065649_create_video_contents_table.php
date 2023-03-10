<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVideoContentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('video_contents', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('article_id')->default(0);
            $table->bigInteger('article_content_id');
            $table->longText('video_url');
            $table->string('video_title');
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
        Schema::dropIfExists('video_contents');
    }
}
