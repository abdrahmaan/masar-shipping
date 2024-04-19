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
        Schema::create('appointments', function (Blueprint $table) {
            $table->id();
            $table->string("client_id");
            $table->string("fullName");
            $table->string("phone");
            $table->string("phoneTwo");
            $table->string("address");
            $table->string("district");
            $table->string("city");
            $table->date("dateOfAppointment");
            $table->string("dayOfAppointment");
            $table->time("timeOfAppointment");
            $table->text("reason");
            $table->string("status")->default("سارى");
            $table->string("op");
            $table->string("op_description")->default("لا يوجد");
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
        Schema::dropIfExists('appointments');
    }
};
