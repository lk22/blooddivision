<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRolesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        /**
         * setup the roles table 
         * @return [Object] Illuminate\Database\Schema\Blueprint - $table
         */
        Schema::create('roles', function(Blueprint $table){
            /**
             * the roles id
             */
            $table->increments('id');

            /**
             * the role
             */
            $table->string('role');

            /**
             * setup integer for usage as a foreign key to the users id
             */
            $table->integer('user_id')->unsigned();

            /**
             * setup integer field as foreign key
             */
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('roles');
    }
}
