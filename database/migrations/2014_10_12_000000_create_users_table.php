<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('username');
            $table->string('first_name',255)->nullable();
            $table->string('last_name',255)->nullable();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('address',255)->nullable();
            $table->string('address2',255)->nullable();
            $table->string('phone',30)->nullable();
            $table->date('birthday')->nullable();
            $table->string('city',255)->nullable();
            $table->string('state',255)->nullable();
            $table->string('country',255)->nullable();
            $table->integer('zip_code')->nullable();
            $table->dateTime('last_login_at')->nullable();
            $table->bigInteger('avatar')->nullable();
            $table->text('bio')->nullable();
            $table->string('status',20)->nullable();

            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
