<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExchangesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('exchanges', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('user_id');
            $table->unsignedInteger('person_id')->nullable();
            $table->string('description')->nullable();
            $table->unsignedInteger('from_currency');
            $table->decimal('from_amount');
            $table->unsignedInteger('to_currency');
            $table->decimal('to_amount');
            $table->timestamps();

            $table->foreign('id')->references('id')->on('offerexchanges');
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('person_id')->references('id')->on('users');
            $table->foreign('from_currency')->references('id')->on('currencies');
            $table->foreign('to_currency')->references('id')->on('currencies');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('exchanges');
    }
}
