<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHeadersTable extends Migration
{
    public function up()
    {
        Schema::create('headers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('about_us_uz');
            $table->string('about_us_ru');
            $table->string('about_us_en');
            $table->string('qanda_uz');
            $table->string('qanda_ru');
            $table->string('qanda_en');
            $table->string('cooperation_uz');
            $table->string('cooperation_ru');
            $table->string('cooperation_en');
            $table->string('universities_uz');
            $table->string('universities_ru');
            $table->string('universities_en');
            $table->string('gallery_uz');
            $table->string('gallery_ru');
            $table->string('gallery_en');
            $table->string('blog_uz');
            $table->string('blog_ru');
            $table->string('blog_en');
            $table->string('branch_uz');
            $table->string('branch_ru');
            $table->string('branch_en');
            $table->timestamps();
        });
    }
}
