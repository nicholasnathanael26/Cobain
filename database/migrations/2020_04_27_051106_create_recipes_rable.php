<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRecipesRable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('recipes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('food_id')->unsigned();
            $table->bigInteger('ingredient_id')->unsigned();
            $table->integer('qty');
            $table->timestamps();
        });
        Schema::table('recipes', function (Blueprint $table) {
            $table->foreign('food_id')
                ->references('id')
                ->on('foods')
                ->onDelete('cascade');
        });

        Schema::table('recipes', function (Blueprint $table) {
            $table->foreign('ingredient_id')
                ->references('id')
                ->on('ingredients')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('recipes');
    }
}
