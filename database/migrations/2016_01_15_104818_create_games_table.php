<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGamesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        /**
        * Create the games database table
        * @object => Schema
        * @param => $table_name: String
        * @param => $callback:   function(Blueprint $table)
        * @return Illuminate\Database\Schema\Migration
        */
        Schema::create('games', function(Blueprint $table){
           
            /**
            * incrementing id field
            */
            $table->increments('id');

            /**
            * the games field
            */
            $table->string('game');

            /**
            * the game cover
            */
            $table->string('game_cover');

            /**
            * timestamp fields
            * @return created_at, updated_at
            */
            $table->timestamps();

            /**
             * deleted_at timestamp
             */
            $table->softDeletes();

            /**
             * integer for the user_id
             */
            $table->integer('user_id')->unsigned();

            /**
             * foreign key related to the user id
             */
            $table->foreign('user_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('games');
    }
}
