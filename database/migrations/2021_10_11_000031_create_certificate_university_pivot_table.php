<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCertificateUniversityPivotTable extends Migration
{
    public function up()
    {
        Schema::create('certificate_university', function (Blueprint $table) {
            $table->unsignedBigInteger('university_id');
            $table->foreign('university_id', 'university_id_fk_5096236')->references('id')->on('universities')->onDelete('cascade');
            $table->unsignedBigInteger('certificate_id');
            $table->foreign('certificate_id', 'certificate_id_fk_5096236')->references('id')->on('certificates')->onDelete('cascade');
        });
    }
}
