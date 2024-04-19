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
        Schema::create('clients', function (Blueprint $table) {
            $table->id();
            $table->string("client_type");
            $table->string("tradeName")->nullable();
            $table->string("fullName");
            $table->string("gender");
            $table->string("taxNumber")->nullable();
            $table->string("registerNumber")->nullable();
            $table->string("phone");
            $table->string("phoneTwo");
            $table->string("email");
            $table->string("address");
            $table->string("district");
            $table->string("city");
            $table->string("postalCode");
            $table->string("national_id")->default("لا يوجد");
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
        Schema::dropIfExists('clients');
    }
};
