<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCertificateDocumentPivotTable extends Migration
{
    public function up()
    {
        Schema::create('certificate_document', function (Blueprint $table) {
            $table->unsignedBigInteger('document_id');
            $table->foreign('document_id', 'document_id_fk_5096288')->references('id')->on('documents')->onDelete('cascade');
            $table->unsignedBigInteger('certificate_id');
            $table->foreign('certificate_id', 'certificate_id_fk_5096288')->references('id')->on('certificates')->onDelete('cascade');
        });
    }
}
