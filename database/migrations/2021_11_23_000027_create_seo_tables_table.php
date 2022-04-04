<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSeoTablesTable extends Migration
{
    public function up()
    {
        Schema::create('seo_tables', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('title_uz');
            $table->string('title_ru');
            $table->string('title_en');
            $table->longText('seo_description_uz');
            $table->longText('seo_description_ru');
            $table->longText('seo_description_en');
            $table->longText('seo_keywords_uz');
            $table->longText('seo_keywords_ru');
            $table->longText('seo_keywords_en');
            $table->timestamps();
        });
    }
}
