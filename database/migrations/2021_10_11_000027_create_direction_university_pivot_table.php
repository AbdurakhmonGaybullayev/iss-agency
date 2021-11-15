<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDirectionUniversityPivotTable extends Migration
{
    public function up()
    {
        Schema::create('direction_university', function (Blueprint $table) {
            $table->unsignedBigInteger('university_id');
            $table->foreign('university_id', 'university_id_fk_4938642')->references('id')->on('universities')->onDelete('cascade');
            $table->unsignedBigInteger('direction_id');
            $table->foreign('direction_id', 'direction_id_fk_4938642')->references('id')->on('directions')->onDelete('cascade');
        });
    }
}
