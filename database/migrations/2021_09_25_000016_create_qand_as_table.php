<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQandAsTable extends Migration
{
    public function up()
    {
        Schema::create('qand_as', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('question');
            $table->string('answer');
            $table->integer('number')->nullable();
            $table->timestamps();
        });
    }
}
