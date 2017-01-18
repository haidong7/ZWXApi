<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLoginsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('logins', function (Blueprint $table) {
            $table->increments('id');
            $table->string('deviceName');
            $table->string('deviceMac');
            $table->string('deviceSn');
            $table->string('deviceType');
            $table->string('deviceHardwareVersion');
            $table->string('deviceSoftwareVersion');
            $table->string('deviceDatetime');
            $table->string('deviceRuntime');
            $table->string('deviceStorage');
            $table->string('deviceFiletype');
            $table->string('deviceFileuploadUrl');
            $table->string('deviceFileVersion');
            $table->string('deviceActivityInterval');
            $table->string('deviceSaveInterval');
            $table->string('deviceUploadInterval');
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
        Schema::drop('logins');
    }
}
