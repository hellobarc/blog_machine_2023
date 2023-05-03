<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTextContentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('text_contents', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('article_id')->default(0);
            $table->bigInteger('article_content_id');
            $table->longText('content');
            $table->string('font')->nullable();
            $table->smallInteger('font_size')->nullable();
            $table->string('content_type');
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
        Schema::dropIfExists('text_contents');
    }
}
