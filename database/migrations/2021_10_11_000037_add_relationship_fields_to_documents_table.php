<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToDocumentsTable extends Migration
{
    public function up()
    {
        Schema::table('documents', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id', 'user_fk_4937980')->references('id')->on('users');
            $table->unsignedBigInteger('university_id')->nullable();
            $table->foreign('university_id', 'university_fk_4937981')->references('id')->on('universities');
            $table->unsignedBigInteger('direction_id')->nullable();
            $table->foreign('direction_id', 'direction_fk_4937986')->references('id')->on('directions');
        });
    }
}
