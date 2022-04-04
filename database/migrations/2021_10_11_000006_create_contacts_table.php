<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContactsTable extends Migration
{
    public function up()
    {
        Schema::create('contacts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('email');
            $table->string('phone_number');
            $table->longText('address_uz');
            $table->longText('address_ru');
            $table->longText('address_en');
            $table->string('instagram');
            $table->string('telegram');
            $table->string('facebook');
            $table->string('type')->unique();
            $table->timestamps();
        });
    }
}
