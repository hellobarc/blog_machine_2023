<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArticlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('title');
            $table->string('category_id');
            $table->string('slug')->default(191);
            $table->text('meta_keyword');
            $table->text('meta_description');
            $table->string('page_title');
            $table->text('thumbnail');
            $table->date('custom_date');
            $table->integer('author_id');
            $table->enum('is_featured', ['0','1']);
            $table->enum('is_trending', ['0','1']);
            $table->text('tags')->nullable();
            $table->integer('read_minutes')->nullable();
            $table->text('references')->nullable();
            $table->integer('co_authors')->nullable();
            $table->string('secondary_categories')->nullable();
            $table->bigInteger('hits')->nullable();
            $table->integer('smily_yes')->nullable();
            $table->integer('smily_no')->nullable();
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
        Schema::dropIfExists('articles');
    }
}
