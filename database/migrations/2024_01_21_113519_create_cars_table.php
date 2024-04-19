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
        Schema::create('cars', function (Blueprint $table) {
            $table->id();
            $table->string("Brand");
            $table->string("Category");
            $table->string("ModelName");
            $table->string("ModelType");
            $table->integer("ModelYear");
            $table->string("Transmission");
            $table->integer("TransmissionCount");
            $table->string("FourXFour");
            $table->string("PushingType");
            $table->integer("CC");
            $table->integer("Cylinder");
            $table->integer("HorsePower");
            $table->string("FuelType");
            $table->integer("FuelLiter");
            $table->integer("Tier");
            $table->integer("Height");
            $table->integer("Width");
            $table->integer("Length");
            $table->integer("Passengers");
            $table->integer("PurchasePrice");
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
        Schema::dropIfExists('cars');
    }
};
