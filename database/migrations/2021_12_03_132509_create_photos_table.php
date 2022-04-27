<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePhotosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('photos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('type')->nullable();
            $table->string('photo_a')->nullable();
            $table->text('header_a')->nullable();

            $table->string('photo_b')->nullable();
            $table->text('header_b')->nullable();

            $table->string('photo_c')->nullable();
            $table->text('header_c')->nullable();

            $table->string('photo_d')->nullable();
            $table->text('header_d')->nullable();

            $table->string('photo_e')->nullable();
            $table->text('header_e')->nullable();

            $table->string('photo_f')->nullable();
            $table->text('header_f')->nullable();

            $table->string('lang')->nullable();
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
        Schema::dropIfExists('photos');
    }
}
