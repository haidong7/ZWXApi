<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsridsuploadsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usridsuploads', function (Blueprint $table) {
            $table->integer('id');
            $table->string('mac');
            $table->string('vtime');
            $table->string('name');
            $table->string('value');
            $table->string('devicemac');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('usridsuploads');
    }
}
