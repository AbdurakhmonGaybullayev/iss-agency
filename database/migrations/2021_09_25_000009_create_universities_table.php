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
            $table->string('name_uz');
            $table->string('name_ru');
            $table->string('name_en');
            $table->boolean('top')->default(0);
            $table->longText('short_description_uz');
            $table->longText('short_description_ru')->nullable();
            $table->longText('short_description_en')->nullable();
            $table->longText('article_description_uz');
            $table->longText('article_description_ru');
            $table->longText('article_description_en');
            $table->float('ielts', 15, 2);
            $table->decimal('price', 15, 2);
            $table->integer('number');
            $table->timestamps();
        });
    }
}
