<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class BusStopHasBuses extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bus_stop_has_buses', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('bus_id');
            $table->unsignedInteger('bus_stop_id');
            $table->foreign('bus_id')->references('id')->on('buses');
            $table->foreign('bus_stop_id')->references('id')->on('bus_stops');
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
        //
    }
}
