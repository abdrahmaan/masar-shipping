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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->bigInteger("order_id");
            $table->string("clientName");
            $table->string("phone");
            $table->string("phoneTwo");
            $table->string("address");
            $table->string("distinict");
            $table->string("city");
            $table->double("amount");
            $table->double("shipFee");
            $table->double("companyFee");
            $table->string("status")->default("جاهزة للشحن");
            $table->bigInteger("delivery_id");
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
        Schema::dropIfExists('orders');
    }
};
