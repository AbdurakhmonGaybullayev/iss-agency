<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUniversitiesTable extends Migration
{
    public function up()
    {
        Schema::create('universities', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('number')->default('1');
            $table->string('name_uz')->unique();
            $table->string('name_ru')->unique();
            $table->string('name_en')->unique();
            $table->integer('rank');
            $table->boolean('top')->default(0)->nullable();
            $table->longText('short_description_uz');
            $table->longText('short_description_ru');
            $table->longText('short_description_en');
            $table->longText('article_description_uz');
            $table->longText('article_description_ru');
            $table->longText('article_description_en');
            $table->float('ielts', 15, 2);
            $table->decimal('price', 15, 2);
            $table->longText('seo_keywords_uz');
            $table->longText('seo_keywords_ru');
            $table->longText('seo_keywords_en');
            $table->timestamps();
        });
    }
}
