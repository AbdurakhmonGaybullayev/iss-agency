<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHomeDirectionSectionsTable extends Migration
{
    public function up()
    {
        Schema::create('home_direction_sections', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('number');
            $table->string('name_uz')->unique();
            $table->string('name_ru')->unique();
            $table->string('name_en')->unique();
            $table->string('short_description_uz')->nullable();
            $table->string('short_description_ru')->nullable();
            $table->string('short_description_en')->nullable();
            $table->timestamps();
        });
    }
}
