<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTracesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('traces', function (Blueprint $table) {
            $table->increments('deviceId');
            $table->string('deviceName');
            $table->string('deviceMac');
            $table->string('deviceSn');
            $table->string('deviceType');
            $table->string('deviceDatetime');
            $table->string('deviceWanIp');
            $table->string('deviceLanIp');
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
        Schema::drop('traces');
    }
}
