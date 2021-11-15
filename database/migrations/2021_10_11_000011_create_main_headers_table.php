<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMainHeadersTable extends Migration
{
    public function up()
    {
        Schema::create('main_headers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('slogan_uz');
            $table->string('slogan_ru');
            $table->string('slogan_en');
            $table->string('title_uz');
            $table->string('title_ru');
            $table->string('title_en');
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
