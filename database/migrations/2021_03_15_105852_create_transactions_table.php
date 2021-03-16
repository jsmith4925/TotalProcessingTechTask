<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->foreignId('userId')->references('id')->on('users');
            $table->decimal('amount', $precision = 8, $scale = 2);
            $table->string('merchantTransactionId');
            $table->string('checkoutID')->default('Not Checked Out');
            $table->string('resultCode')->default('Not recieved');
            $table->string('description')->default('Not recieved');
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
        Schema::drop('transactions');
    }
}
