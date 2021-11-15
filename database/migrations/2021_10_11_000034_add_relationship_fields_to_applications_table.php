<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToApplicationsTable extends Migration
{
    public function up()
    {
        Schema::table('applications', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id')->nullable();
            $table->unsignedBigInteger('university_id')->nullable();
            $table->foreign('user_id', 'user_fk_4938204')->references('id')->on('users');
            $table->foreign('university_id')->references('id')->on('universities');
        });
    }
}
