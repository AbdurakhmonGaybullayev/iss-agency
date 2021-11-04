<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAboutusesTable extends Migration
{
    public function up()
    {
        Schema::create('aboutuses', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title_uz');
            $table->string('title_ru');
            $table->string('title_en');
            $table->longText('short_description_uz');
            $table->longText('short_description_ru');
            $table->longText('short_description_en');
            $table->string('advantages_uz');
            $table->string('advantages_ru');
            $table->string('advantages_en');
            $table->integer('success_students');
            $table->longText('statistics_short_description_uz');
            $table->longText('statistics_short_description_ru');
            $table->longText('statistics_short_description_en');
            $table->longText('article_uz');
            $table->longText('article_ru');
            $table->longText('article_en');
            $table->longText('footer_text_uz');
            $table->longText('footer_text_ru');
            $table->longText('footer_text_en');
            $table->timestamps();
        });
    }
}
