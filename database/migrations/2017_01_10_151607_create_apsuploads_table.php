<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateApsuploadsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('apsuploads', function (Blueprint $table) {
            $table->integer('id');
            $table->string('mac');
            $table->string('ssid');
            $table->string('Mode');
            $table->string('RSSI');
            $table->string('Channel');
            $table->string('P1');
            $table->string('P2');
            $table->string('P3');
            $table->string('P4');
            $table->string('P5');
            $table->string('stime');
            $table->string('etime');
            $table->string('slocal');
            $table->string('elocal');
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
        Schema::drop('apsuploads');
    }
}
