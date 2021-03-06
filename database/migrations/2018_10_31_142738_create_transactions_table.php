<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('user_id');
            $table->unsignedInteger('person_id');
            $table->text('description')->nullable();
            $table->unsignedInteger('debit');
            $table->unsignedInteger('credit');
            $table->unsignedInteger('currency');
            $table->decimal('amount');
            $table->string('file')->nullable();
            $table->unsignedInteger('second_account')->nullable();
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('person_id')->references('id')->on('users');
            $table->foreign('debit')->references('id')->on('accounts');
            $table->foreign('credit')->references('id')->on('accounts');
            $table->foreign('currency')->references('id')->on('currencies');
            $table->foreign('second_account')->references('id')->on('accounts');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transactions');
    }
}
