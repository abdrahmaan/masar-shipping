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
        Schema::create('commercials', function (Blueprint $table) {
            $table->id();
            $table->string("tradeName");
            $table->string("fullName");
            $table->string("gender");
            $table->integer("taxNumber");
            $table->integer("registerNumber");
            $table->string("phone");
            $table->string("phoneTwo");
            $table->string("address");
            $table->string("district");
            $table->string("city");
            $table->integer("postalCode");
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
        Schema::dropIfExists('commercials');
    }
};
