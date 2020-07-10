<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExchangeratesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('exchangerates', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('first_currency');
            $table->unsignedInteger('second_currency');
            $table->decimal('rate', 10, 6);
            $table->char('value', 2);
            $table->timestamps();

            $table->foreign('first_currency')->references('id')->on('currencies');
            $table->foreign('second_currency')->references('id')->on('currencies');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('exchangerates');
    }
}
