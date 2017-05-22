<?php

use Illuminate\Support\Facades\Schema;
use Jenssegers\Mongodb\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHousesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('houses', function (Blueprint $table) {
            $table->increments('id');
            $table->longText('userId');
            $table->double('latitude');
            $table->double('longitude');
            $table->string('address');
            $table->text('title');
            $table->longText('description');
            $table->integer('numberOfRooms');
            $table->integer('surface');
            $table->integer('numberOfFloors');
            $table->text('transactionType');
            $table->bigInteger('price');
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
        Schema::dropIfExists('houses');
    }
}
