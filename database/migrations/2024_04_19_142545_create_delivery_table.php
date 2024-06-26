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
        Schema::create('deliveries', function (Blueprint $table) {
            $table->id();
            $table->string("fullName");
            $table->string("gender");
            $table->string("phone");
            $table->string("phoneTwo");
            $table->string("email");
            $table->string("address");
            $table->string("district");
            $table->string("city");
            $table->string("national_id");
            $table->double("commission");
            $table->string("dateOfBirth")->nullable();
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
        Schema::dropIfExists('delivery');
    }
};
