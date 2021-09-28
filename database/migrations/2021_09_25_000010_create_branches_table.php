<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBranchesTable extends Migration
{
    public function up()
    {
        Schema::create('branches', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name_uz');
            $table->string('name_ru');
            $table->string('name_en');
            $table->longText('address_uz');
            $table->longText('address_ru');
            $table->longText('address_en');
            $table->string('target_uz');
            $table->string('target_ru');
            $table->string('target_en');
            $table->string('phone_number');
            $table->string('email');
            $table->string('working_hours');
            $table->longText('google_map_link');
            $table->integer('number');
            $table->string('region');
            $table->timestamps();
        });
    }
}
