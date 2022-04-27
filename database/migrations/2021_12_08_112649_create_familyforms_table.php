<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFamilyformsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('familyforms', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('one_id')->nullable();
            $table->string('header')->nullable();
            $table->string('photo')->nullable();
            $table->text('description')->nullable();
            $table->string('lang')->nullable();
            $table->string('link')->nullable();
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
        Schema::dropIfExists('familyforms');
    }
}
