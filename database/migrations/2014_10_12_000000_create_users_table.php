<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        /**
        * creates the users table
        *
        * @return Illuminate\Database\Schema\Migration
        */
        Schema::create('users', function (Blueprint $table) {

            /**
            * the incrementing field
            */
            $table->increments('id');

            /**
            * the username field
            */
            $table->string('name');

            /**
            * the email field 
            */
            $table->string('email')->unique();

            /**
            * the password field
            */
            $table->string('password', 60);

            /**
            * the profile avatar 
            */
            $table->string('avatar');

            /**
            * the profile cover image
            */
            $table->string('profile_cover');  

            /**
            * profile description field
            */
            $table->text('profile_desc');

            /**
            * remembered token field 
            */
            $table->rememberToken();

            /**
            * the created_at, updated_at timestamp fields
            */
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
        Schema::drop('users');
    }
}
