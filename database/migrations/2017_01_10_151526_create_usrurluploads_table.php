<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsrurluploadsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usrurluploads', function (Blueprint $table) {
            $table->integer('id');
            $table->string('mac');
            $table->string('vtime');
            $table->string('domain');
            $table->string('path');
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
        Schema::drop('usrurluploads');
    }
}
