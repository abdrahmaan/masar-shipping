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
        Schema::create('financial_requests', function (Blueprint $table) {
            $table->id();
            $table->string("client_id");
            $table->string("fullName");
            $table->string("phone");
            $table->string("contract_id");
            $table->string("amount");
            $table->string("amount_letters");
            $table->string("dateOfPay");
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
        Schema::dropIfExists('financial_requests');
    }
};
