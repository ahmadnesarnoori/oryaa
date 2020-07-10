<?php

use Illuminate\Support\Facades\Schema;
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
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->unique();
            $table->char('first_name', 50);
            $table->char('last_name', 50);
            $table->date('date_of_birth');
            $table->char('gender', 10);
            $table->string('address')->nullable();
            $table->char('city', 50)->nullable();
            $table->char('state', 50)->nullable();
            $table->char('country', 50);
            $table->string('bio')->nullable();
            $table->string('image')->nullable();
            $table->string('file')->nullable();
            $table->char('phone_number', 20);
            $table->unsignedInteger('home_currency');
            $table->char('status', 10)->nullable();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
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
