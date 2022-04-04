<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDirectionProgrammPivotTable extends Migration
{
    public function up()
    {
        Schema::create('direction_programm', function (Blueprint $table) {
            $table->unsignedBigInteger('direction_id');
            $table->foreign('direction_id', 'direction_id_fk_4938767')->references('id')->on('directions')->onDelete('cascade');
            $table->unsignedBigInteger('programm_id');
            $table->foreign('programm_id', 'programm_id_fk_4938767')->references('id')->on('programms')->onDelete('cascade');
        });
    }
}
