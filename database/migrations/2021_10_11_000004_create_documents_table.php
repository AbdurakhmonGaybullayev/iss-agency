<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDocumentsTable extends Migration
{
    public function up()
    {
        Schema::create('documents', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('photo');
            $table->string('passport');
            $table->string('diploma');
            $table->string('certificate');
            $table->textarea('certificates');
            $table->string('folder_name');
            $table->boolean('status')->default(0)->nullable();
            $table->timestamps();
        });
    }
}
