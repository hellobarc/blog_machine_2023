<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuizFillBlanksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('quiz_fill_blanks', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('quiz_id');
            $table->bigInteger('quiz_question_id');
            $table->longText('text');
            $table->enum('is_show', ['yes', 'no']);
            $table->string('blank_answer');
            $table->integer('marks');
            $table->mediumText('instruction')->nullable();
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
        Schema::dropIfExists('quiz_fill_blanks');
    }
}
