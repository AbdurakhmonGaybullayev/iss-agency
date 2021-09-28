<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTeamsTable extends Migration
{
    public function up()
    {
        Schema::create('teams', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('full_name_uz');
            $table->string('full_name_ru');
            $table->string('full_name_en');
            $table->string('occupation_uz');
            $table->string('occupation_ru');
            $table->string('occupation_en');
            $table->integer('number');
            $table->timestamps();
        });
    }
}
