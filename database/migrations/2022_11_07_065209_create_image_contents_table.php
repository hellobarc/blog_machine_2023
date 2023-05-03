<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateImageContentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('image_contents', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('article_id')->default(0);
            $table->bigInteger('article_content_id');
            $table->text('image')->comment('image_url');
            // $table->string('font');
            // $table->smallInteger('font_size');
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
        Schema::dropIfExists('image_contents');
    }
}
