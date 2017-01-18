<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateApsuploadssidsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('apsuploadssids', function (Blueprint $table) {
            $table->integer('id');
            $table->string('Ssid');
            $table->string('Mac');
            $table->string('stime');
            $table->string('etime');
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
        Schema::drop('apsuploadssids');
    }
}
