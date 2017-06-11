<?php

use Illuminate\Support\Facades\Schema;
use Jessengers\Mongodb\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTwittsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('twitts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('type');
            $table->string('text');
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
        Schema::dropIfExists('twitts');
    }
}
