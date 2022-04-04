<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTestimonialsTable extends Migration
{
    public function up()
    {
        Schema::create('testimonials', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('number');
            $table->string('name');
            $table->longText('text_uz');
            $table->longText('text_ru');
            $table->longText('text_en');
            $table->string('occupation_uz');
            $table->string('occupation_ru');
            $table->string('occupation_en');
            $table->timestamps();
        });
    }
}
