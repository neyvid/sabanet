<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAttachmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('attachments', function (Blueprint $table) {
            $table->increments('id');
            $table->string('type', 100);
            $table->string('name', 100);
//            $table->integer('attachment_uploader',100);
            $table->integer('size');
        });
        Schema::create('attachables', function (Blueprint $table) {
            $table->integer('attachment_id');
            $table->integer('attachable_id');
            $table->string('attachable_type', 60);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('attachments');
        Schema::dropIfExists('attachables');
    }
}
