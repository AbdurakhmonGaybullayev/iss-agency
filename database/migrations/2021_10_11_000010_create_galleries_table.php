<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGalleriesTable extends Migration
{
    public function up()
    {
        Schema::create('galleries', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('number');
            $table->string('short_description_uz');
            $table->string('short_description_ru');
            $table->string('short_description_en');
            $table->timestamps();
        });
    }
}
