<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->string("clientName");
            $table->bigInteger("client_id");
            $table->bigInteger("contract_id");
            $table->string("paymentType");
            $table->string("transactionType");
            $table->double("amount");
            $table->string("description")->default("لا يوجد");
            $table->date("dateOfPay");
            $table->string("op");
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
        Schema::dropIfExists('payments');
    }
};
