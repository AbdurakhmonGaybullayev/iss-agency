<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVideosTable extends Migration
{
    public function up()
    {
        Schema::create('videos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('number');
            $table->string('title_uz');
            $table->string('title_ru');
            $table->string('title_en');
            $table->string('type');
            $table->boolean('top')->default(0)->nullable();
            $table->longText('short_description_uz');
            $table->longText('short_description_ru');
            $table->longText('short_description_en');
            $table->longText('seo_keywords_uz');
            $table->longText('seo_keywords_ru');
            $table->longText('seo_keywords_en');
            $table->timestamps();
        });
    }
}
