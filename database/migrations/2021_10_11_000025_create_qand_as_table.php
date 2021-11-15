<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQandAsTable extends Migration
{
    public function up()
    {
        Schema::create('qand_as', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('number');
            $table->longText('question_uz');
            $table->longText('question_ru')->nullable();
            $table->longText('question_en')->nullable();
            $table->longText('answer_uz');
            $table->longText('answer_ru');
            $table->longText('answer_en');
            $table->timestamps();
        });
    }
}
