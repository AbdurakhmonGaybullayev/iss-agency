<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNewsTable extends Migration
{
    public function up()
    {
        Schema::create('news', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title_uz');
            $table->string('title_ru');
            $table->string('title_en');
            $table->longText('short_description_uz');
            $table->longText('short_description_ru');
            $table->longText('short_description_en');
            $table->longText('article_uz');
            $table->longText('article_ru');
            $table->longText('article_en');
            $table->longText('seo_keywords_uz');
            $table->longText('seo_keywords_ru');
            $table->longText('seo_keywords_en');
            $table->timestamps();
        });
    }
}
