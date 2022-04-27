<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFamiliesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('families', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->integer('one_id')->nullable();
            $table->string('header')->nullable();
            $table->text('type_of_cerimony')->nullable();

            $table->string('photo_a')->nullable();
            $table->text('description_a')->nullable();

            $table->text('photo_b')->nullable();
            $table->text('description_b')->nullable();

            $table->text('photo_c')->nullable();
            $table->text('description_c')->nullable();
            $table->text('description_d')->nullable();

            $table->string('lang')->nullable();

            $table->text('link')->nullable();

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
        Schema::dropIfExists('families');
    }
}
