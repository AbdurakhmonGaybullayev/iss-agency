<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCooperationsTable extends Migration
{
    public function up()
    {
        Schema::create('cooperations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('company_name');
            $table->string('position');
            $table->longText('address');
            $table->longText('message');
            $table->boolean('status')->default(0)->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
