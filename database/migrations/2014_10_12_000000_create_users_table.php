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
             * verification
             */
            $table->boolean('verified')->default(false);

            /**
             * email token
             */
            $table->string('token')->nullable();

            /**
            * the profile avatar 
            */
            $table->string('avatar');

            /**
             * profile cover image
             */
            $table->string('cover');

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

            /**
             * set integer field for usage of a foreignkey => roles
             */
            // $table->integer('role_id')->unsigned();

            /**
             * set foreign key for the roles id 
             */
            // $table->foreign('role_id')->references('id')->on('roles')->onDelete('cascade')->nullable;

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
