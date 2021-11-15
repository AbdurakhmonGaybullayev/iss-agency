<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCooperationOfferTextsTable extends Migration
{
    public function up()
    {
        Schema::create('cooperation_offer_texts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title_uz');
            $table->string('title_ru');
            $table->string('title_en');
            $table->longText('offer_uz');
            $table->longText('offer_ru');
            $table->longText('offer_en');
            $table->timestamps();
        });
    }
}
