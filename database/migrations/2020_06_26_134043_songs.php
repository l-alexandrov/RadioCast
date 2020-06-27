<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Songs extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('songs', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('artist_id')->unsigned();
            $table->foreign('artist_id')->references('id')->on('artists')->onDelete('cascade');
            $table->string('name');
            $table->bigInteger('genre_id')->unsigned();
            $table->foreign('genre_id')->references('id')->on('genres')->onDelete('cascade');
            $table->unsignedSmallInteger('length');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('songs');
    }
}
