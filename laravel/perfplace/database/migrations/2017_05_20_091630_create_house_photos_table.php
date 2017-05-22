<?php

use Illuminate\Support\Facades\Schema;
use Jessengers\Mongodb\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHousePhotosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('house_photos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('house_id');
            $table->foreign('house_id')->references('id')->on('houses');
            $table->string('filename');
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
        Schema::dropIfExists('house_photos');
    }
}
