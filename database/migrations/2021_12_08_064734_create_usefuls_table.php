<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsefulsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usefuls', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->string('type')->nullable();
            $table->integer('one_id')->nullable();
            $table->string('photo')->nullable();
            $table->string('header')->nullable();
            $table->text('description')->nullable();
            $table->string('link')->nullable();
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
        Schema::dropIfExists('usefuls');
    }
}
