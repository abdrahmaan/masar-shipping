<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    use HasFactory;
    
    protected $fillable = [
        
        "Brand",
        "Category",
        "ModelName",
        "ModelType",
        "ModelYear",
        "Transmission",
        "TransmissionCount",
        "FourXFour",
        "PushingType",
        "CC",
        "Cylinder",
        "HorsePower",
        "FuelType",
        "FuelLiter",
        "Tier",
        "Height",
        "Width",
        "Length",
        "Passengers",
        "PurchasePrice",
    ];

}
