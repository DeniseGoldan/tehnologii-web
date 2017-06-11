<?php

use Illuminate\Support\Facades\Schema;
use Jessengers\Mongodb\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMarkOnGmapsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mark_on_gmaps', function (Blueprint $table) {
            $table->increments('id');
            $table->string('type');
            $table->double('latitude');
            $table->double('longitude');
            $table->string('country');
            $table->string('city');
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
        Schema::dropIfExists('mark_on_gmaps');
    }
}
