<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFinanceSystemTransactionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('finance_system_transaction', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('payed_to');
            $table->unsignedBigInteger('payed_by');
            $table->unsignedBigInteger('payment_info_id');
            $table->double('amount_payed');
            $table->foreign('payed_to')->references('id')->on('finance_system_user');
            $table->foreign('payed_by')->references('id')->on('finance_system_student');
            $table->foreign('payment_info_id')->references('id')->on('finance_system_payment_info');
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
        Schema::dropIfExists('finance_system_transaction');
    }
}
