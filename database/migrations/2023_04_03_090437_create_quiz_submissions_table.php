<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuizSubmissionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('quiz_submissions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('quiz_submission_log_id');
            $table->bigInteger('quiz_content_id');
            // $table->bigInteger('quiz_id');
            $table->bigInteger('question_id');
            $table->string('question_type');
            $table->string('quiz_type');
            $table->string('answered_text')->nullable();
            $table->string('is_correct')->nullable();
            $table->integer('obtained_marks')->nullable();
            $table->string('submitted_ans')->nullable();
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
        Schema::dropIfExists('quiz_submissions');
    }
}
