<?php

use Illuminate\Support\Facades\Schema;
use Jenssegers\Mongodb\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateApartmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('apartments', function (Blueprint $table) {
            $table->increments('id');
            $table->longText('userId');
            $table->double('latitude');
            $table->double('longitude');
            $table->string('country');
            $table->string('city');
            $table->string('address');
            $table->text('title');
            $table->longText('description');
            $table->integer('numberOfRooms');
            $table->integer('surface');
            $table->integer('floorNumber');
            $table->text('transactionType');
            $table->string('propertyType');
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
        Schema::dropIfExists('apartments');
    }
}
